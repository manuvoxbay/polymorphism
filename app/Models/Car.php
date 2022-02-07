<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car',
        'model'
    ];

    public function carCompany()
    {
        return $this->hasOne("App\Models\CarCompany","car_id",'id');
    }
}
