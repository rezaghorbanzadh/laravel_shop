<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Factory;
use Illuminate\Http\Request;

class facerController extends Controller
{
    public function index(){
        $user=User::factory(20)->create();
    }
}
