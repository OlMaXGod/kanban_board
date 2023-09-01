let participants = [];
let roleDefault = 3;

$(document).ready(function(){

	var datepickerFrom = new Datepicker('#datepickerfrom');
	var datepickerTo = new Datepicker('#datepickerto');
	
	loadingProjects();
	loadingRoles(roleDefault);
});


$("#exampleInputName").on('input keyup', function() {
	if($("#exampleInputName").val() == nameDefault){
		$("#saveUserButton").addClass('disabled');
		$(this).removeClass('border-primary');
	} else{
		$("#saveUserButton").removeClass('disabled');
		$(this).addClass('border-primary');
	}
});
$("#exampleInputEmail").on('input keyup', function() {
	if($("#exampleInputEmail").val() == emailDefault){
		$("#saveUserButton").addClass('disabled');
		$(this).removeClass('border-primary');
	} else{
		$("#saveUserButton").removeClass('disabled');
		$(this).addClass('border-primary');

	}				
});
$("#exampleInputPhone").on('input keyup', function() {
	if($("#exampleInputPhone").val() == phoneDefault){
		$("#saveUserButton").addClass('disabled');
		$(this).removeClass('border-primary');
	} else{
		$("#saveUserButton").removeClass('disabled');
		$(this).addClass('border-primary');

	}				
});
$("#savePasswordButton").click(saveNewPassword);
$("#saveUserButton").click(saveUserInfo);

$("body").on("click", ".group-item-project", function(event){
	let idProjectStr = $(event.target).attr("id");
	let idProject = parseInt(idProjectStr.match(/\d+/));

	loadingParticipants(idProject);
	loadingParticipantsInvited(idProject, roleDefault);	
});
$("#changeNameProjectButton").click(loadingProjectData);
$("#deleteModalButtonProject").click(function(){
	let idProjectStr = $(".group-item-project.active").attr("id");
	let idSelectProject = parseInt(idProjectStr.match(/\d+/));

	clickButtonModalDelete(urlDeleteProject, idSelectProject, 'project')
});

$("body").on("click", ".group-item-participant", function(event){
	let idParticipantStr = $(event.target).attr("id");
	let idParticipant = parseInt(idParticipantStr.match(/\d+/));

	loadingParticipantsData(idParticipant);
});
$("#saveParticipantButton").click(saveParticipantInfo);
$("#addParticipantButton").click(addParticipantInProject);
$("#deleteModalButtonParticipant").click(function(){
	let idParticipantStr = $(".group-item-participant.active").attr("id");
	let idSelectParticipant = parseInt(idParticipantStr.match(/\d+/));

	clickButtonModalDelete(urlDeleteParticipant, idSelectParticipant, 'participant')
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
			let roles = data['resultat'];

			roles.forEach((role) => {
				$("#selectRoleParticipant").append("<option class='opt' value="+role.id+" id='opt-"+role.id+"'>"+role.role+"</option>");
				$("#selectRoleParticipantInvited").append("<option class='opt-inv' value="+role.id+" id='opt-inv-"+role.id+"'>"+role.role+"</option>");
			});
			$("#opt-inv-"+roleId).attr('selected', 'true');
		},
		error: errorHandling
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
			let projects = data['resultat'];

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
				loadingParticipantsInvited(idProject, roleDefault);	
			}
		},
		error: errorHandling
	});	
}

function loadingProjectData(){
	
	let idProjectStr = $(".group-item-project.active").attr("id");
	let idSelectProject = parseInt(idProjectStr.match(/\d+/));

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: urlGetProject,
		method: 'get',
		data: {
			id: idSelectProject
		},
		success: function(data){
			let projectData = data['resultat'];
			
			$("#exampleIdProject").val(projectData['id']);
			$("#exampleInputNameProject").val(projectData['name']);
			$("#exampleInputText").val(projectData['comment']);
			$("#opt-s1-"+projectData['type']).prop('selected', true);
			$("#opt-s2-"+projectData['access']).prop('selected', true);
		},
		error: errorHandling
	});	
}

function loadingParticipants(idProject) {

	$("#list-tab-participants").empty();

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
			let participants = data['resultat'];

			participants.forEach((participant) => {
				if (firstStep){
					$("#list-tab-participants").append(
						"<a class='list-group-item list-group-item-action group-item-participant active' id='participant-"+participant.id+"-list'" +
							"data-bs-toggle='list' href='#participant-"+participant.id+"' role='tab'" +
							"aria-controls='participant-"+participant.id+"'>"+participant.name+"</a>"
						);		
					firstStep = false;
				} else {
					$("#list-tab-participants").append(
						"<a class='list-group-item list-group-item-action group-item-participant' id='participant-"+participant.id+"-list'" +
							"data-bs-toggle='list' href='#participant-"+participant.id+"' role='tab'" +
							"aria-controls='participant-"+participant.id+"'>"+participant.name+"</a>"
						);
				}
			});
			
			if (participants.length != 0){
				let idParticipantStr = $(".group-item-participant.active").attr("id");
				if (idParticipantStr != null){
					$("#selectRoleParticipant").prop('disabled', false);
					$("#commentParticipant").prop('disabled', false);
					$("#saveParticipantButton").prop('disabled', false);
					$("#deleteParticipantButton").prop('disabled', false);

					let idParticipant = parseInt(idParticipantStr.match(/\d+/));
					loadingParticipantsData(idParticipant);
				}
			} else {
				$("#selectRoleParticipant").prop('disabled', true);
				$("#commentParticipant").val('');
				$("#commentParticipant").prop('disabled', true);
				$("#saveParticipantButton").prop('disabled', true);
				$("#deleteParticipantButton").prop('disabled', true);

				$(".opt").prop('selected',false)
			}
			
		},
		error: errorHandling
	});	
}

function loadingParticipantsInvited(idProject, roleDefault) {

	$("#list-tab-ParticipantsInvited").empty();

	$("#opt-inv-"+roleDefault).attr('selected', 'true');
	$("#commentParticipantInvited").val('Новый участник');	

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: urlGetParticipantsInvited,
		method: 'get',
		data: {
			id: idProject
		},
		success: function(data){
			let firstStep = true;		
			let participants = data['resultat'];
			let countInvited = participants.length;
			
			participants.forEach((participant) => {
				if (firstStep){
					$("#list-tab-ParticipantsInvited").append(
						"<a class='list-group-item list-group-item-action group-item-ParticipantInvited active' id='ParticipantInvited-"+participant.id+"-list'" +
							"data-bs-toggle='list' href='#ParticipantInvited-"+participant.id+"' role='tab'" +
							"aria-controls='ParticipantInvited-"+participant.id+"'>"+participant.name+"</a>"
						);		
					firstStep = false;
				} else {
					$("#list-tab-ParticipantsInvited").append(
						"<a class='list-group-item list-group-item-action group-item-ParticipantInvited' id='ParticipantInvited-"+participant.id+"-list'" +
							"data-bs-toggle='list' href='#ParticipantInvited-"+participant.id+"' role='tab'" +
							"aria-controls='ParticipantInvited-"+participant.id+"'>"+participant.name+"</a>"
						);
				}
			});

			if (countInvited > 0){
				$("#countRequest").text(countInvited).removeClass('text-bg-secondary').addClass('text-bg-success');
				$("#selectRoleParticipantInvited").prop('disabled', false);
				$("#commentParticipantInvited").prop('disabled', false);
				$("#addParticipantButton").prop('disabled', false);
			} else {
				$("#countRequest").text('0').removeClass('text-bg-success').addClass('text-bg-secondary');
				$("#selectRoleParticipantInvited").prop('disabled', true);
				$("#commentParticipantInvited").prop('disabled', true);
				$("#addParticipantButton").prop('disabled', true);
			}

		},
		error: errorHandling
	});	
}

function loadingParticipantsData(idParticipant){
	$("#commentParticipant").empty();

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
			let participantData = data['resultat'];

			$("#opt-"+participantData.role_id).prop('selected', true)
			$("#commentParticipant").val(participantData.comment);

		},
		error: errorHandling
	});	
} 

function errorHandling(jqXHR, exception){

	console.log(jqXHR.responseText);
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
			url: urlUpdatePassword,
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
			error: errorHandling
		});
	}
}
	
function saveUserInfo(){

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: urlUpdateUser,
		method: 'post',
		data: {      
			name: $('#exampleInputName').val(),
			phone: $('#exampleInputPhone').val(),
			email: $('#exampleInputEmail').val(),
			phone_old: phoneDefault,
			email_old: emailDefault,
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
		error: errorHandling
	});
}

function saveParticipantInfo(){
	let idParticipantStr = $(".group-item-participant.active").attr("id");
	let idParticipant = parseInt(idParticipantStr.match(/\d+/));
	let roleId = $("#selectRoleParticipant").children("option:selected").val();
	let comment = $("#commentParticipant").val();

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: urlUpdateParticipant,
		method: 'post',
		data: {      
			id: idParticipant,
			role: roleId,
			comment: comment,
		},
		success: function(data){
			alert("Изменения сохранены");      
		},
		error: errorHandling
	});
}

function addParticipantInProject(){
	let idParticipantStr = $(".group-item-ParticipantInvited.active").attr("id");
	let idParticipant = parseInt(idParticipantStr.match(/\d+/));
	let roleId = $("#selectRoleParticipantInvited").children("option:selected").val();
	let comment = $("#commentParticipantInvited").val();

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: urlAddParticipant,
		method: 'post',
		data: {      
			id: idParticipant,
			role: roleId,
			comment: comment,
		},
		success: function(data){
			//$(".group-item-ParticipantInvited.active").remove();
			alert("Пользователь " + $(".group-item-ParticipantInvited.active").val() + " добавлен в проект");      
			loadingProjects();  
		},
		error: errorHandling
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
		error: errorHandling
	});
}