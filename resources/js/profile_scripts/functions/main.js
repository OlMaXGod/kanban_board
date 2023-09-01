import {loadingParticipants, loadingParticipantsInvited} from './projects.js'
import errorHandling from './error_handling.js'

export function loadingRoles() {
	$(".opt").attr('selected', 'false');
	$(".opt-inv").attr('selected', 'false');

	let roleDefault = 3;

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
			$("#opt-inv-"+roleDefault).attr('selected', 'true');
		},
		error: errorHandling
	});	
}

export function loadingProjects(){
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
				loadingParticipantsInvited(idProject);	
			}
		},
		error: errorHandling
	});	
}