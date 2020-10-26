<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use App\Models\CodeBook;
use App\Models\Member;
use App\User;
use App\Models\Returns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\BorrowStore;
use App\Mail\BorrowPending;
use App\Mail\BorrowPendingAgreed;
use App\Mail\BorrowPendingDenied;
use App\Mail\BorrowReturn;

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
        //$user = User::all();
        $member = Member::all();
        $codebook = CodeBook::orderBy('code')->get();
        return view('borrow.create', compact('user','member','codebook'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if(Auth::check()) {
            if(Auth::user()->level == 'staff') {
                $this->validate($request,[
                    'member'   => 'required',
                    'codebook' => 'required',
                ]);
            } else {
                $this->validate($request,[
                    'codebook' => 'required',
                ]);
            }
        }

        //$cek = CodeBook::where('id',$request->codebook)->where('status','available')->first();

        //if($cek != null){
            Borrow::create([
                'codebook_id'   => $request->codebook,
                'member_id'     => $request->member,
                'action'        => "borrow",
            ]);

            CodeBook::where('id',$request->codebook)->update([
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
            $temp = CodeBook::where('id',$request->codebook);
            $cek = Book::where('id',$temp->id)->where('stock','>',0)->where('status','active')->count();

            if($cek > 0){
                $buku       = Book::where('id',$temp->id)->first();
                $qty_now    = $buku->stock;
                $qty_new    = $qty_now - 1;
     
                CodeBook::where('id',$request->codebook)->book->update([
                    'stock'=>$qty_new,
                ]);
            }
            */

            // Sample mail.
            /*Mail::send('borrow.mailborrow',
                array(
                    'isi_pesan' => 'Hai.'
                ), function($pesan) {
                    $pesan->from(env('MAIL_USERNAME', '<username>@gmail.com'), 'Ini adalah isi pesan.');
                    $pesan->to(Auth::user()->email)->subject('Subjek Pesan Email');
                }
            );*/

            Mail::to(Auth::user()->email)->send(new BorrowStore($dt));
            Mail::to(User::where('level', 'staff')->first()->email)->send(new BorrowStore($dt));

            //\Session::flash('sukses','buku berhasil di pinjam');
 
            return redirect('/pinjam');

        //}else{
            //\Session::flash('gagal','Kode buku ini tidak dapat di pinjam');
            
            //return redirect('/pinjam');
        //}
    }

    public function pending(Request $request, $id)
    {
        $this->validate($request,[
            'member'   => 'sometimes',
            'codebook' => 'required',
        ]);
        $dt     = Member::where('user_id',$id)->first();
        $count  = Borrow::where('member_id',$dt->id)->where('action','request')->count();
        if ($count == 3) {
            //return dd($count);
            \Session::flash('peringatan_pesan','hanya 3 buku yang bisa dipinjam');
            return redirect('/pesan/buku');       
        } else {
            
        Borrow::create([
            'member_id'     => $request->member,
            'codebook_id'   => $request->codebook,
            'action'        => "request",
        ]);

        Mail::to(Auth::user()->email)->send(new BorrowPending(Borrow::all()->last()));
        Mail::to(User::where('level', 'staff')->first()->email)->send(new BorrowPending(Borrow::all()->last()));

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

        $dt->update([
            'action' => 'done'
        ]);

        CodeBook::where('id',$dt->codebook_id)->update([
            'status' => "available",
        ]);

        Mail::to(Auth::user()->email)->send(new BorrowReturn($dt, Returns::all()->last()));
        Mail::to(User::where('level', 'staff')->first()->email)->send(new BorrowReturn($dt, Returns::all()->last()));

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
                $buku_pinjam->update(['action'=>'borrow']);
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

        Mail::to(Auth::user()->email)->send(new BorrowPendingAgreed($buku_pinjam));
        Mail::to(User::where('level', 'staff')->first()->email)->send(new BorrowPendingAgreed($buku_pinjam));

        return redirect('/pinjam');
    }

    public function reject($id)
    {
        //Borrow::where('id',$id)->delete();

        $dt = Borrow::where('id',$id)->first();

        $dt->update(['action'=>'denied']);

        Mail::to(Auth::user()->email)->send(new BorrowPendingDenied($dt));
        Mail::to(User::where('level', 'staff')->first()->email)->send(new BorrowPendingDenied($dt));

        return redirect('/pinjam');
    }
}
