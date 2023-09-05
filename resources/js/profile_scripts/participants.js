import {saveParticipantInfo, addParticipantInProject, loadingParticipantsData} from './functions/participants.js'
import clickButtonModalDelete from './functions/modal.js'

$("body").on("click", ".group-item-participant", function(event){
	let idParticipantStr = $(event.target).attr("id");
	let idParticipant = parseInt(idParticipantStr.match(/\d+/));

	loadingParticipantsData(idParticipant);
});
$("#saveParticipantButton").click(saveParticipantInfo);
$("#addParticipantButton").click(function(){
	let idProjectStr = $(".group-item-project.active").attr("id");
	let idProject;
	if (idProjectStr != null){
		idProject = parseInt(idProjectStr.match(/\d+/));	
	} else {
		idProject = $("#participants_script").attr("urlPageWithId").split('/').pop();
	}

	addParticipantInProject(idProject);
});
$("#deleteModalButtonParticipant").click(function(){
	let idParticipantStr = $(".group-item-participant.active").attr("id");
	let idSelectParticipant = parseInt(idParticipantStr.match(/\d+/));

	clickButtonModalDelete(urlDeleteParticipant, idSelectParticipant, 'Участник')
});