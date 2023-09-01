import errorHandling from './error_handling.js'

export default function clickButtonModalDelete(url, id, action){

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
			loadingProjects();  
		},
		error: errorHandling
	});
}