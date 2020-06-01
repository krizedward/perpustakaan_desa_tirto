<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

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
        return view('book.index', compact('data'));
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
            'title'         => 'required',
            'description'   => 'required',
            'stock'         => 'required',
            'category'      => 'required',
            'image'         => 'required',
        ]);

        $file = $request->file('image');
 
        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        
        Book::create([
            'category_id'   => $request->category,
            'title'         => $request->title,
            'description'   => $request->description,
            'stock'         => $request->stock,
            'image_cover'   => $file->getClientOriginalName(),
            'status'        => "active",
            'slug'          => \Str::slug($request->title),
        ]);
        
        \Session::flash('sukses','Data buku berhasil di tambah');

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
        $file = $request->file('image');

        if ($file) {
            Book::where('id',$id)->update([
               'category_id'    => $request->category,
                'title'         => $request->title,
                'description'   => $request->description,
                'stock'         => $request->stock,
                'image_cover'   => $file->getClientOriginalName(),
                'slug'          => \Str::slug($request->title), 
            ]);

            //Move Uploaded File
            $destinationPath = 'uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
        } else {
            Book::where('id',$id)->update([
               'category_id'    => $request->category,
                'title'         => $request->title,
                'description'   => $request->description,
                'stock'         => $request->stock,
                'slug'          => \Str::slug($request->title), 
            ]);
        }
        
        return redirect('/buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::where('id',$id)->delete();

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
}
