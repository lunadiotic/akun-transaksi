<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];
    protected $dates = [
        'date'
    ];

    public function balance()
    {
        return $this->hasMany(Balance::class);
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function delete()
    {
        $this->details()->delete();
        parent::delete();
    }
}
