<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Admin\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comment=Comment::all();
        return view("admin.pages.comment.index",compact("comment"));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with("success","کامنت با موفقیت حذف شد");    }

    public function change(Comment $comment){
        if ($comment['status']==0){
            $comment['status'] = 1;
            $comment->save();
            return redirect()->back()->with("success","وضعیت با موفقیت تغییر کرد");

        }elseif ($comment['status']==1){
            $comment['status'] = 2;
            $comment->save();
            return redirect()->back()->with("success","وضعیت با موفقیت تغییر کرد");

        }elseif ($comment['status']==2){
            $comment['status'] = 1;
            $comment->save();
            return redirect()->back()->with("success","وضعیت با موفقیت تغییر کرد");
        }
    }
    public function approved(Comment $comment){
        if ($comment['approved']==0){
            $comment['approved'] = 1;
            $comment->save();
            return redirect()->back()->with("success","وضعیت با موفقیت تغییر کرد");

        }else{
            $comment['approved'] = 0;
            $comment->save();
            return redirect()->back()->with("success","وضعیت با موفقیت تغییر کرد");

        }
    }
}
