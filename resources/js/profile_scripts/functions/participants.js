import { loadingProjects } from './main.js'
import errorHandling from './error_handling.js'

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
			alert("Изменения сохранены");      
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
			//$(".group-item-ParticipantInvited.active").remove();
			alert("Пользователь " + $(".group-item-ParticipantInvited.active").val() + " добавлен в проект");      
			loadingProjects();  
		},
		error: errorHandling
	});
}
