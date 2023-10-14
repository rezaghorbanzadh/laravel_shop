<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners=Banner::all();
        return view("admin.pages.banner.index",compact("banners"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.banner.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->validate(
            [
                'image' => 'required',
                'url' => 'required',
            ]);
        if($request->hasFile('image')) {
            if (!empty($banner->image)) {
                file("$banner->image")->delete();
            }
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();

            // File upload location
            $location = 'uploads';

            // Upload file
            $file->move($location,$filename);
            $inputs['image']=$filename;
        }
        else
        {
            if (isset($inputs['currentImage']) && !empty($banner->image)) {
                $image = $banner->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;

            }
        }

        $banner = Banner::create($inputs);
        return to_route("admin.banner.index",compact("banner"))->with("success","دسته بندی با موفقیت اضافه شد");
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
