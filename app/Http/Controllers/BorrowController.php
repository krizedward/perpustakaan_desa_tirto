<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use App\Models\Member;
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
        $user = Member::all();
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

        $cek = Book::where('id',$request->book)->where('stock','>',0)->where('status','active')->count();

        if($cek > 0){
            Borrow::create([
                'member_id'   => $request->user,
                'book_id'   => $request->book,
                'status'    => "borrow",
            ]);
 
            $buku       = Book::where('id',$request->book)->first();
            $qty_now    = $buku->stock;
            $qty_new    = $qty_now - 1;
 
            Book::where('id',$request->book)->update([
                'stock'=>$qty_new,
            ]);
 
            //\Session::flash('sukses','buku berhasil di pinjam');
 
            return redirect('/pinjam');
        }else{
            //\Session::flash('gagal','buku sudah habis atau tidak aktif');
            
            return redirect('/pinjam');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Borrow::where('id',$id)->first();
        return view('borrow.show',compact('data'));
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
        $dt       = Borrow::find($id);
        $id_buku    = $dt->book_id;

        $buku = Book::find($id_buku);
 
        $now = $buku->stock;
        $stock_pengembalian = $now + 1;

        Borrow::where('id',$id)->update([
            'status' => 'return'
        ]);

        Book::where('id',$id_buku)->update([
            'stock'=>$stock_pengembalian
        ]);

        //return dd($id_buku);

        return redirect('/pinjam');
    }
}
