import showToast from './toast.js'
import errorHandling from './error_handling.js'
import { loadingParticipants, loadingParticipantsInvited } from './projects.js';

export function loadingParticipantsData(idParticipant){
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

export function saveParticipantInfo(){
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
			showToast("Данные участника изменены");   
		},
		error: errorHandling
	});
}

export function addParticipantInProject(){
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
			showToast("Пользователь " + $(".group-item-ParticipantInvited.active").html() + " добавлен в проект");

			let idProjectStr = $(".group-item-project.active").attr("id");
			if (idProjectStr != null){
				let idProject = parseInt(idProjectStr.match(/\d+/));		
				loadingParticipants(idProject);
				loadingParticipantsInvited(idProject);	
			}
		},
		error: errorHandling
	});
}
