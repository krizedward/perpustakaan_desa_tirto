@extends('layouts.test')

@section('content')
<h1>Detail</h1>
<p><a href="{{url('/buku')}}">back</a></p>

<p>{{$book->title}}</p>
<p>{{$book->description}}</p>
<p>{{$book->stock}}</p>
<p>{{$book->image_cover}}</p>
<p>{{$book->status}}</p>
<p>{{$book->category->name}}</p>
@endsection