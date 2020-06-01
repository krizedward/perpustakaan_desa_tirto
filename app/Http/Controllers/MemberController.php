<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Book;
use App\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Member::all();
        return view('member.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
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
            'name'      => 'required',
            'email'     => 'required',
            'gender'    => 'required',
            'phone'     => 'required',
            'birthdate' => 'required',
            'expired'   => 'required',
        ]);

        $file = $request->file('image');
        
        if ($file) {
            
            Member::create([
                'name'      =>  $request->name,
                'gender'    =>  $request->gender,
                'phone'     =>  $request->phone,
                'birthdate' =>  $request->birthdate,
                'image'     =>  $file->getClientOriginalName(),
                'expire_at' =>  $request->expired,
                ]);

            User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => bcrypt('12345678'),
            ]);

                //Move Uploaded File
                $destinationPath = 'uploads';
                $file->move($destinationPath,$file->getClientOriginalName());

        } else {

            Member::create([
                'name'      =>  $request->name,
                'gender'    =>  $request->gender,
                'phone'     =>  $request->phone,
                'birthdate' =>  $request->birthdate,
                'image'     =>  'user.jpg',
                'expire_at' =>  $request->expired,
            ]);

            User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => bcrypt('12345678'),
            ]);
        }

        

        return redirect('/anggota');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Member::where('id',$id)->first();
        return view('member.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Member::where('id',$id)->first();
        return view('member.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required',
            'gender'    => 'required',
            'phone'     => 'required',
            'birthdate' => 'required',
            'expired'   => 'required',
        ]);

        $file = $request->file('image');
        
        if ($file) {
            
            Member::where('id',$id)->update([
                'name'      =>  $request->name,
                'gender'    =>  $request->gender,
                'phone'     =>  $request->phone,
                'birthdate' =>  $request->birthdate,
                'image'     =>  $file->getClientOriginalName(),
                'expire_at' =>  $request->expired,
                ]);

                //Move Uploaded File
                $destinationPath = 'uploads';
                $file->move($destinationPath,$file->getClientOriginalName());

        } else {

            Member::where('id',$id)->update([
                'name'      =>  $request->name,
                'gender'    =>  $request->gender,
                'phone'     =>  $request->phone,
                'birthdate' =>  $request->birthdate,
                'image'     =>  'user.jpg',
                'expire_at' =>  $request->expired,
            ]);
        }

        return redirect('/anggota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::where('id',$id)->delete();

        return redirect('/anggota');
    }

    public function landing()
    {
        $data = Book::all();
        return view('home',compact('data'));
    }

    public function list()
    {
        $data = Book::all();
        return view('member.book',compact('data'));
    }
}
