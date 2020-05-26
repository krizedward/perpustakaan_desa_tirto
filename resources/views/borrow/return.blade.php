@extends('layouts.test')

@section('content')
<p><a href="{{ url('/pinjam') }}">Pinjam</a></p>
	<table border="1">
		<thead>
			<th>No</th>
			<th>Nama Member</th>
			<th>Nama Buku</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Kembali</th>
			<th>Waktu Terlambat</th>
			<th>Status</th>
			<th>Aksi</th>
		</thead>
		<tbody>

			<td>asd</td>
			<td>asd</td>
			<td>asd</td>
			<td>asd</td>
			<td>asd</td>
			<td>asd</td>
			<td>asd</td>
			<td>asd</td>
        </tbody>
    </table>
    <br>
    <table border="1">
		<thead>
			<th>No</th>
			<th>Nama Member</th>
			<th>Nama Buku</th>
			<th>Tanggal Pinjam</th>
			<th>Status</th>
			<th>Aksi</th>
		</thead>
		<tbody>
			@foreach($data as $e=>$dt)
			<tr>
				<td>{{$e+1}}</td>
				<td>{{$dt->book->title}}</td>
				<td>{{$dt->user->name}}</td>
				<td>{{ date('d-M-Y', strtotime($dt->created_at))}}</td>
				<td>{{($dt->status == 'return' ? 'Dikembalikan' : 'Error')}}</td>
				<td>
					<a href="{{url('/pinjam/detail/'.$dt->id)}}">detail</a>
				</td>
			</tr>
			@endforeach
        </tbody>
    </table>
@endsection