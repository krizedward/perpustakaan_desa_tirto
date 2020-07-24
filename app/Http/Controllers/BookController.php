<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\CodeBook;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Book::all();
        $code_book = CodeBook::all();
        return view('book.index', compact('data', 'code_book'));
    }

    public function detail($id)
    {
        if(Auth::check() && \Auth::user()->level == 'staff') {
            $data = CodeBook::where('book_id',$id)->get();
        } else {
            $data = CodeBook::where('book_id',$id)->where('status', '<>', 'lost')->get();
        }
        return view('book.detail', compact('data', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('book.create', compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code'          => 'required',
            'title'         => 'required',
            'description'   => 'required',
            'stock'         => 'required|min:1',
            'category'      => 'required',
            'image_cover'   => 'sometimes|max:8000',
        ]);

        $file = $request->file('image');

        if ($file) {
            Book::create([
                'category_id'   => $request->category,
                'title'         => $request->title,
                'description'   => $request->description,
                'stock'         => $request->stock,
                'image_cover'   => $file->getClientOriginalName(),
                'slug'          => \Str::slug($request->title), 
            ]);
            
            $temp = Book::all()->last();

            for ($i=1; $i <= $request->stock; $i++) { 
                CodeBook::create([
                    'book_id'   => $temp->id,
                    'code'      => $request->code.'-'.$i,
                    'status'    => 'available',
                ]);
            }

            //Move Uploaded File
            $destinationPath = 'uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
        } else {
            Book::create([
                'category_id'   => $request->category,
                'title'         => $request->title,
                'description'   => $request->description,
                'stock'         => $request->stock,
                'image_cover'   => "cover.jpg",
                'slug'          => \Str::slug($request->title), 
            ]);

            $temp = Book::all()->last();

            for ($i=1; $i <= $request->stock; $i++) { 
                CodeBook::create([
                    'book_id'   => $temp->id,
                    'code'      => $request->code.'-'.$i,
                    'status'    => 'available',
                ]);
            }
        }
        
        \Session::flash('buku_add','Data buku berhasil di tambah');

        return redirect('/buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $book = Book::where('slug',$slug)->first();
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $book = Book::where('slug',$slug)->first();
        $category = Category::all();
        return view('book.edit',compact('book','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'         => 'required',
            'description'   => 'required',
            'category'      => 'required',
            'image_cover'   => 'sometimes|max:8000',
        ]);

        $file = $request->file('image');

        if ($file) {
            Book::where('id',$id)->update([
               'category_id'    => $request->category,
                'title'         => $request->title,
                'description'   => $request->description,
                'image_cover'   => $file->getClientOriginalName(),
                'slug'          => \Str::slug($request->title), 
            ]);

            //Move Uploaded File
            $destinationPath = 'uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
        } else {
            Book::where('id',$id)->update([
                'category_id'   => $request->category,
                'title'         => $request->title,
                'description'   => $request->description,
                'slug'          => \Str::slug($request->title), 
            ]);
        }
        
        \Session::flash('buku_update','Data buku berhasil di ubah');

        return redirect('/buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book     $book
     * @param  \App\Models\CodeBook $code_book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(CodeBook::where('book_id',$id)->where('status', 'not available')->count() == 0) {
            CodeBook::where('book_id',$id)->each(function($item, $key) {
                $item->delete();
            });
            Book::where('id',$id)->delete();

            \Session::flash('buku_delete','Data buku berhasil di hapus');
        } else {
            \Session::flash('buku_delete_error','Setidaknya satu buku masih di pinjam');
        }

        return redirect('/buku');
    }

    public function passive($id)
    {
        Book::where('id',$id)->update(['status'=>'passive']);

        return redirect('/buku');
    }

    public function activation($id)
    {
        Book::where('id',$id)->update(['status'=>'active']);

        return redirect('/buku');
    }

    public function landing()
    {
        $data = Book::all();
        return view('home',compact('data'));
    }

    public function stockadd(Request $request, $id)
    {
        $this->validate($request, [
            'stockadd'      => 'required|integer|min:1',
        ]);

        $book = Book::where('id',$id)->first();
        $code = CodeBook::where('book_id', $id)->first()->code;

        for ($i=$book->stock + 1; $i <= ($book->stock + $request->stockadd); $i++) { 
            CodeBook::create([
                'book_id'   => $id,
                'code'      => substr($code, 0, strrpos($code, '-')).'-'.$i,
                'status'    => 'available',
            ]);
        }

        $book->update([
            'stock'    => $book->stock + $request->stockadd,
        ]);
        
        \Session::flash('buku_update','Data buku berhasil di ubah');

        return redirect('/buku/list/'.$id);
    }

    public function stockremove(Request $request, $id)
    {
        $this->validate($request, [
            'stockremove'      => 'required',
        ]);

        $codebook = CodeBook::where('book_id', $id)->where('code', $request->stockremove)->first();

        if($codebook->status == 'available') {
            $codebook->update([
                'status'   => 'lost',
            ]);

            \Session::flash('buku_update','Data buku berhasil di ubah');
        } else {
            \Session::flash('buku_update_error','Data buku tidak berhasil di ubah');
        }

        return redirect('/buku/list/'.$id);
    }

    public function stockrestore(Request $request, $id)
    {
        $this->validate($request, [
            'stockrestore'      => 'required',
        ]);

        $codebook = CodeBook::where('book_id', $id)->where('code', $request->stockrestore)->first();

        if($codebook->status == 'lost') {
            $codebook->update([
                'status'   => 'available',
            ]);

            \Session::flash('buku_update','Data buku berhasil di ubah');
        } else {
            \Session::flash('buku_update_error','Data buku tidak berhasil di ubah');
        }

        return redirect('/buku/list/'.$id);
    }
}
