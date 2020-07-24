<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use App\Models\CodeBook;
use App\Models\Member;
use App\Models\Returns;
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
        $page = 'pinjam';
        $data = Borrow::where('action','borrow')->get();
        $user = Borrow::all();
        $req  = Borrow::where('action','request')->get();
        return view('borrow.index',compact('data','req','user','page'));
    }

    /*
     *
     * fungsi menampilkan tabel pesan
    */
    public function order()
    {
        $page = 'order';
        $data = Borrow::where('action','borrow')->get();
        $user = Borrow::all();
        $req  = Borrow::where('action','request')->get();
        return view('borrow.index',compact('data','req','user','page'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function return()
    {
        $data = Returns::all();
        return view('borrow.return',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Member::join('users', 'users.id', 'user_id')->orderBy('name')->get();
        $codebook = CodeBook::all();
        return view('borrow.create', compact('user','codebook'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request,[
            'user'   => 'required',
            'book'   => 'required',
        ]);

        //$cek = Book::where('id',$request->book)->where('stock','>',0)->where('status','active')->count();

        //if($cek > 0){
            Borrow::create([
                'member_id'     => $request->user,
                'codebook_id'   => $request->book,
                'action'        => "borrow",
            ]);

            CodeBook::where('id',$request->book)->update([
                'status' => "not available",
            ]);

            $dt       = Borrow::all()->last();
            $id_buku  = $dt->codebook->book->id;
            $buku     = Book::find($id_buku);
 
            $now = $buku->stock;
            $stock_pengembalian = $now - 1;
            
            Book::where('id',$id_buku)->update([
                'stock'=>$stock_pengembalian
            ]);
            /*
            $temp = CodeBook::where('id',$request->book);
            $cek = Book::where('id',$temp->id)->where('stock','>',0)->where('status','active')->count();

            if($cek > 0){
                $buku       = Book::where('id',$temp->id)->first();
                $qty_now    = $buku->stock;
                $qty_new    = $qty_now - 1;
     
                Book::where('id',$request->book)->update([
                    'stock'=>$qty_new,
                ]);
            }
            */

            //\Session::flash('sukses','buku berhasil di pinjam');
 
            return redirect('/pinjam');

        //}else{
            //\Session::flash('gagal','buku sudah habis atau tidak aktif');
            
            //return redirect('/pinjam');
        //}
    }

    public function pending(Request $request, $id)
    {
        $this->validate($request,[
            'user'   => 'required',
            'book'   => 'required',
        ]);
        $dt     = Member::where('user_id',$id)->first();
        $count  = Borrow::where('member_id',$dt->id)->where('action','request')->count();
        if ($count == 3) {
            //return dd($count);
            \Session::flash('peringatan_pesan','hanya 3 buku yang bisa dipinjam');
            return redirect('/pesan/buku');       
        } else {
            
        Borrow::create([
            'member_id'     => $request->user,
            'codebook_id'   => $request->book,
            'action'        => "request",
        ]);
        
        \Session::flash('pesan_buku','buku dipesan, menunggu konfirmasi petugas perpus');
           
        return redirect('/pesan/buku');
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
        $id_buku  = $dt->codebook->book->id;

        $buku = Book::find($id_buku);
 
        $now = $buku->stock;
        $stock_pengembalian = $now + 1;
        
        Book::where('id',$id_buku)->update([
            'stock'=>$stock_pengembalian
        ]);
        
        Returns::create([
            'member_id'     => $dt->member_id,
            'codebook_id'   => $dt->codebook_id,
        ]);
        
        Borrow::where('id',$id)->update([
            'action' => 'done'
        ]);

        CodeBook::where('id',$dt->codebook_id)->update([
            'status' => "available",
        ]);

        //return dd($id_buku);

        return redirect('/pinjam');
    }

    public function agree($id)
    {

        $buku_pinjam = Borrow::where('id',$id)->first();
        $kode_buku   = $buku_pinjam->codebook_id;
        $buku        = Borrow::all();
        //Borrow::where('id',$id)->update(['action'=>'borrow']);
        //$choose = Borrow::where('codebook_id',$kode_buku)->where('id',$id)->first();
        
        foreach ($buku as $dt) {
            
            if ($dt->codebook_id == $kode_buku && $dt->id != $id) {
                Borrow::where('codebook_id',$kode_buku)->where('id','!=',$id)->update(['action'=>'denied']);
            }

            if ($dt->id == $id) {
                Borrow::where('id',$id)->update(['action'=>'borrow']);
            }

        }

        $dt       = Borrow::all()->last();
        $id_buku  = $dt->codebook->book->id;
        $buku     = Book::find($id_buku);


        CodeBook::where('id',$dt->codebook_id)->update([
            'status' => "not available",
        ]);
        
        $now = $buku->stock;
        $stock_pengembalian = $now - 1;
            
        Book::where('id',$id_buku)->update([
            'stock'=>$stock_pengembalian
        ]);

        return redirect('/pinjam');
    }

    public function reject($id)
    {
        //Borrow::where('id',$id)->delete();
        Borrow::where('id',$id)->update(['action'=>'denied']);

        return redirect('/pinjam');
    }
}
