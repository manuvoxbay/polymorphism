<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_title'];

    public function photos()
    {
        return $this->morphMany('App\Models\Photo','photoable');
    }
    public function latestImage()
    {
        return $this->morphOne('App\Models\Photo','photoable')->latestOfMany();
    }
    public function oldestImage()
    {
        return $this->morphOne('App\Models\Photo','photoable')->oldestOfMany();
    }
}
