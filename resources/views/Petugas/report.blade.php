<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @media print {
            .print-button {
                display: none;
            }

            body {
                margin: 0;
                padding: 20px;
            }

            .container{
                font-size: 2rem;
            }
            
            h1{
                font-size: 50px;
                color: black
            }
        }

        header {
            background-color: #007bff;
            padding: 20px;
            color: #fff;
        }

        main {
            margin-top: 20px;
        }

        
        .report-field {
            margin-bottom: 15px;
        }

        .report-field label {
            font-weight: bold;
        }

        .report-field img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        @foreach ($pengaduan as $item)
        <header class="text-center">
            <h1>Laporan Pengaduan Masyarakat</h1>
        </header>
        <main class="report">
            <div class="report-field">
                <label>Nama:</label>
                <span>{{$item->nama}}</span>
            </div>
            <div class="report-field">
                <label>Nik:</label>
                <span>{{$item->nik}}</span>
            </div>
            <div class="report-field">
                <label>Nomor Telepon:</label>
                <span>{{$item->telp}}</span>
            </div>
            <div class="report-field">
                <label>Pengaduan:</label>
                <p>{{$item->isi_laporan}}</p>
            </div>
            <div class="report-field">
                <label>Foto:</label>
                <span><img src="{{ asset("/img/$item->foto") }}"></span>
            </div>
        </main>

        <button class="btn btn-primary print-button" onclick="window.print()">Print</button>
        @endforeach
    </div>

    <!-- Bootstrap JS and jQuery (you might need to include them based on your needs) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>