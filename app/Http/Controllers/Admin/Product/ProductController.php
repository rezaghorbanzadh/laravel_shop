<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view("admin.pages.product.index",compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.product.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs=$request->validate([
            'name' => 'required',
            'color' => '',
            'price' => '',
            'oldprice' => '',
            'description' => '',
            'inventory' => '',
            'img_product' => '',
            'user_id' => '',
            'discount' => '',
            'status' => 'required',
        ]);
        if($request->hasFile('img_product')) {
            if (!empty($product->img_product)) {
                file("$product->img_product")->delete();
            }
            $file = $request->file('img_product');
            $filename = time().'_'.$file->getClientOriginalName();
            // File upload location
            $location = 'uploads';
            // Upload file
            $file->move($location,$filename);
            $inputs['img_product']=$filename;
        }
        else
        {
            if (isset($inputs['currentImage']) && !empty($product->image)) {
                $image = $product->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['img_product'] = $image;
            }
        }
        $inputs['user_id']=1;


        $product = Product::create($inputs);
        return redirect()->route('admin.product.index')->with("success"," با موفقیت ذخیره شد");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
