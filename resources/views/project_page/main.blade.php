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
    @include('profile.modal_dialog_del_participant')
    @include('toasts.success_change_data')
    
    
</head>
<body style="background-color: #FFFACD;">
    @yield('header', 'Не удалось получить  шапку') 
    @yield('setting_menu', 'Не удалось получить настройки проекта') 
    @yield('project_milestone_table', 'Не удалось получить список этапов') 

    @yield('subtask_information', 'Не удалось получить модальное окно этапа') 
    @yield('modal_update_stage', 'Не удалось получить модальное окно этапа') 
    @yield('modal_create_stage', 'Не удалось получить модальное окно этапа') 
    @yield('modal_dialog_del_participant', 'Не удалось получить модальное окно удаления участника') 
    @yield('toast_success_change_data', 'Не удалось получить оповещение')
    
    <script>
        let urlGetRoles = "{!! route('get.roles') !!}";

        let urlAddParticipant = "{!! route('addParticipant') !!}";
        let urlGetParticipant = "{!! route('get.participant') !!}";
        let urlGetParticipants = "{!! route('get.participants') !!}";
        let urlGetParticipantsInvited = "{!! route('get.participantsInvited') !!}";
        let urlUpdateParticipant = "{!! route('post.participantUpdate') !!}";
        let urlDeleteParticipant = "{!! route('delete.participant') !!}";
    </script>
    <script urlPageWithId="{{url()->current()}}" id="load_project_page" type="module" src="/kanban_board/resources/js/project_page_scripts/main.js"></script>
    <script urlPageWithId="{{url()->current()}}" id="participants_script" type="module" src="/kanban_board/resources/js/profile_scripts/participants.js"></script>
</body>
</html>