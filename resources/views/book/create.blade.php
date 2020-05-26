@extends('layouts.test')

@section('content')
<h1>form</h1>
<form action="{{url('/buku/tambah')}}" method="post" enctype="multipart/form-data">
	@csrf
	<label>Judul Buku</label>
	<input type="text" name="title"><br>
	<label>Keterangan Buku</label>
	<textarea name="description"></textarea><br>
	<label>Stok Buku</label>
	<input type="number" min="0" max="999" name="stock"><br>
	<label>Pilih Kategori</label>
	<select name="category">
		<option selected="" disabled="">Pilih Kategori</option>
		@foreach($category as $dt)
		<option value="{{$dt->id}}">{{$dt->name}}</option>
		@endforeach
	</select><br>
	<label>Cover Sampul</label>
	<input type="file" name="image"><br>
	<button type="submit">Submit</button>
</form>
@endsection