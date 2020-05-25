@extends('layouts.test')

@section('content')
<h1>form</h1>
<form method="post" action="{{ url('/kategori/tambah') }}">
	@csrf
	<label>Kategori :</label>
	<input type="text" name="name" placeholder="name">
	<button type="submit">Submit</button>
</form>
@endsection