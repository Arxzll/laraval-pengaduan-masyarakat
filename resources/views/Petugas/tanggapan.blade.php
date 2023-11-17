@include('layout.navpetugas')

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
    <h4 style="text-align: center; margin-top: 20px; margin-bottom: 20px;">Tanggapan</h4>  
    <div class="container" style="width:100%;">
    <form action="" method="POST" enctype="multipart/form-data">
      @method("POST")
      @csrf
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label" style="color: black;">Berikan Tangapan</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="tanggapan"></textarea>
    @error('tanggapan')
    <script>Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Silahkan Isi Tanggapannya!',
    })</script>
    @enderror
    </div>
    <button type="submit" class="btn btn-primary">kirim</button>
    </form>
  </div>
 