<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsController extends Controller
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
    public function guestIndex()
    {
        $newsNew = News::latest()->take(5)->get();

        $newsPopular = News::orderBy('view_count', 'desc')->take(5)->get();

        $newsAll = News::paginate(5);

        return view('guest.news.news', compact('newsNew', 'newsPopular', 'newsAll'));
    }

    public function guestShow($id)
    {
        $news = News::with('newsComments')->find($id);
        $news->increment('view_count'); 
        $comments = $news->newsComments()->paginate(5);

        return view('guest.news.news_detail', compact('news', 'comments'));
    }

    public function guestLove($id)
    {
        $news = News::find($id);

        if (!request()->cookie('liked_posts')) {
            $likedPosts = [];
        } else {
            $likedPosts = json_decode(request()->cookie('liked_posts'), true);
        }

        if (!in_array($news->id, $likedPosts)) {
            $news->increment('number_love');
            $likedPosts[] = $news->id;
        }

        return redirect()->back()->cookie('liked_posts', json_encode($likedPosts));
    }
}