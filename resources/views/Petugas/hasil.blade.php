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
  <link rel="stylesheet" href="css/bg.css">
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

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
              <td scope="col">verifikasi</td>
          </tr> 
        </thead>
      @foreach($pengaduan as $pengaduan)
      <tbody class="table-group-divider">
    <td>{{$pengaduan->id_pengaduan}}</td>
    <td>{{ $pengaduan->tgl_pengaduan}}</td>
    <td>{{ $pengaduan->isi_laporan}}</td>
    <td><img style="width: 70px;height: 80px" src="{{asset("/img/$pengaduan->foto")}}"></td>
    <td>
      @if($pengaduan->status == 'selesai')
          <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
              <!-- Your SVG path for 'selesai' status -->
              <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/>
          </svg>
      @elseif($pengaduan->status == 'proses')
          <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
              <!-- Your SVG path for 'proses' status -->
              <path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/>
          </svg>

          @elseif($pengaduan->status == 'ditolak')
          <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
      @elseif($pengaduan->status == '0')
      <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M222.7 32.1c5 16.9-4.6 34.8-21.5 39.8C121.8 95.6 64 169.1 64 256c0 106 86 192 192 192s192-86 192-192c0-86.9-57.8-160.4-137.1-184.1c-16.9-5-26.6-22.9-21.5-39.8s22.9-26.6 39.8-21.5C434.9 42.1 512 140 512 256c0 141.4-114.6 256-256 256S0 397.4 0 256C0 140 77.1 42.1 182.9 10.6c16.9-5 34.8 4.6 39.8 21.5z"/></svg>          @endif
      <!-- Additional content or code for both cases -->
  </td>
      <td>
      <form method="POST" action="/PengaduanController/hapus/{{ $pengaduan->id_pengaduan }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="alert('Yakin?')">Hapus</button>

        <a type="submit" class="btn btn-success" href="/Petugas/DetailLaporan/Tanggapan/{{ $pengaduan->id_pengaduan }}">Tanggapan</a>
        <a type="submit" class="btn btn-success" href="/Petugas/DetailLaporan/detail/{{ $pengaduan->id_pengaduan }}">Detail</a>
    </form>
    <td>
      @if ($pengaduan->status == '0')
      {{-- Show 'Terima' and 'Tolak' buttons --}}
          <a href="/Petugas/DetailLaporan/terima/{{$pengaduan->id_pengaduan}}" type="submit" class="btn btn-success">Terima</a>
          <a href="/Petugas/DetailLaporan/tolak/{{$pengaduan->id_pengaduan}}" type="submit" class="btn btn-danger">Tolak</a>
  @elseif ($pengaduan->status == 'proses')
      {{-- Show 'Selesai' a --}}
          <a href="/Petugas/DetailLaporan/selesai/{{$pengaduan->id_pengaduan}}" type="submit" class="btn btn-primary">Selesai</a>
  @else
      {{-- Hide buttons when status is 'selesai' --}}
      <span>No actions available</span>
  @endif
  </td> 
    </td>

  </tbody>
  @endforeach
      </table>
</div>
</body>
</html>