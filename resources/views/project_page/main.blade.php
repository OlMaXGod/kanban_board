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
    @include('modal_windows.update_stage')
    @include('modal_windows.create_stage')
    
    
</head>
<body style="background-color: #FFFACD;">
    @yield('header', 'Не удалось получить  шапку') 
    @yield('setting_menu', 'Не удалось получить настройки проекта') 
    @yield('project_milestone_table', 'Не удалось получить список этапов') 

    <script>
        let urlGetRoles = "{!! route('get.roles') !!}";

        let urlGetParticipant = "{!! route('get.participant') !!}";
        let urlGetParticipants = "{!! route('get.participants') !!}";
        let urlGetParticipantsInvited = "{!! route('get.participantsInvited') !!}";
    </script>
    <script type="module">
        import {loadingParticipants, loadingParticipantsInvited} from '/kanban_board/resources/js/profile_scripts/functions/projects.js'
        import {loadingRoles} from '/kanban_board/resources/js/profile_scripts/functions/main.js'

        $(document).ready(function(){
            let roleDefault = 3;

            let idProject = '{{url()->current()}}'.split('/').pop();

            loadingRoles();
            loadingParticipants(idProject);
            loadingParticipantsInvited(idProject, roleDefault);	            
        });
    </script>
    <script type="module" src="/kanban_board/resources/js/profile_scripts/participants.js"></script>
    @yield('subtask_information', 'Не удалось получить модальное окно этапа') 
    @yield('modal_update_stage', 'Не удалось получить модальное окно этапа') 
    @yield('modal_create_stage', 'Не удалось получить модальное окно этапа') 
</body>
</html>