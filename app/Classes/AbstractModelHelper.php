<?php

namespace App\Classes;

abstract class AbstractModelHelper
{
    protected $item = null;

    function __construct($item)
    {
        $this->item = $item;
    }
}
