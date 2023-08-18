
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="../resources/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    @include('authorization.authorization')
    @include('authorization.register')
    <title>Авторизация</title>
</head>
<body>

  @if(empty($_GET['register']))
    @yield('authorization', 'Не удалось получить список операторов')
  @endif
  @if(!empty($_GET['register']))
    @yield('register', 'Не удалось получить список операторов')
  @endif

</body>
</html>