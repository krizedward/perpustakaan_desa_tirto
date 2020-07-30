<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->level == 'staff') {
            $data = Banner::all();
            return view('banner.index', compact('data'));
        } else return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check() && Auth::user()->level == 'staff') {
            return view('banner.create');
        } else return redirect('/');
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
            'caption' => 'required',
            'image'   => 'sometimes|max:8000',
        ]);

        $file = $request->file('image');

        if(Auth::check() && Auth::user()->level == 'staff') {
            if ($file) {
                Banner::create([
                    'caption' => $request->caption,
                    'image'   => $file->getClientOriginalName(),
                ]);

                //Move Uploaded File
                $destinationPath = 'uploads/info';
                $file->move($destinationPath,$file->getClientOriginalName());
            } else {
                Banner::create([
                    'caption' => $request->caption,
                    'image'   => "banner1.jpg",
                ]);
            }

            \Session::flash('banner_add','Data banner berhasil di tambah');

            return redirect('/banner');
        } else return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $data
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check() && Auth::user()->level == 'staff') {
            $data = Banner::where('id',$id)->first();
            return view('banner.edit',compact('data'));
        } else return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'caption' => 'required',
            'image'   => 'sometimes|max:8000',
        ]);

        $file = $request->file('image');

        if(Auth::check() && Auth::user()->level == 'staff') {
            if ($file) {
                Banner::where('id',$id)->update([
                    'caption' => $request->caption,
                    'image'   => $file->getClientOriginalName(),
                ]);

                //Move Uploaded File
                $destinationPath = 'uploads/info';
                $file->move($destinationPath,$file->getClientOriginalName());
            } else {
                Banner::where('id',$id)->update([
                    'caption' => $request->caption,
                    'image'   => "banner1.jpg",
                ]);
            }

            \Session::flash('banner_update','Data banner berhasil di ubah');

            return redirect('/banner');
        } else return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner   $data
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check() && Auth::user()->level == 'staff') {
            Banner::where('id',$id)->delete();

            \Session::flash('banner_delete','Data banner berhasil di hapus');

            return redirect('/banner');
        } else return redirect('/');
    }
}
