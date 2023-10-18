@extends('layout.navbar')

@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/home.css">
        <title></title>
        <link rel="stylesheet" href="/css/bg.css">
    </head>
    <body>
        <div class="container" style="padding: 30px; background-color: transparent; margin-top: 50px; box-shadow: 0 4px 8px 0rgba(0,0,0,0.2) 0 6px rgba(0, 0, 0, 0.19);">
            <form action="{{route('updatepengaudan', ['id' => $data['id_pengaduan']])}}" method="POST" enctype="multipart/form-data">
                @method("PUT")
                @csrf
            <h1 style="margin-top: 30 px; text-align: center; color: black;">Update Laporan</h1>
            <div class="container">
              <div class="mb-3">
                <label for="isi_laporan" class="form-label" style="color: black;">isi_laporan</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi_laporan" maxlength="255">{{$data['isi_laporan']}}</textarea>
                @error('isi_laporan')
                    <div>{{'Isi Laporannya dulu ya!!!'}}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="foto" class="form-label" style="color:  black;">foto</label>
                <input type="file" class="form-control"  name="foto" placeholder="">
              </div>
              <button class="btn btn-primary">Update</button>
        </form>
        </div>
    </body>
    </html>
@endsection