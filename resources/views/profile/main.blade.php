<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/kanban_board/resources/js/bootstrap.min.js"></script>
    <script src="/kanban_board/resources/js/jquery.js"></script>
    <link rel="stylesheet" href="/kanban_board/resources/css/bootstrap.min.css">
    <link rel="shortcut icon" href="/kanban_board/logo.png" type="image/x-icon">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Profile</title>
</head>

<body>
	
    @csrf
        <div class="container-fluid">

            <div class="row p-1">
                <div class="card card-body bg-body-secondary">
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
                                <button type="button" class="btn btn-primary mt-2 mx-auto">Изменить пароль</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 bd-example p-1" data-spy="scroll">
                    <div class="card card-body bg-body-secondary" style="height:350px">
                        <div class="row">
                            <div class="col-4">
                                <div class="list-group" id="list-tab" role="tablist" style="height:300px; overflow-y: scroll;">
                                    <a class="list-group-item list-group-item-action active" id="proect-0001-list"
                                        data-bs-toggle="list" href="#proect-0001" role="tab"
                                        aria-controls="proect-0001">Проект 1</a>
                                    <a class="list-group-item list-group-item-action" id="proect-0002-list"
                                        data-bs-toggle="list" href="#proect-0002" role="tab"
                                        aria-controls="proect-0002">Проект 2</a>
                                    <a class="list-group-item list-group-item-action" id="proect-0003-list"
                                        data-bs-toggle="list" href="#proect-0003" role="tab"
                                        aria-controls="proect-0003">Проект 3</a>
                                    <a class="list-group-item list-group-item-action" id="proect-0004-list"
                                        data-bs-toggle="list" href="#proect-0004" role="tab"
                                        aria-controls="proect-0004">Проект 4</a>
                                    <a class="list-group-item list-group-item-action" id="proect-0005-list"
                                        data-bs-toggle="list" href="#proect-0005" role="tab"
                                        aria-controls="proect-0005">Проект 5</a>
                                    <a class="list-group-item list-group-item-action" id="proect-0006-list"
                                        data-bs-toggle="list" href="#proect-0006" role="tab"
                                        aria-controls="proect-0006">Проект 6</a>
                                    <a class="list-group-item list-group-item-action" id="proect-0007-list"
                                        data-bs-toggle="list" href="#proect-0007" role="tab"
                                        aria-controls="proect-0007">Проект 7</a>
                                    <a class="list-group-item list-group-item-action" id="proect-0008-list"
                                        data-bs-toggle="list" href="#proect-0008" role="tab"
                                        aria-controls="proect-0008">Проект 8</a>
                                    <a class="list-group-item list-group-item-action" id="proect-0009-list"
                                        data-bs-toggle="list" href="#proect-0009" role="tab"
                                        aria-controls="proect-0009">Проект 9</a>
                                    <a class="list-group-item list-group-item-action" id="proect-0010-list"
                                        data-bs-toggle="list" href="#proect-0010" role="tab"
                                        aria-controls="proect-0010">Проект 10</a>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="proect-0001" role="tabpanel"
                                        aria-labelledby="proect-0001-list">Описание проекта 1 описание описание
                                        описание описание описание описание описание </div>
                                    <div class="tab-pane fade" id="proect-0002" role="tabpanel"
                                        aria-labelledby="proect-0002-list">Описание проекта 2 описание описание
                                        описание описание описание описание описание </div>
                                    <div class="tab-pane fade" id="proect-0003" role="tabpanel"
                                        aria-labelledby="proect-0003-list">Описание проекта 3 описание описание
                                        описание описание описание описание описание </div>
                                    <div class="tab-pane fade" id="proect-0004" role="tabpanel"
                                        aria-labelledby="proect-0004-list">Описание проекта 4 описание описание
                                        описание описание описание описание описание </div>
                                    <div class="tab-pane fade" id="proect-0005" role="tabpanel"
                                        aria-labelledby="proect-0005-list">Описание проекта 5 описание описание
                                        описание описание описание описание описание </div>
                                    <div class="tab-pane fade" id="proect-0006" role="tabpanel"
                                        aria-labelledby="proect-0006-list">Описание проекта 6 описание описание
                                        описание описание описание описание описание </div>
                                    <div class="tab-pane fade" id="proect-0007" role="tabpanel"
                                        aria-labelledby="proect-0007-list">Описание проекта 7 описание описание
                                        описание описание описание описание описание </div>
                                    <div class="tab-pane fade" id="proect-0008" role="tabpanel"
                                        aria-labelledby="proect-0008-list">Описание проекта 8 описание описание
                                        описание описание описание описание описание </div>
                                    <div class="tab-pane fade" id="proect-0009" role="tabpanel"
                                        aria-labelledby="proect-0009-list">Описание проекта 9 описание описание
                                        описание описание описание описание описание </div>
                                    <div class="tab-pane fade" id="proect-0010" role="tabpanel"
                                        aria-labelledby="proect-0010-list">Описание проекта 10 описание описание
                                        описание описание описание описание описание </div>
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
		<script>

			let nameDefault = '{{$userData['name']}}';
			let emailDefault = '{{$userData['email']}}';
			let phoneDefault = '{{$userData['phone']}}';

            let qwe = '{{$projectsData['id']}}';

			$(document).ready(function(){
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
							alert("Успешно!\n" + data.message);
                            console.log(data);
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

					nameDefault = $("#exampleInputName").val();
					emailDefault = $("#exampleInputEmail").val();
					phoneDefault = $("#exampleInputPhone").val();

					$(".border-primary").removeClass('border-primary').addClass('border-success');
					$("#saveButton").addClass('disabled');

					setTimeout(() => {
						$(".border-success").removeClass('border-success');
					}, 3000);
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
