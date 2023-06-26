<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsComment;

class NewsCommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function guestStore(Request $request)
    {
        $request->validate([
            'news_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required',
        ]);

        NewsComment::create([
            'news_id' => $request->news_id,
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content
        ]);

        return redirect()->back()->with('success', 'Bình luận của bạn đã được đăng.');
    }
}
