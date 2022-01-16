<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/assets/css/style.css" rel="stylesheet" >

    <title>Admin belépés</title>
  </head>
  <body id="login">
    <h1>Admin belépés</h1>

<div class="shadow p-3 col-md-4">
 
  @error('invalid')
  <div class="alert alert-danger">{{$errors->first('invalid')}}</div>
  @enderror
<form action="" method="post">
<div class="mb-3" >
  <label for="email" class="form-label">E-mail</label>
  <input type="email" name="email" class="form-control" id="email" placeholder="E-mail cím ...">
  @error('email')
      <span class="text-danger">{{$message}}</span>
  @enderror
</div>
<div class="mb-3">
  <label for="password" class="form-label">Jelszó</label>
  <input type="password" class="form-control" name="password" id="password" placeholder="Admin jelszó ...">
  @error('password')
  <span class="text-danger">{{$message}}</span>
  @enderror
</div>

<div class="text-center">
  <button class="btn btn-success">Belépés</button>
</div>

@csrf
</form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>