<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'name', 'avatar', 'price',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }
}
