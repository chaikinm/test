<?php

namespace App\Interfaces;

interface UserPrizeItemInterface
{
    public function getStatus();
    public function getActions();
    public function exchange();
}
