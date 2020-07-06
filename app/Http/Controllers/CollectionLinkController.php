<?php

namespace App\Http\Controllers;

use App\Models\CollectionLink;
use Illuminate\Http\Request;

class CollectionLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CollectionLink::all();

        return view('collectionlink.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('collectionlink.create');
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
            'name' => 'required',
            'link' => 'required',
        ]);

        CollectionLink::create([
            'name'  => $request->name,
            'link'  => $request->link,
        ]);

        \Session::flash('koleksi_add','Data Koleksi Link Berhasil Disimpan');

        return redirect('/koleksi-link');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CollectionLink  $collectionLink
     * @return \Illuminate\Http\Response
     */
    public function edit(CollectionLink $collectionLink, $id)
    {
        $data = CollectionLink::where('id',$id)->first();

        return view('collectionlink.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CollectionLink  $collectionLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => 'required',
            'link' => 'required',
        ]);

        CollectionLink::where('id',$id)->update([
            'name'  =>  $request->name,
            'link'  => $request->link,
        ]);

        \Session::flash('koleksi_update','Data Koleksi Berhasil Diubah');

        return redirect('/koleksi-link');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CollectionLink  $collectionLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(CollectionLink $collectionLink, $id)
    {
        CollectionLink::where('id',$id)->delete();
        
        \Session::flash('koleksi_delete','Data Koleksi Berhasil Dihapus');
        
        return redirect('/koleksi-link');
    }
}
