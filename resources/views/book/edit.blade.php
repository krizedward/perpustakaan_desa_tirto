@extends('layouts.test')

@section('content')
<h1>Edit</h1>
<form action="{{url('/buku/update/'.$book->id)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method('put')
	<label>Judul Buku</label>
	<input type="text" name="title" value="{{$book->title}}"><br>
	<label>Keterangan Buku</label>
	<textarea name="description">{{$book->description}}</textarea><br>
	<label>Stok Buku</label>
	<input type="number" min="0" max="999" name="stock" value="{{$book->stock}}"><br>
	<label>Pilih Kategori</label>
	<select name="category">
		<option selected="" disabled="">Pilih Kategori</option>
		@foreach($category as $dt)
		<option value="{{$dt->id}}" {{ ($book->category_id == $dt->id) ? 'selected' : '' }}>{{$dt->name}}</option>
		@endforeach
	</select><br>
	<label>Cover Sampul</label>
	<input type="file" name="image"><br>
	<button type="submit">Submit</button>
</form>
@endsection