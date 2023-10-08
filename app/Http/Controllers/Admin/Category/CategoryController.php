<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category=Category::all();
        return view("admin.pages.category.index",compact("category"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=Category::all();
        return view("admin.pages.category.create",compact("category"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs =$request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'parent_id' => 'nullable',


        ]);

        $result = Category::create($inputs);
        $category=Category::all();

        return to_route("admin.category.index",compact("category"))->with("success","دسته بندی با موفقیت اضافه شد");


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
    public function edit(Category $category)
    {

        $allCategories = Category::whereNot('id', $category->id)->get();
        return view("admin.pages.category.edit",compact("category","allCategories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $inputs = $request->validate(
            [
                'name' => 'required|min:3|max:20',
                'description' => 'required',
                'status' => 'nullable',
                'parent_id' => 'nullable|',
            ]);
        $category->update($inputs);
        return to_route("admin.category.index")->with("success","دسته بندی با موفقیت ویرایش شد");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with("success","دسته بندی با موفقیت حذف شد");
    }


    public function change(Category $category)
    {
        if ($category['status']==0){
            $category['status'] = 1;
            $category->save();
            return redirect()->back()->with("success","وضعیت با موفقیت تغییر کرد");

        }elseif ($category['status']==1){
            $category['status'] = 2;
            $category->save();
            return redirect()->back()->with("success","وضعیت با موفقیت تغییر کرد");

        }elseif ($category['status']==2){
            $category['status'] = 1;
            $category->save();
            return redirect()->back()->with("success","وضعیت با موفقیت تغییر کرد");
        }
    }

}
