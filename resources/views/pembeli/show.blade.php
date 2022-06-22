<!-- Kalau Membuat UI untuk show jangan menggunakan tabel -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Show Kategori</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Detail Pembeli</h2>  
  @if($message)         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Tlp</th>
      </tr>
    </thead>
    <tbody>
        <tr> 
            <td>{{ $message -> name}}</td>
            <td>{{ $message -> address}}</td>
            <td>{{ $message -> telepon}}</td>
        </tr>
    </tbody>
  </table>
  @else
  <h2>Tidak ada Data</h2>
  @endif

</div>

</body>
</html>
