<?php

namespace App\Http\Controllers\Customer\Product;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  //product page
    public function product(Product $product)
    {
        return view("customer.market.product.product",compact("product"));
    }


}
