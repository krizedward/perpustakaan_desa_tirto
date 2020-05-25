@extends('layouts.test')

@section('content')
<p><a href="{{ url('/kategori/form-tambah') }}">Tambah</a></p>
	<table border="1">
		<thead>
			<th>No</th>
			<th>Nama Kategori</th>
			<th>Aksi</th>
		</thead>
		<tbody>
			@foreach($data as $e=>$dt)
	        <tr>
	        	<td>{{$e+1}}</td>
	            <td>{{$dt->name}}</td>
	            <td>
	            	<a href="{{url('/kategori/form-edit/'.$dt->slug)}}">edit</a>
	            	<a href="{{url('/kategori/hapus/'.$dt->id)}}">hapus</a>
	            </td>
	        </tr>
	        @endforeach
        </tbody>
    </table>
@endsection