@include('layout.navbar')
@section('content')
    
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="css/bg.css">
</head>
<body>
<h4 style="text-align: center; margin-top: 20px; margin-bottom: 30px;">Data Laporan Masyarakat</h4>  
<div style="width: 100%; justify-content: center;">
    <table class="table table-hover container" style="background-color: rgba(238, 234, 234, 0.8);
     border-radius:5px;box-shadow: 5px 5px #BAD7E9; text-align:center;" width="100px">
      <thead>

        <tr>
            <th scope="col">Id_Pengaduan</th>
            <th scope="col">Tanggal_Pengaduan</th>
            <th scope="col">Isi_Laporan</th>
            <th scope="col">Foto</th>
            <th scope="col">Status</th>
            <th scope="col">opsi</th>
        </tr> 
      </thead>
      @foreach($pengaduan as $pengaduan)
      <tbody class="table-group-divider">
    <td>{{$pengaduan->id_pengaduan}}</td>
    <td>{{ $pengaduan->tgl_pengaduan}}</td>
    <td>{{ $pengaduan->isi_laporan}}</td>
    <td><img style="width: 70px;height: 80px" src="{{asset("/img/$pengaduan->foto")}}"></td>
    <td>{{ $pengaduan->status}}</td>
    <td>
      <form method="POST" action="/DetailLaporan/hapus/{{ $pengaduan->id_pengaduan }}">
        @csrf
        {{-- @method('DELETE')
        <button type="submit" class="btn btn-danger" >Hapus</button> --}}
        {{-- @method('') --}}
        <a type="submit" class="btn btn-success" href="/DetailLaporan/detail/{{ $pengaduan->id_pengaduan }}">Detail</a>
   
    </form>
    </td>

  </tbody>
  @endforeach
      </table>
</div>
</body>
</html>