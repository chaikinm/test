<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPrize extends Model
{
    use HasFactory;

    protected $userPrizeItem = null;

    protected $fillable = [
        'user_id',
        'prize_item_id',
        'count',
    ];

    public function prizeItem()
    {
        return $this->belongsTo('App\Models\PrizeItem');
    }

    /**
     * @return PrizeItemInterface
     */
    public function prize() {
        if (is_null($this->userPrizeItem)) {
            $class = config('app.prizes.user_classes')[$this->prizeItem->kind];
            if (!is_null($class)) {
                $this->userPrizeItem = new $class($this);
            }
        }
        return  $this->userPrizeItem;
    }
}
