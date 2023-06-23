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

        return view('guest.news.news', compact('newsNew','newsPopular','newsAll'));
    }
}
