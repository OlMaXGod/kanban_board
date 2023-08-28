<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="../resources/js/bootstrap.min.js"></script>
    <script src="../resources/js/jquery.js"></script>
    
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    @include('header')
    @include('footer')
    @include('main_page.projects')
    @include('main_page.projectMenu.main')
    @include('modal_windows.create_project')

    <title>Главная страница</title>
</head>
<body style="background-color: #FFFACD;">

     @yield('header', 'Не удалось получить список шапку') 

     @yield('projects', 'Не удалось получить список проектов') 

     @yield('footer', 'Не удалось получить список подвал') 
     
     @yield('modal_create_project', 'Не удалось получить окно создания проектов') 

</body>
</html>