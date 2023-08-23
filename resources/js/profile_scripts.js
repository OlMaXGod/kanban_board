$(document).ready(function(){

	let idProjectStr = $(".group-item-project.active").attr("id");
	if (idProjectStr != null){
		let idProject = parseInt(idProjectStr.match(/\d+/));		
		loadingParticipants(idProject);
	}

	$(".group-item-project").click(function(){
		let idProjectStr = $(this).attr("id");
		let idProject = parseInt(idProjectStr.match(/\d+/));

		loadingParticipants(idProject);
	});

	$("#saveButtonPass").click(saveNewPassword);

	$("#saveButton").click(saveUserInfo);

	$("#deleteModalButtonProject").click(function(){
		let idProjectStr = $(".group-item-project.active").attr("id");
		let idSelectProject = parseInt(idProjectStr.match(/\d+/));

		clickButtonModalDelete(urlProjectDelete, idSelectProject, 'project')
	});
	$("#deleteModalButtonParticipant").click(function(){
		let idParticipantStr = $(".group-item-participant.active").attr("id");
		let idSelectParticipant = parseInt(idParticipantStr.match(/\d+/));

		clickButtonModalDelete(urlParticipantDelete, idSelectParticipant, 'participant')
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

function loadingParticipants(idProject) {

	$("#list-tab-participant").empty();
	$("#nav-tabContent-participant").empty();

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: urlParticipantsGet,
		method: 'get',
		data: {      
			id: idProject
		},
		success: function(data){
			let firstStep = true;			
			let participants = data;

			Object.keys(participants).forEach((Id) => {
				if (firstStep){
					$("#list-tab-participant").append(
						"<a class='list-group-item list-group-item-action group-item-participant active' id='participant-"+Id+"-list'" +
							"data-bs-toggle='list' href='#participant-"+Id+"' role='tab'" +
							"aria-controls='participant-"+Id+"'>"+participants[Id]['name']+"</a>"
						);
					$("#nav-tabContent-participant").append(				
						"<div class='tab-pane fade show active' id='participant-"+Id+"' role='tabpanel'"+
						"aria-labelledby='participant-"+Id+"-list'>Роль: "+participants[Id]['role']+". Комментарий: </div>"
					);
		
					firstStep = false;
				} else {
					$("#list-tab-participant").append(
						"<a class='list-group-item list-group-item-action group-item-participant' id='participant-"+Id+"-list'" +
							"data-bs-toggle='list' href='#participant-"+Id+"' role='tab'" +
							"aria-controls='participant-"+Id+"'>"+participants[Id]['name']+"</a>"
						);
					$("#nav-tabContent-participant").append(				
						"<div class='tab-pane fade show' id='participant-"+Id+"' role='tabpanel'"+
						"aria-labelledby='participant-"+Id+"-list'>Роль: "+participants[Id]['role']+". Комментарий: </div>"
					);
				}
			});
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

function saveNewPassword(){
		
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
			url: urlEditPassword,
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
}

function refreshProjects(){
	$("#list-tab-project").empty();
	$("#nav-tabContent-project").empty();

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: urlProjectsGet,
		method: 'get',
		success: function(data){
			let firstStep = true;			
			let projects = data;

			Object.keys(projects).forEach((Id) => {
				if (firstStep){
					$("#list-tab-project").append(
						"<a class='list-group-item list-group-item-action group-item-project active' id='project-"+Id+"-list'" +
							"data-bs-toggle='list' href='#project-"+Id+"' role='tab'" +
							"aria-controls='project-"+Id+"'>"+projects[Id]['name']+"</a>"
						);
					$("#nav-tabContent-project").append(				
						"<div class='tab-pane fade show active' id='project-"+Id+"' role='tabpanel'"+
						"aria-labelledby='project-"+Id+"-list'>Роль: "+projects[Id]['role']+". Комментарий: </div>"
					);
		
					firstStep = false;
				} else {
					$("#list-tab-project").append(
						"<a class='list-group-item list-group-item-action group-item-project' id='project-"+Id+"-list'" +
							"data-bs-toggle='list' href='#project-"+Id+"' role='tab'" +
							"aria-controls='project-"+Id+"'>"+projects[Id]['name']+"</a>"
						);
					$("#nav-tabContent-project").append(				
						"<div class='tab-pane fade show' id='project-"+Id+"' role='tabpanel'"+
						"aria-labelledby='project-"+Id+"-list'>Роль: "+projects[Id]['role']+". Комментарий: </div>"
					);
				}
			});
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
	
function saveUserInfo(){

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: urlUserEdit,
		method: 'post',
		data: {      
			name: $('#exampleInputName').val(),
			phone: $('#exampleInputPhone').val(),
			email: $('#exampleInputEmail').val(),
			phoneOld: phoneDefault,
			emailOld: emailDefault,
		},
		success: function(data){
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
}

function clickButtonModalDelete(url, id, action){
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: url,
		method: 'delete',
		data: {
			id: id,
		},
		success: function(data){
			refreshProjects();  
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