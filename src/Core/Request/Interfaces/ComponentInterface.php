<?php

namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Services\ArrayObject\Interfaces\DeleteArrayInterface;
use LTL\Hubspot\Services\ArrayObject\Interfaces\GetArrayInterface;

interface ComponentInterface extends DeleteArrayInterface, GetArrayInterface
{
}
