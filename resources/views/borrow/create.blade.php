@extends('layouts.test')

@section('content')
<h1>form</h1>
<form action="{{url('/pinjam/tambah')}}" method="post" enctype="multipart/form-data">
	@csrf
	<label>Pilih Anggota</label>
	<select name="user">
		<option selected="" disabled="">Pilih Anggota</option>
		@foreach($user as $dt)
		<option value="{{$dt->id}}">{{$dt->name}}</option>
		@endforeach
	</select><br>
	<label>Pilih Buku</label>
	<select name="book">
		<option selected="" disabled="">Pilih Buku</option>
		@foreach($book as $dt)
		<option value="{{$dt->id}}">{{$dt->title}}</option>
		@endforeach
	</select><br>
	<button type="submit">Submit</button>
</form>
@endsection