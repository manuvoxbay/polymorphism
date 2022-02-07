<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Product;
use App\Models\Photo;
use App\Models\User;
use App\Models\Phone;
use App\Models\Employee;
use App\Models\Project;

class TestController extends Controller
{
    public function index()
    {
        return view('welcome');
        return Employee::with(['professions'])->get();
        return Project::with(['deployments'])->get();
        $employee = Employee::first();
        return $employee->professions;

        return User::with(['carCompany'])->get();
        return $user = User::with(['activePhone'])->find(1); 
        return User::with(['phone'])->find(1);
        return Product::with(['oldestImage'])->get();
        // $photo = Photo::find(1);
        // return $photo->photoable;
        //return Product::with('photos')->get();
        //return Product::with('photos')->find(3);
        return Post::with('photos')->find(1)->photos;
        return view('welcome');
    }
}
