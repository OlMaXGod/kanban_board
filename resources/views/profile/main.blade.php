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
    @include('profile.modal_dialog_change')
    @include('profile.modal_dialog_del_participant')
    @include('profile.modal_dialog_del_project')
    @include('profile.body_profile')
    @include('profile.projects')
    @include('profile.participants')
    @include('footer')
    <title>Profile</title>
</head>

<body style="background-color: #FFFACD">

    <div class="container-xxl">

        @yield('header', 'Не удалось получить шапку')

        @yield('modal_dialog_change', 'Не удалось получить модальное окно профиля') 
        @yield('modal_dialog_del_participant', 'Не удалось получить модальное окно удаления участника') 
        @yield('modal_dialog_del_project', 'Не удалось получить модальное окно удаления проекта') 
        
        <div class="container-fluid">
            
            @yield('body_profile', 'Не удалось получить блок профиля')
            
            <div class="row">

                @yield('projects', 'Не удалось получить блок проектов')

                @yield('participants', 'Не удалось получить блок участников')

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

        let urlGetProjects = "{!! route('get.projects') !!}";
        let urlDeleteProject = "{!! route('delete.project') !!}";

        let urlGetRoles = "{!! route('get.roles') !!}";
        
        let urlGetParticipant = "{!! route('get.participant') !!}";
        let urlGetParticipants = "{!! route('get.participants') !!}";
        let urlDeleteParticipant = "{!! route('delete.participant') !!}";
    </script>
    <script src="/kanban_board/resources/js/profile_scripts.js"></script>
</body>

</html>
