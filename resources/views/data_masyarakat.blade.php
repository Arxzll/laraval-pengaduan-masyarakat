  @include ('layout.navbar')
  @section ('content')
      
  @endsection

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bg.css">
  </head>
  <body>
  <h4 style="text-align: center; margin-top: 20px; margin-bottom: 30px;">Data Masyarakat</h4>  
  <div style="width: 100%; justify-content: center;">
      <table class="table  table-hover container" style="background-color: rgba(238, 234, 234, 0.8);
      border-radius:5px;box-shadow: 5px 5px #BAD7E9; text-align:center;" width="100px">
        <thead>

          <tr>
              <th scope="col">nik</th>
              <th scope="col">nama</th>
              <th scope="col">username</th>
              <th scope="col">no.telp</th>
          </tr> 
        </thead>
        @foreach($masyarakat as $masyarakat)
        <tbody class="table-group-divider">
      <td>{{$masyarakat->nik}}</td>
      <td>{{ $masyarakat->nama}}</td>
      <td>{{ $masyarakat->username}}</td>
      <td>{{$masyarakat->telp}}</td>
      

    </tbody>
    @endforeach
        </table>
  </div>
  </body>
  </html>