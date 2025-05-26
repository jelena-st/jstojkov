<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
}
