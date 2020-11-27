<?php

namespace App\Classes;

use App\Models\UserPrize;
use Illuminate\Support\Facades\Auth;

class MoneyPrizeItem extends AbstractModelHelper implements \App\Interfaces\PrizeItemInterface
{

    public function newPrize()
    {
        if ($this->item->count > 0) {
            $count = $this->item->count;
            if ($this->item->min < $this->item->count) {
                $count = rand($this->item->min, $this->item->max);
            }
            $this->item->count -= $count;
            $this->item->save();
            return new UserPrize([
                'user_id' => Auth::id(),
                'prize_item_id' => $this->item->id,
                'count' => $count,
            ]);
        }
        return null;
    }
}
