@extends('layouts.test')

@section('content')
<h1>form</h1>
<form method="post" action="{{ url('/kategori/update/'.$category->id) }}">
	@csrf
	@method('put')
	<label>Kategori :</label>
	<input type="text" name="name" placeholder="name" value="{{ $category->name }}">
	<button type="submit">Submit</button>
</form>
@endsection