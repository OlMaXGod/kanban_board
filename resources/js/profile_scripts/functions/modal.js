import { loadingParticipants, loadingParticipantsInvited } from './projects.js'
import { loadingProjects } from './main.js'
import errorHandling from './error_handling.js'
import showToast from './toast.js'

export default function clickButtonModalDelete(url, id, element, idProject){

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
				loadingParticipants(idProject);
				loadingParticipantsInvited(idProject);	
				showToast(element+" удален");	
			}
		},
		error: errorHandling
	});
}