<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['employee_code','employee_name'];
    public function professions()
    {
        // final model ,   intermediate model, current model to intermediate related key,
        // intermediate to final model key company -> profession (key from final model)
        //local model primary key
        //local key on intermediate table
        return $this->hasManyThrough(
            Profession::class,
            Company::class, 
            'employee_id',
            'company_id',
            'id',
            'id'
        );
    }

    public function company()
    {
        return $this->hasOne('App\Models\Company','employee_id','id');
    }
}
