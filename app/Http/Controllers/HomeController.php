<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\CodeBook;
use App\Models\Borrow;
use App\Models\Member;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin()
    {
        $book       = Book::orderBy('updated_at', 'desc')->paginate(4);
        $borrow     = Borrow::where('action','borrow')->get();
        $done       = Borrow::where('action','done')->orderBy('updated_at', 'desc')->get();
        $member     = Member::orderBy('updated_at', 'desc')->paginate(4);
        $members    = Member::all();
        $carbon     = new Carbon();
        
        return view('home', compact('book','borrow','member','members','done','carbon'));
    }
}
