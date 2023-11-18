@include('layout.navbar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>img.orang {
        float: center;
        margin : 30px;
    }
    .text{
        text-align: center;
        margin: 70px;
        position: absolute;
        left: 33%;
    }
    </style>
    <link rel="stylesheet" href="{{asset('/css/bg.css')}}">
</head>
<body>
   
    <div class="d-flex">
<img class="orang d-none d-md-block" src="{{asset("/image/orang.png")}}" alt=""  height="430px">
<div class="text">
    <center>
        <h2>Selamat Datang Di Pengaduan Masyarakat</h2>
        <h3>Silahkan Adukan Keluhan Anda Kepada Kami</h3>
    </center>
</div>
    </div>
    </html>