<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $user= DB::select('SELECT id,username,email FROM users WHERE user_type=0');
        return view("admin.pages.user.index",compact("user"));

    }
    public function destroy(User $user){
        $user->delete();
        return redirect()->back()->with("success","کاربر با موفقیت حذف شد");
    }
    public function adminUser(){
        $user= DB::select('SELECT id,username,email FROM users WHERE user_type=1');;
        return view("admin.pages.user.adminUser",compact("user"));

    }
}
