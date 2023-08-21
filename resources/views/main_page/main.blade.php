<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../resources/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../resources/css/bootstrap.min.css">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    @include('header')
    @include('footer')
    @include('main_page.projects')
    <title>Главная страница</title>
</head>
<body>

     @yield('header', 'Не удалось получить список операторов') 

     @yield('projects', 'Не удалось получить список операторов') 

     @yield('footer', 'Не удалось получить список операторов') 

</body>
</html>