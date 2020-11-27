<?php

namespace App\Classes;

use App\Models\PrizeItem;
use App\Models\UserPrize;
use Illuminate\Support\Facades\Auth;

class UserMoneyPrizeItem extends AbstractModelHelper implements \App\Interfaces\UserPrizeItemInterface
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
        return '<a href="'.route('refuse_prize', [$this->item->id]).'">'.__('Отказаться').'</a>|<a href="'.route('exchange_prize', [$this->item->id]).'">'.__('Обменять на бонусные баллы').'</a>';
    }

    public function exchange()
    {
        $points = PrizeItem::where('kind', 'points')->first();
        if (($points != null) && ($this->item->count > 0) && (config('app.prizes.exchange_rate') > 0)) {
            $this->item->count *= config('app.prizes.exchange_rate');
            $this->item->prize_item_id = $points->id;
            $this->item->save();
        }
    }
}
