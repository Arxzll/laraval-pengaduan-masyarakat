@section('content')
@endsection
<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <title>Document</title>
      <link rel="stylesheet" href="css/register.css">
      <link rel="stylesheet" href="css/bg.css">
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Asap+Condensed:wght@200;300;500;600&family=Bebas+Neue&display=swap');
           body{
             font-family: "Asap Condensed";
           }
     .material-symbols-outlined {
       font-variation-settings:
       'FILL' 0,
       'wght' 400,
       'GRAD' 0,
       'opsz' 24
     }
     
         </style>
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        </head>
    </head>
    <body class="align">

      <div class="grid container mb-5 register">
    
        <form method="POST" action="" class="container mt-5" style="background-color: rgba(238, 234, 234, 0.8); 
        border-radius:5px;box-shadow: 5px 5px #BAD7E9 ;">   
          @method("POST")
          @csrf
          <div class="mb-3">
            <h2 class="text-center" style="padding-top: 20px;color: #0079FF; text-shadow: 2px 2px #BAD7E9">Login Petugas</h2>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputall1">
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="rememberMe" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
          </div>
          <center><button type="submit" name="submit" class="btn btn-primary mb-3">LogIn</button></center>
        </form>
    
      </div>
    </body>

