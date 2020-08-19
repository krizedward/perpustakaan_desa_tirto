<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buku Berhasil Dikembalikan</title>
</head>
<body>
  <h3>Buku Berhasil Dikembalikan</h3>
  <p><img src="book_image.jpg" style="height:350px"></img></p>
  <p>Nama peminjam: {{ $borrow->member->user->name }}</p>
  <p>Buku dikembalikan: [{{ $borrow->codebook->code }}] {{ $borrow->codebook->book->title }}</p>
  <p>Tanggal peminjaman buku: {{ $borrow->updated_at }}</p>
  <p>Tanggal pengembalian buku: {{ $borrow_return->updated_at }}</p>
</body>
</html>