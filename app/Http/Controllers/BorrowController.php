<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Borrow::where('status','borrow')->get();
        return view('borrow.index',compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function return()
    {
        $data = Borrow::where('status','return')->get();
        return view('borrow.return',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $book = Book::all();
        return view('borrow.create', compact('user','book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'user'   => 'required',
            'book'   => 'required',
        ]);

        Borrow::create([
            'user_id'   => $request->user,
            'book_id'   => $request->book,
            'status'    => "borrow",
        ]);
        return redirect('/pinjam');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        return view('borrow.show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        Borrow::where('id',$id)->update([
            'status' => 'return'
        ]);

        return redirect('/pinjam');
    }
}
