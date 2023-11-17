@include('layout.navpetugas')
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
  <link rel="stylesheet" href="/css/bg.css">
</head>
<body>
<h4 style="text-align: center; margin-top: 20px; margin-bottom: 30px;">Detail Data Laporan Masyarakat</h4>  
<div style="width: 100%; justify-content: center;">
    <table class="table table-hover container" style="background-color: rgba(238, 234, 234, 0.8);; border-radius:5px;box-shadow: 5px 5px rgb(180, 180, 180,0.8); text-align:center;" width="100px">
      <thead>

        <tr>
          <th scope="col">Id_Pengaduan</th>
          <th scope="col">Tanggal_Pengaduan</th>
          <th scope="col">Isi_Laporan</th>
          <td scope="col">Tanggapan</td>
          <th scope="col">Foto</th>
          <th scope="col">Status</th>
          <th scope="col">Opsi</th>
      </tr> 
      </thead>
      <tbody class="table-group-divider">
        <td>{{$pengaduan->id_pengaduan}}</td>
        <td>{{ $pengaduan->tgl_pengaduan}}</td>
        <td>{{ $pengaduan->isi_laporan}}</td>
        <td>{{ $pengaduan->tanggapan}}</td>
        <td><img style="width: 70px;height: 80px" src="{{asset("/img/$pengaduan->foto")}}"></td>
        <td>{{ $pengaduan->status}}</td>
        @if (Auth::guard('petugas')->check() && Auth::guard('petugas')->user()->level === 'admin')
        <td><a href="/Petugas/hasil/detail_pengaduan/generate-report/{{$pengaduan->id_pengaduan}}" class="btn btn-primary">Print</a></td>
        @else
        <td><span>Tidak ada Opsi yang tersedia untuk petugas</span></td>
        @endif
  </tbody>
      </table>
</div>
</body>
</html>