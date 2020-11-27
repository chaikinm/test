<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrizeItem extends Model
{
    use HasFactory;

    protected $prizeItem = null;

    /**
     * @return UserPrizeItemInterface
     */
    public function prize() {
        if (is_null($this->prizeItem)) {
            $class = config('app.prizes.classes')[$this->kind];
            if (!is_null($class)) {
                $this->prizeItem = new $class($this);
            }
        }
        return  $this->prizeItem;
    }
}
