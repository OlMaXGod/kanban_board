let participants = [];

$(document).ready(function(){

	let roleDefault = 3;
	
	loadingProjects();
	loadingRoles(roleDefault);
	
});

$("body").on("click", ".group-item-project", function(event){
	let idProjectStr = $(event.target).attr("id");
	let idProject = parseInt(idProjectStr.match(/\d+/));

	loadingParticipants(idProject);
});
$("body").on("click", ".group-item-participant", function(event){
	let idParticipantStr = $(event.target).attr("id");
	let idParticipant = parseInt(idParticipantStr.match(/\d+/));

	loadingParticipantsDate(idParticipant);
});

$("#saveButtonPass").click(saveNewPassword);
$("#saveButton").click(saveUserInfo);

$("#deleteModalButtonProject").click(function(){
	let idProjectStr = $(".group-item-project.active").attr("id");
	let idSelectProject = parseInt(idProjectStr.match(/\d+/));

	clickButtonModalDelete(urlDeleteProject, idSelectProject, 'project')
});
$("#deleteModalButtonParticipant").click(function(){
	let idParticipantStr = $(".group-item-participant.active").attr("id");
	let idSelectParticipant = parseInt(idParticipantStr.match(/\d+/));

	clickButtonModalDelete(urlDeleteParticipant, idSelectParticipant, 'participant')
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

function loadingRoles(roleId) {
	$(".opt").attr('selected', 'false');
	$(".opt-inv").attr('selected', 'false');

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: urlGetRoles,
		method: 'get',
		success: function(data){		
			let roles = data;

			roles.forEach((role) => {
				$("#selectRoleParticipant").append("<option class='opt' value="+role.id+" id='opt-"+role.id+"'>"+role.role+"</option>");
				$("#selectRoleParticipantInvited").append("<option class='opt-inv' value="+role.id+" id='opt-inv-"+role.id+"'>"+role.role+"</option>");
			});
			$("#opt-inv-"+roleId).attr('selected', 'true');
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

function loadingProjects(){
	$("#list-tab-project").empty();
	$("#nav-tabContent-project").empty();

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: urlGetProjects,
		method: 'get',
		success: function(data){
			let firstStep = true;			
			let projects = data;

			projects.forEach((project) => {
				if (firstStep){
					$("#list-tab-project").append(
						"<a class='list-group-item list-group-item-action group-item-project active' id='project-"+project.id+"-list'" +
							"data-bs-toggle='list' href='#project-"+project.id+"' role='tab'" +
							"aria-controls='project-"+project.id+"'>"+project.name+"</a>"
						);
					$("#nav-tabContent-project").append(
						"<div class='tab-pane fade show active' id='project-"+project.id+"' role='tabpanel'"+
						"aria-labelledby='project-"+project.id+"-list'>"+project.comment+"</div>"
					);
		
					firstStep = false;
				} else {
					$("#list-tab-project").append(
						"<a class='list-group-item list-group-item-action group-item-project' id='project-"+project.id+"-list'" +
							"data-bs-toggle='list' href='#project-"+project.id+"' role='tab'" +
							"aria-controls='project-"+project.id+"'>"+project.name+"</a>"
						);
					$("#nav-tabContent-project").append(				
						"<div class='tab-pane fade show' id='project-"+project.id+"' role='tabpanel'"+
						"aria-labelledby='project-"+project.id+"-list'>"+project.comment+"</div>"
					);
				}
			});
			
			let idProjectStr = $(".group-item-project.active").attr("id");
			if (idProjectStr != null){
				let idProject = parseInt(idProjectStr.match(/\d+/));		
				loadingParticipants(idProject);
			}
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

function loadingParticipants(idProject) {

	$("#list-tab-participant").empty();

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: urlGetParticipants,
		method: 'get',
		data: {      
			id: idProject
		},
		success: function(data){
			let firstStep = true;		
			participants = data;

			participants.forEach((participant) => {
				if (firstStep){
					$("#list-tab-participant").append(
						"<a class='list-group-item list-group-item-action group-item-participant active' id='participant-"+participant.id+"-list'" +
							"data-bs-toggle='list' href='#participant-"+participant.id+"' role='tab'" +
							"aria-controls='participant-"+participant.id+"'>"+participant.name+"</a>"
						);		
					firstStep = false;
				} else {
					$("#list-tab-participant").append(
						"<a class='list-group-item list-group-item-action group-item-participant' id='participant-"+participant.id+"-list'" +
							"data-bs-toggle='list' href='#participant-"+participant.id+"' role='tab'" +
							"aria-controls='participant-"+participant.id+"'>"+participant.name+"</a>"
						);
				}
			});
			
			let idParticipantStr = $(".group-item-participant.active").attr("id");
			if (idParticipantStr != null){
				let idParticipant = parseInt(idParticipantStr.match(/\d+/));
				loadingParticipantsDate(idParticipant);
			}
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

function loadingParticipantsDate(idParticipant){
	$("#commentParticipant").empty();

	console.log('loadingParticipantsDate()');//////

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: urlGetParticipant,
		method: 'get',
		data: {      
			id: idParticipant
		},
		success: function(data){

			console.log("#opt-"+data.role_id);
			$(".opt").attr('selected', 'false');
			$("#opt-3").attr('selected', 'true');
			
			$("#commentParticipant").text(data.comment);

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
			loadingProjects();  
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