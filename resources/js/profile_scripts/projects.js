import {loadingParticipants, loadingParticipantsInvited, loadingProjectData} from './functions/projects.js'
import clickButtonModalDelete from './functions/modal.js'

let roleDefault = 3;

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