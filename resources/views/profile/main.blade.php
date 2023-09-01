<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/kanban_board/resources/js/bootstrap.min.js"></script>
    <script src="/kanban_board/resources/js/jquery.js"></script>    
    <script type="text/javascript" src="/kanban_board/resources/datepicker/datepicker.js"></script>
    <link rel="stylesheet" href="/kanban_board/resources/datepicker/css/datepicker.css">
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
    @include('modal_windows.update_project')
    @include('modal_windows.update_stage')
    @include('toasts.success_change_data')
    @include('footer')
    <title>Профиль</title>
</head>

<body style="background-color: #FFFACD">
    <button type="button" id="editStaqgeButton" data-bs-toggle="modal" data-bs-target="#update-stage" class="btn btn-secondary mt-2 mx-auto">
        Настройки этапа
    </button>
    <a type="button" class="btn btn-secondary mt-2 mx-auto" href="http://localhost/kanban_board/public/project-page/1?invite=true">Модальное окно</a>

        
    @yield('header', 'Не удалось получить шапку')

    @yield('modal_dialog_change', 'Не удалось получить модальное окно профиля') 
    @yield('modal_dialog_del_participant', 'Не удалось получить модальное окно удаления участника') 
    @yield('modal_dialog_del_project', 'Не удалось получить модальное окно удаления проекта')
    @yield('modal_update_project', 'Не удалось получить модальное окно настройки проекта') 
    @yield('modal_update_stage', 'Не удалось получить модальное окно настройки этапа') 
    @yield('toast_success_change_data', 'Не удалось получить оповещение')

    <div class="container-xxl">        
        <div class="container-fluid">
            
            @yield('body_profile', 'Не удалось получить блок профиля')
            
            <div class="row">

                @yield('projects', 'Не удалось получить блок проектов')

                @yield('participants', 'Не удалось получить блок участников')

            </div>
            
        </div>

    </div>

    @yield('footer', 'Не удалось получить подвал') 

    <script>
        let nameDefault = '{{$userData['name']}}';
        let emailDefault = '{{$userData['email']}}';
        let phoneDefault = '{{$userData['phone']}}';

        let urlUpdatePassword = "{!! route('post.userPasswordUpdate') !!}";
        let urlUpdateUser = "{!! route('post.userUpdate') !!}";

        let urlGetProject = "{!! route('get.project') !!}";
        let urlGetProjects = "{!! route('get.projects') !!}";
        let urlUpdateProject = "{!! route('updateProject') !!}";
        let urlDeleteProject = "{!! route('delete.project') !!}";
        
        let urlGetRoles = "{!! route('get.roles') !!}";
        
        let urlGetParticipant = "{!! route('get.participant') !!}";
        let urlGetParticipants = "{!! route('get.participants') !!}";
        let urlGetParticipantsInvited = "{!! route('get.participantsInvited') !!}";
        let urlAddParticipant = "{!! route('addParticipant') !!}";
        let urlUpdateParticipant = "{!! route('post.participantUpdate') !!}";
        let urlDeleteParticipant = "{!! route('delete.participant') !!}";
    </script>
    <script type="module" src="/kanban_board/resources/js/profile_scripts/main.js"></script>
    <script type="module" src="/kanban_board/resources/js/profile_scripts/body.js"></script>
    <script type="module" src="/kanban_board/resources/js/profile_scripts/participants.js"></script>
    <script type="module" src="/kanban_board/resources/js/profile_scripts/projects.js"></script>
</body>

</html>
