<?php

namespace App\Classes;

use App\Models\UserPrize;
use Illuminate\Support\Facades\Auth;

class ItemsPrizeItem extends AbstractModelHelper implements \App\Interfaces\PrizeItemInterface
{

    public function newPrize()
    {
        if ($this->item->count > 0) {
            $this->item->count -= 1;
            $this->item->save();
            return new UserPrize([
                'user_id' => Auth::id(),
                'prize_item_id' => $this->item->id,
                'count' => 1,
            ]);
        }
        return null;
    }
}
