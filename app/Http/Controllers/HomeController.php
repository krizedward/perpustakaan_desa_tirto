<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\CodeBook;
use App\Models\Borrow;
use App\Models\Member;

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
        $book   = Book::orderBy('updated_at', 'desc')->paginate(4);
        $borrow = Borrow::all();
        $member = Member::orderBy('updated_at', 'desc')->paginate(4);

        return view('layouts.dashboard', compact('book','borrow','member'));
    }
}
