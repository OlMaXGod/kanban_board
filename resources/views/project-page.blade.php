<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="../../resources/js/bootstrap.min.js"></script>
    <script src="../../resources/js/jquery.js"></script>
    
    <link rel="stylesheet" href="../../resources/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
    @include('header')
    @include('modal_windows.invite_project')

    <title>Главная страница</title>
</head>
<body style="background-color: #FFFACD;">

     @yield('header', 'Не удалось получить список шапку') 

    @if(!empty($_GET['invite']) && $_GET['invite'] == 'true')
        @yield('modal_invite_project', 'Не удалось получить модальное окно настройки этапа') 
    @endif

</body>
</html>