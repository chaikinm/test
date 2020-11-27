<?php

namespace App\Classes;

use App\Models\UserPrize;
use Illuminate\Support\Facades\Auth;

class UserItemsPrizeItem extends AbstractModelHelper implements \App\Interfaces\UserPrizeItemInterface
{

    public function getStatus()
    {
        if ($this->item->sent) {
            return __('Отправлен');
        } else {
            return __('Не отправлен');
        }
    }

    public function getActions()
    {
        return '<a href="'.route('refuse_prize', [$this->item->id]).'">'.__('Отказаться').'</a>';
    }

    public function exchange()
    {
    }
}
