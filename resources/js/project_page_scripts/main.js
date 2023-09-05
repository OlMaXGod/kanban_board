import {loadingParticipants, loadingParticipantsInvited} from '/kanban_board/resources/js/profile_scripts/functions/projects.js'
import {loadingRoles} from '/kanban_board/resources/js/profile_scripts/functions/main.js'

$(document).ready(function(){
	let roleDefault = 3;
	let urlPage = $("#load_project_page").attr("urlPage");
	let idProject = urlPage.split('/').pop();

	loadingRoles();
	loadingParticipants(idProject);
	loadingParticipantsInvited(idProject, roleDefault);	            
});