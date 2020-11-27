<?php

namespace App\Classes;

use App\Models\UserPrize;
use Illuminate\Support\Facades\Auth;

class PointsPrizeItem extends AbstractModelHelper implements \App\Interfaces\PrizeItemInterface
{

    public function newPrize()
    {
        if ($this->item->count > 0) {
            return new UserPrize([
                'user_id' => Auth::id(),
                'prize_item_id' => $this->item->id,
                'count' => rand($this->item->min, $this->item->max),
            ]);
        }
        return null;
    }
}
