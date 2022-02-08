<?php
namespace LTL\Hubspot;

use Composer\Script\Event;
use DirectoryIterator;
use SplMaxHeap;

class Deploy
{
    public static function withTag(Event $event)
    {
        $arguments = self::resolveArguments($event->getArguments());

        $baseTag = 'v';

        if (isset($arguments['t'])) {
            $baseTag .= $arguments['t'];
        }

        $tag = self::getLastTag($baseTag);

        $message = "{$tag}";

        if (isset($arguments['m'])) {
            $message .= ' - '. $arguments['m'];
        }

        $diff = shell_exec('git diff');

        if ($diff == '') {
            print("\033[1;35mNothing to commit\033[0m".PHP_EOL);

            die();
        }


        $repeat = str_repeat(':', 10 + (mb_strlen($tag)));

        print("\033[0;34m". $repeat ."\033[0m".PHP_EOL);
        print("\033[0;34m:: Tag \033[1m{$tag}\033[0m \033[0;34m::\033[0m".PHP_EOL);
        print("\033[0;34m". $repeat ."\033[0m".PHP_EOL);
        print(PHP_EOL);

        print("\033[0;32m\033[1mSync Repository\033[0m".PHP_EOL);
        print("\033[0;32m-----------\033[0m".PHP_EOL);
        shell_exec('cd '. __DIR__);
        shell_exec('git status');
        shell_exec('git checkout -b temp-branch');
        shell_exec('git checkout main');
        shell_exec('git pull');
        shell_exec('git merge temp-branch');
        shell_exec('git branch -D temp-branch');
        print(PHP_EOL);
        /**Finally */
        print("\033[0;32m\033[1mCommit and Push main branch\033[0m".PHP_EOL);
        print("\033[0;32m-----------\033[0m".PHP_EOL);
        shell_exec('git commit -a -m "'. $message .'"');
        shell_exec('git push origin main');
        print(PHP_EOL);
        
        print("\033[0;32m\033[1mCreate and Push tag\033[0m".PHP_EOL);
        print("\033[0;32m-----------\033[0m".PHP_EOL);
        shell_exec("git tag -a \"{$tag}\" -m \"{$message}\"");
        shell_exec('git push origin --tags');
    }

    private static function resolveArguments(array $arguments): array
    {
        $result = [];
        foreach ($arguments as $argument) {
            $argument = explode('=', $argument);

            if (count($argument) !== 2) {
                continue;
            }

            $result[$argument[0]] = $argument[1];
        }

        return $result;
    }

    private static function getLastTag(string $filter)
    {
        $folder = new DirectoryIterator(__DIR__ .'/../.git/refs/tags');
        $list = new SplMaxHeap;
        $list->insert($filter);
        foreach ($folder as $file) {
            if ($file->isDot()) {
                continue;
            }

            if ($filter !== 'v' && !str_contains($file->getFilename(), $filter)) {
                continue;
            }
         
            $list->insert($file->getFilename());
        }

        $last = (string) $list->top();

        return self::addCountTag($last, $filter);
    }

    private static function addCountTag(string $last, string $filter)
    {
        if ($last === $filter) {
            return "{$last}.0";
        }

        $list = explode('.', $last);

        $lastnumber = (int) array_pop($list);

        $list[] = ++$lastnumber;

        return implode('.', $list);
    }
}
