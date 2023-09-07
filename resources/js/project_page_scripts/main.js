import {loadingParticipants, loadingParticipantsInvited} from '/kanban_board/resources/js/profile_scripts/functions/projects.js'
import {loadingRoles} from '/kanban_board/resources/js/profile_scripts/functions/main.js'

let idProject;

$(document).ready(function(){
	let roleDefault = 3;
	let urlPageWithId = $("#load_project_page").attr("urlPageWithId");
	
	idProject = urlPageWithId.split('/').slice(-1);

	loadingRoles();
	loadingParticipants(idProject);
	loadingParticipantsInvited(idProject);	            
});