<?php

namespace LTL\Hubspot\Services\Observer\Traits;

use LTL\Hubspot\Services\Observer\Interfaces\ObserverInterface;
use SplObjectStorage;

trait SubjectTrait
{
    private $observers;

    public function attach(ObserverInterface $observer)
    {
        if (is_null($this->observers)) {
            $this->observers = new SplObjectStorage;
        }
        $this->observers->attach($observer);
    }

    public function detach(ObserverInterface $observer)
    {
        if (isset($this->observers[$observer])) {
            $this->observers->detach($observer);
        }
    }
   
    public function notify(string $event)
    {
        if (!($this->observers instanceof SplObjectStorage)) {
            return;
        }
        foreach ($this->observers as $observer) {
            $observer->update($this, $event);
        }
    }
}
