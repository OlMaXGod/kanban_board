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
    @include('header')
    @include('footer')
    <title>Profile</title>
</head>

<body style="background-color: #FFFACD">
    @yield('header', 'Не удалось получить список операторов') 
    <div class="container-xxl">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Обновление пароля</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <label for="firstEnterPass" class="form-label pt-1">Пароль</label>
                <input type="password" class="form-control border-3" id="firstEnterPass">
                <label for="secondEnterPass" class="form-label pt-1">Введите пароль ещё раз</label>
                <input type="password" class="form-control border-3" id="secondEnterPass">
                <div class="alert alert-danger mt-2 invisible" id="alertErrorPassword" role="alert">
                    Пароли не совпадают, попробуйте еще раз
                </div>
                <div class="alert alert-warning mt-2 invisible" id="alertCountSymbolsPassword" role="alert">
                    Длина пароля не может быть меньше 8 символов
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            <button type="button" class="btn btn-primary" id="saveButtonPass">Сохранить пароль</button>
            </div>
        </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row p-1">
            <div class="card card-body" style="background-color:#66cdab1c">
                <div class="row">

                    <div class="col-lg-3 p-1">
                        <div class="w-50 my-5 mx-auto">
                            <img src="/kanban_board/default_profile_image.jpg" style="max-height: 300px; max-weight: 300px"
                                class="img-fluid" alt="default_profile_image.jpg">
                        </div>
                    </div>
                    <div class="col-lg-9 p-1">
                        <div class="m-5" style="max-height:300px">		
                            <label for="exampleInputName" class="form-label pt-1">Имя</label>
                            <input type="text" class="form-control border-3" id="exampleInputName" value={{ $userData['name'] }}>
                            <label for="exampleInputEmail" class="form-label pt-1">Email</label>
                            <input type="email" class="form-control border-3" id="exampleInputEmail" value={{ $userData['email'] }}>
                            <label for="exampleInputPhone" class="form-label pt-1">Телефон</label>
                            <input type="test" class="form-control border-3" id="exampleInputPhone" value={{ $userData['phone'] }}>
                            <button type="button" id="saveButton" class="btn btn-success mt-2 mx-auto disabled">Сохранить изменения</button>                            
                            <button type="button" class="btn btn-primary mt-2 mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Изменить пароль
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 bd-example p-1" data-spy="scroll">
                <div class="card card-body" style="background-color:#66cdab1c; height:350px">
                    <div class="row">

                        <div class="col-4">
                            <div class="list-group" id="list-tab" role="tablist" style="height:300px; overflow-y: scroll;">
                                @foreach ($projectsData as $id => $project)
                                    @if ($loop->first)
                                    <a class="list-group-item list-group-item-action active" id="proect-{{$id}}-list"
                                        data-bs-toggle="list" href="#proect-{{$id}}" role="tab"
                                        aria-controls="proect-{{$id}}">{{ $project['name'] }}</a>
                                    @else
                                    <a class="list-group-item list-group-item-action" id="proect-{{$id}}-list"
                                        data-bs-toggle="list" href="#proect-{{$id}}" role="tab"
                                        aria-controls="proect-{{$id}}">{{ $project['name'] }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="tab-content" id="nav-tabContent">
                                @foreach ($projectsData as $id => $project)
                                    @if ($loop->first)
                                    <div class="tab-pane fade show active" id="proect-{{$id}}" role="tabpanel"
                                        aria-labelledby="proect-{{$id}}-list">{{ $project['comment'] }}</div>
                                    @else
                                    <div class="tab-pane fade show" id="proect-{{$id}}" role="tabpanel"
                                        aria-labelledby="proect-{{$id}}-list">{{ $project['comment'] }}</div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-1">
                4
            </div>
            
        </div>
    </div>
    </div>
    @yield('footer', 'Не удалось получить список операторов') 
    <script>

        let nameDefault = '{{$userData['name']}}';
        let emailDefault = '{{$userData['email']}}';
        let phoneDefault = '{{$userData['phone']}}';

        //{{ Js::from($projectsData) }}
        let projects = {!! json_encode($projectsData) !!};

        $(document).ready(function(){
            
            $("#saveButtonPass").on('click', function(){
                    
                if (!$('#alertErrorPassword').hasClass('invisible')) {
                    $('#alertErrorPassword').addClass('invisible');
                }
                if (!$('#alertCountSymbolsPassword').hasClass('invisible')) {
                    $('#alertCountSymbolsPassword').addClass('invisible');
                }

                if($('#firstEnterPass').val().length <8 || $('#secondEnterPass').val().length <8) {

                    $('#alertCountSymbolsPassword').insertBefore($('#alertErrorPassword'));

                    $('#firstEnterPass').addClass('border-warning');
                    $('#secondEnterPass').addClass('border-warning');
                    $('#alertCountSymbolsPassword').removeClass('invisible');

                    setTimeout(() => {
                        $('#firstEnterPass').removeClass('border-warning');
                        $('#secondEnterPass').removeClass('border-warning');
                    }, 5000);

                } else if($('#firstEnterPass').val() != $('#secondEnterPass').val()) {
                    
                    $('#alertErrorPassword').insertBefore($('#alertCountSymbolsPassword'));

                    $('#firstEnterPass').addClass('border-danger');
                    $('#secondEnterPass').addClass('border-danger');
                    $('#alertErrorPassword').removeClass('invisible');

                    setTimeout(() => {
                        $('#firstEnterPass').removeClass('border-danger');
                        $('#secondEnterPass').removeClass('border-danger');
                    }, 5000);

                } else {

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{!! route('post.userEditPassword') !!}",
                        method: 'post',
                        data: {      
                            phone: $('#exampleInputPhone').val(),
                            email: $('#exampleInputEmail').val(),
                            newPassword: $('#secondEnterPass').val(),
                        },
                        success: function(data){
                            //alert("Успешно!\n" + data.message);
                            //console.log(data);
                            $('#firstEnterPass').addClass('border-success');
                            $('#secondEnterPass').addClass('border-success');

                            setTimeout(() => {
                                $('#firstEnterPass').removeClass('border-success');
                                $('#secondEnterPass').removeClass('border-success');
                            }, 5000);
                        },
                        error: function(jqXHR, exception){

                            var msg = '';
                            if (jqXHR.status === 0) {
                                msg = 'Not connect.\n Verify Network.';
                            } else if (jqXHR.status == 404) {
                                msg = 'Requested page not found. [404]';
                            } else if (jqXHR.status == 500) {
                                msg = 'Internal Server Error [500].';
                            } else if (exception === 'parsererror') {
                                msg = 'Requested JSON parse failed.';
                            } else if (exception === 'timeout') {
                                msg = 'Time out error.';
                            } else if (exception === 'abort') {
                                msg = 'Ajax request aborted.';
                            } else {
                                msg = 'Uncaught Error.\n' + jqXHR.responseText;
                            };

                            alert(msg);
                        }
                    });
                }
            });

            $("#saveButton").on('click', function(){

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{!! route('post.userEdit') !!}",
                    method: 'post',
                    data: {      
                        name: $('#exampleInputName').val(),
                        phone: $('#exampleInputPhone').val(),
                        email: $('#exampleInputEmail').val(),
                        phoneOld: phoneDefault,
                        emailOld: emailDefault,
                    },
                    success: function(data){
                        //alert("Успешно!\n" + data.message);
                        //console.log(data);
                        nameDefault = $("#exampleInputName").val();
                        emailDefault = $("#exampleInputEmail").val();
                        phoneDefault = $("#exampleInputPhone").val();

                        $(".border-primary").removeClass('border-primary').addClass('border-success');
                        $("#saveButton").addClass('disabled');

                        setTimeout(() => {
                            $(".border-success").removeClass('border-success');
                        }, 5000);                        
                    },
                    error: function(jqXHR, exception){

                        var msg = '';
                        if (jqXHR.status === 0) {
                            msg = 'Not connect.\n Verify Network.';
                        } else if (jqXHR.status == 404) {
                            msg = 'Requested page not found. [404]';
                        } else if (jqXHR.status == 500) {
                            msg = 'Internal Server Error [500].';
                        } else if (exception === 'parsererror') {
                            msg = 'Requested JSON parse failed.';
                        } else if (exception === 'timeout') {
                            msg = 'Time out error.';
                        } else if (exception === 'abort') {
                            msg = 'Ajax request aborted.';
                        } else {
                            msg = 'Uncaught Error.\n' + jqXHR.responseText;
                        };

                        alert(msg);
                    }
                });
            });
            
            $("#exampleInputName").on('input keyup', function() {
                if($("#exampleInputName").val() == nameDefault){
                    $("#saveButton").addClass('disabled');
                    $(this).removeClass('border-primary');
                } else{
                    $("#saveButton").removeClass('disabled');
                    $(this).addClass('border-primary');
                }
            });
            $("#exampleInputEmail").on('input keyup', function() {
                if($("#exampleInputEmail").val() == emailDefault){
                    $("#saveButton").addClass('disabled');
                    $(this).removeClass('border-primary');
                } else{
                    $("#saveButton").removeClass('disabled');
                    $(this).addClass('border-primary');

                }				
            });
            $("#exampleInputPhone").on('input keyup', function() {
                if($("#exampleInputPhone").val() == phoneDefault){
                    $("#saveButton").addClass('disabled');
                    $(this).removeClass('border-primary');
                } else{
                    $("#saveButton").removeClass('disabled');
                    $(this).addClass('border-primary');

                }				
            });
        });

    </script>
</body>

</html>
