import { loadingParticipants, loadingParticipantsInvited } from './projects.js'
import { loadingProjects } from './main.js'
import errorHandling from './error_handling.js'
import showToast from './toast.js'

export default function clickButtonModalDelete(url, id, element){

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
			if (element == 'Проект') {
				loadingProjects();
				showToast(element+" удален");	
			} else if (element == 'Участник') {		
				let idProjectStr = $(".group-item-project.active").attr("id");
				if (idProjectStr != null){
					let idProject = parseInt(idProjectStr.match(/\d+/));		
					loadingParticipants(idProject);
					loadingParticipantsInvited(idProject);	
				}
				showToast(element+" удален");	
			}
		},
		error: errorHandling
	});
}