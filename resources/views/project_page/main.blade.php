<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="../../resources/js/bootstrap.min.js"></script>
    <script src="../../resources/js/jquery.js"></script>
    <link rel="stylesheet" href="../../resources/css/bootstrap.min.css">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <title>Главная страница</title>
    @include('header')
    @include('footer')
    @include('project_page.settings_menu.main')
    @include('project_page.project_milestone_table.body')
    
</head>
<body style="background-color: #FFFACD;">
    @yield('header', 'Не удалось получить  шапку') 
    @yield('setting_menu', 'Не удалось получить настройки проекта') 
    @yield('project_milestone_table', 'Не удалось получить список этапов') 
<<<<<<< HEAD
    
=======

>>>>>>> main
</body>
</html>