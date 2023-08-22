<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/kanban_board/resources/js/bootstrap.min.js"></script>
    <script src="/kanban_board/resources/js/jquery.js"></script>
    <link rel="stylesheet" href="/kanban_board/resources/css/bootstrap.min.css">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* Стили для скролла */
        ::-webkit-scrollbar {
            width: 6px;
        } 
        ::-webkit-scrollbar-track {
            background-color:gainsboro;
            border-radius: 3px;
        } 
        ::-webkit-scrollbar-thumb {
            background-color:darkgrey;
            border-radius: 3px;
        }
    </style>
    @include('header')
    @include('profile.modal_dialog')
    @include('profile.body_profile')
    @include('profile.projects')
    @include('profile.participants')
    @include('footer')
    <title>Profile</title>
</head>

<body style="background-color: #FFFACD">

    <div class="container-xxl">

        @yield('header', 'Не удалось получить список операторов')

        @yield('modal_dialog', 'Не удалось получить список операторов') 
        
        <div class="container-fluid">
            
            @yield('body_profile', 'Не удалось получить список операторов')
            
            <div class="row">

                @yield('projects', 'Не удалось получить список операторов')

                @yield('participants', 'Не удалось получить список операторов')

            </div>
            
        </div>

    </div>

    @yield('footer', 'Не удалось получить список операторов') 

    <script>
        let nameDefault = '{{$userData['name']}}';
        let emailDefault = '{{$userData['email']}}';
        let phoneDefault = '{{$userData['phone']}}';
        let urlEditPassword = "{!! route('post.userEditPassword') !!}";
        let urlUserEdit = "{!! route('post.userEdit') !!}";
    </script>
    <script src="/kanban_board/resources/js/profile_scripts.js"></script>
</body>

</html>
