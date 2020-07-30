<?php

namespace App\Http\Controllers;

use App\Models\CollectionLink;
use App\Models\Member;
use App\Models\Book;
use App\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function guest()
    {
        $data = Book::all();
        return view('welcome',compact('data'));
    }

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
            
            User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => bcrypt('12345678'),
            ]);

            $user = User::all()->last();

            Member::create([
                'user_id'   =>  $user->id,
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

            User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => bcrypt('12345678'),
            ]);
            
            $user = User::all()->last();

            Member::create([
                'user_id'   =>  $user->id,
                'gender'    =>  $request->gender,
                'phone'     =>  $request->phone,
                'birthdate' =>  $request->birthdate,
                'image'     =>  'user.jpg',
                'expire_at' =>  $request->expired,
            ]);

        }

        \Session::flash('anggota_add','Berhasil menambahkan data anggota baru');

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
        $data = Member::where('user_id',$id)->first();
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
            'email'      => 'required',
            'gender'    => 'required',
            'phone'     => 'required',
            'birthdate' => 'required',
            'expired'   => 'required',
        ]);

        $file = $request->file('image');
        $user = Member::where('id',$id)->first();

        if ($file) {
            
            Member::where('id',$id)->update([
                'gender'    =>  $request->gender,
                'phone'     =>  $request->phone,
                'birthdate' =>  $request->birthdate,
                'image'     =>  $file->getClientOriginalName(),
                'expire_at' =>  $request->expired,
            ]);

                //Move Uploaded File
                $destinationPath = 'uploads/anggota';
                $file->move($destinationPath,$file->getClientOriginalName());

        } else {

            Member::where('id',$id)->update([
                'gender'    =>  $request->gender,
                'phone'     =>  $request->phone,
                'birthdate' =>  $request->birthdate,
                'image'     =>  'user.jpg',
                'expire_at' =>  $request->expired,
            ]);

        }

        User::where('id',$user->user_id)->update([
            'name'      =>  $request->name,
            'email'     =>  $request->email,
        ]);

        \Session::flash('anggota_update','Berhasil mengubah data anggota');

        $member = Member::where('id',$id)->first();

        return redirect('/anggota/form-edit/'.$member->user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        
        \Session::flash('anggota_delete','Berhasil menghapus data anggota');

        return redirect('/anggota');
    }

    public function active($id)
    {
        $dt = Member::where('id',$id)->first();
        
        User::where('id',$dt->user_id)->update([
            'status' => 'active',
        ]);
        
        \Session::flash('active','Berhasil mengaktifkan anggota');

        return redirect('/anggota');
    }

    public function nonactive($id)
    {
        $dt = Member::where('id',$id)->first();
        
        User::where('id',$dt->user_id)->update([
            'status' => 'unactive',
        ]);


        \Session::flash('unactive','Berhasil mengnon-aktifkan anggota');

        return redirect('/anggota');
    }
}
