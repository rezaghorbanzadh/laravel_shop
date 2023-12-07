<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $slideShow=Banner::where("position",0)->where("status",1)->get();
        $topBanners=Banner::where("position",1)->where("status",1)->take(2)->get();
        $middleBanners=Banner::where("position",2)->where("status",1)->take(2)->get();
        $bottomBanner=Banner::where("position",3)->where("status",1)->get();
        $mostVisitProducts=Product::latest()->take(10)->get();
        $offerProducts=Product::latest()->take(10)->get();

        return view("customer.home",compact("slideShow","topBanners","middleBanners",
            "bottomBanner","mostVisitProducts","offerProducts"));
    }
}
