<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public static function findByCode($code)
    {
        return self::where('code', $code)->first();
    }

    public function discount($total)
    {

        if ($this->type == 1) {
            return $this->value;
        } elseif ($this->type == 2) {
            return round(($this->percent / 100) * $total);
        } else {
            return 0;
        }
    }
}
