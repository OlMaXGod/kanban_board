import {loadingParticipants, loadingParticipantsInvited, loadingProjectData, saveProjectInfo} from './functions/projects.js'
import clickButtonModalDelete from './functions/modal.js'

let roleDefault = 3;

$("body").on("click", ".group-item-project", function(event){
	$("#lock-pane").removeClass("LockOff").addClass("LockOn");
		
	let idProjectStr = $(event.target).attr("id");
	let idProject = parseInt(idProjectStr.match(/\d+/));

	loadingParticipants(idProject);
	loadingParticipantsInvited(idProject, roleDefault);	

	setTimeout(() => {
		$("#lock-pane").removeClass("LockOn").addClass("LockOff");
	}, 100);
});
$("#changeDataProjectButton").click(loadingProjectData);
$("#saveProjectButton").click(saveProjectInfo);
$("#deleteModalButtonProject").click(function(){
	let idProjectStr = $(".group-item-project.active").attr("id");
	let idSelectProject = parseInt(idProjectStr.match(/\d+/));

	clickButtonModalDelete(urlDeleteProject, idSelectProject, 'Проект');
});