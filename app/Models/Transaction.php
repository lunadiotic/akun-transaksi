<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    public function balance()
    {
        return $this->hasMany(Balance::class);
    }
}
