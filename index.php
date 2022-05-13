<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="lib/bootstrap-5.1.3/css/bootstrap.min.css">
  <script src="lib/bootstrap-5.1.3/js/bootstrap.min.js"></script>
  <style>
    html,
    body {
      height: 100%;
    }

    body {
      display: flex;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
    }

    .form-signin .checkbox {
      font-weight: 400;
    }

    .form-signin .form-floating:focus-within {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

  </style>
</head>

<body class="text-center">
  <main class="form-signin">
    <form action="controller/usuarioController.php" method="post">
      <h1 class="h3 mb-3 fw-normal">Sistema LV-II</h1>

      <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput">
        <label for="floatingInput">Email</label>
      </div>
      <div class="form-floating">
        <input type="password" name="senha" class="form-control" id="floatingPassword">
        <label for="floatingPassword">Senha</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
      <p class="mt-3 mb-3 text-muted">&copy; 2022</p>
    </form>
  </main>

</body>
<b>Escola</b>
  <b>Escola teste</b>
</html>
