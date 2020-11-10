<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function sub()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
