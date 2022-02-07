<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_id','car_company_name','car_company_address','car_company_phone'
    ];
}
