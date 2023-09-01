import { loadingParticipantsData } from './participants.js'
import errorHandling from './error_handling.js'

export function loadingProjectData(){
	
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

export function loadingParticipants(idProject) {

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

export function loadingParticipantsInvited(idProject, roleDefault) {

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