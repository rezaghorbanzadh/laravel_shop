<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $slideShow=Banner::where("position",0)->where("status",0)->get();
        $topBanner=Banner::where("position",1)->where("status",0)->get();

        return view("customer.home");
    }
}
