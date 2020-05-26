@extends('layouts.test')

@section('content')
<p><a href="{{ url('/buku/form-tambah') }}">Tambah</a></p>
	<table border="1">
		<thead>
			<th>No</th>
			<th>Sampul</th>
			<th>Nama Buku</th>
			<th>Kategori</th>
			<th>Status</th>
			<th>Aksi</th>
		</thead>
		<tbody>
			@foreach($data as $e=>$dt)
	        <tr>
	        	<td>{{$e+1}}</td>
	            <td>{{$dt->image_cover}}</td>
	            <td>{{$dt->title}}</td>
	            <td>{{$dt->category->name}}</td>
	            <td>{{$dt->status}}</td>
	            <td>
	            	<a href="{{url('/buku/detail/'.$dt->slug)}}">detail</a>
	            	<a href="{{url('/buku/form-edit/'.$dt->slug)}}">edit</a>
	            	<a href="{{url('/buku/hapus/'.$dt->id)}}">hapus</a>
	            </td>
	        </tr>
	        @endforeach
        </tbody>
    </table>
@endsection