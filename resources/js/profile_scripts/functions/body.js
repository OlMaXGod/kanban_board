import errorHandling from './error_handling.js'

export function saveNewPassword(){
		
	if (!$('#alertErrorPassword').hasClass('invisible')) {
		$('#alertErrorPassword').addClass('invisible');
	}
	if (!$('#alertCountSymbolsPassword').hasClass('invisible')) {
		$('#alertCountSymbolsPassword').addClass('invisible');
	}

	if($('#firstEnterPass').val().length <8 || $('#secondEnterPass').val().length <8) {

		$('#alertCountSymbolsPassword').insertBefore($('#alertErrorPassword'));

		$('#firstEnterPass').addClass('border-warning');
		$('#secondEnterPass').addClass('border-warning');
		$('#alertCountSymbolsPassword').removeClass('invisible');

		setTimeout(() => {
			$('#firstEnterPass').removeClass('border-warning');
			$('#secondEnterPass').removeClass('border-warning');
		}, 5000);

	} else if($('#firstEnterPass').val() != $('#secondEnterPass').val()) {
		
		$('#alertErrorPassword').insertBefore($('#alertCountSymbolsPassword'));

		$('#firstEnterPass').addClass('border-danger');
		$('#secondEnterPass').addClass('border-danger');
		$('#alertErrorPassword').removeClass('invisible');

		setTimeout(() => {
			$('#firstEnterPass').removeClass('border-danger');
			$('#secondEnterPass').removeClass('border-danger');
		}, 5000);

	} else {

		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: urlUpdatePassword,
			method: 'post',
			data: {      
				phone: $('#exampleInputPhone').val(),
				email: $('#exampleInputEmail').val(),
				newPassword: $('#secondEnterPass').val(),
			},
			success: function(data){
				$('#firstEnterPass').addClass('border-success');
				$('#secondEnterPass').addClass('border-success');

				setTimeout(() => {
					$('#firstEnterPass').removeClass('border-success');
					$('#secondEnterPass').removeClass('border-success');
				}, 5000);
			},
			error: errorHandling
		});
	}
}
	
export function saveUserInfo(){

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: urlUpdateUser,
		method: 'post',
		data: {      
			name: $('#exampleInputName').val(),
			phone: $('#exampleInputPhone').val(),
			email: $('#exampleInputEmail').val(),
			phone_old: phoneDefault,
			email_old: emailDefault,
		},
		success: function(data){
			nameDefault = $("#exampleInputName").val();
			emailDefault = $("#exampleInputEmail").val();
			phoneDefault = $("#exampleInputPhone").val();

			$(".border-primary").removeClass('border-primary').addClass('border-success');
			$("#saveButton").addClass('disabled');

			setTimeout(() => {
				$(".border-success").removeClass('border-success');
			}, 5000);                        
		},
		error: errorHandling
	});
}