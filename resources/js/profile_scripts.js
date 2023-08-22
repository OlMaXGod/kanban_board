$(document).ready(function(){
	
	$(".group-item-project").click(function(){
		$("#list-tab-participant").empty();
		$("#nav-tabContent-participant").empty();

		let idProjectStr = $(this).attr("id");		
		let idProject = parseInt(idProjectStr.match(/\d+/));
		let firstStep = true;

		if (Object.keys(participants).find((i) => i == idProject) != null){
			Object.keys(participants[idProject]).forEach((Id) => {
				if (firstStep){
					$("#list-tab-participant").append(
						"<a class='list-group-item list-group-item-action active' id='participant-"+Id+"-list'" +
							"data-bs-toggle='list' href='#participant-"+Id+"' role='tab'" +
							"aria-controls='participant-"+Id+"'>"+participants[idProject][Id]['name']+"</a>"
						);
					$("#nav-tabContent-participant").append(				
						"<div class='tab-pane fade show active' id='participant-"+Id+"' role='tabpanel'"+
						"aria-labelledby='participant-"+Id+"-list'>Роль: "+participants[idProject][Id]['role']+". Комментарий: </div>"
					);

					firstStep = false;
				} else {
					$("#list-tab-participant").append(
						"<a class='list-group-item list-group-item-action' id='participant-"+Id+"-list'" +
							"data-bs-toggle='list' href='#participant-"+Id+"' role='tab'" +
							"aria-controls='participant-"+Id+"'>"+participants[idProject][Id]['name']+"</a>"
						);
					$("#nav-tabContent-participant").append(				
						"<div class='tab-pane fade show' id='participant-"+Id+"' role='tabpanel'"+
						"aria-labelledby='participant-"+Id+"-list'>Роль: "+participants[idProject][Id]['role']+". Комментарий: </div>"
					);
				}
			});
		}
	});

	$("#saveButtonPass").on('click', function(){
			
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
				url: urlEditPassword,
				method: 'post',
				data: {      
					phone: $('#exampleInputPhone').val(),
					email: $('#exampleInputEmail').val(),
					newPassword: $('#secondEnterPass').val(),
				},
				success: function(data){
					//alert("Успешно!\n" + data.message);
					//console.log(data);
					$('#firstEnterPass').addClass('border-success');
					$('#secondEnterPass').addClass('border-success');

					setTimeout(() => {
						$('#firstEnterPass').removeClass('border-success');
						$('#secondEnterPass').removeClass('border-success');
					}, 5000);
				},
				error: function(jqXHR, exception){

					var msg = '';
					if (jqXHR.status === 0) {
						msg = 'Not connect.\n Verify Network.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {
						msg = 'Requested JSON parse failed.';
					} else if (exception === 'timeout') {
						msg = 'Time out error.';
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.\n' + jqXHR.responseText;
					};

					alert(msg);
				}
			});
		}
	});

	$("#saveButton").on('click', function(){

		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: urlUserEdit,
			method: 'post',
			data: {      
				name: $('#exampleInputName').val(),
				phone: $('#exampleInputPhone').val(),
				email: $('#exampleInputEmail').val(),
				phoneOld: phoneDefault,
				emailOld: emailDefault,
			},
			success: function(data){
				//alert("Успешно!\n" + data.message);
				//console.log(data);
				nameDefault = $("#exampleInputName").val();
				emailDefault = $("#exampleInputEmail").val();
				phoneDefault = $("#exampleInputPhone").val();

				$(".border-primary").removeClass('border-primary').addClass('border-success');
				$("#saveButton").addClass('disabled');

				setTimeout(() => {
					$(".border-success").removeClass('border-success');
				}, 5000);                        
			},
			error: function(jqXHR, exception){

				var msg = '';
				if (jqXHR.status === 0) {
					msg = 'Not connect.\n Verify Network.';
				} else if (jqXHR.status == 404) {
					msg = 'Requested page not found. [404]';
				} else if (jqXHR.status == 500) {
					msg = 'Internal Server Error [500].';
				} else if (exception === 'parsererror') {
					msg = 'Requested JSON parse failed.';
				} else if (exception === 'timeout') {
					msg = 'Time out error.';
				} else if (exception === 'abort') {
					msg = 'Ajax request aborted.';
				} else {
					msg = 'Uncaught Error.\n' + jqXHR.responseText;
				};

				alert(msg);
			}
		});
	});
	
	$("#deleteModalButton").on('click', function(){

		let idProjectStr = $(".group-item-project.active").attr("id");
		let idSelectProject = parseInt(idProjectStr.match(/\d+/));

		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: urlProjectDelete,
			method: 'delete',
			data: {      
				idProject: urlDeleteProject,
			},
			success: function(data){
				alert("Успешно!\n" + data.message);            
			},
			error: function(jqXHR, exception){

				var msg = '';
				if (jqXHR.status === 0) {
					msg = 'Not connect.\n Verify Network.';
				} else if (jqXHR.status == 404) {
					msg = 'Requested page not found. [404]';
				} else if (jqXHR.status == 500) {
					msg = 'Internal Server Error [500].';
				} else if (exception === 'parsererror') {
					msg = 'Requested JSON parse failed.';
				} else if (exception === 'timeout') {
					msg = 'Time out error.';
				} else if (exception === 'abort') {
					msg = 'Ajax request aborted.';
				} else {
					msg = 'Uncaught Error.\n' + jqXHR.responseText;
				};

				alert(msg);
			}
		});
	});

	$("#exampleInputName").on('input keyup', function() {
		if($("#exampleInputName").val() == nameDefault){
			$("#saveButton").addClass('disabled');
			$(this).removeClass('border-primary');
		} else{
			$("#saveButton").removeClass('disabled');
			$(this).addClass('border-primary');
		}
	});
	$("#exampleInputEmail").on('input keyup', function() {
		if($("#exampleInputEmail").val() == emailDefault){
			$("#saveButton").addClass('disabled');
			$(this).removeClass('border-primary');
		} else{
			$("#saveButton").removeClass('disabled');
			$(this).addClass('border-primary');

		}				
	});
	$("#exampleInputPhone").on('input keyup', function() {
		if($("#exampleInputPhone").val() == phoneDefault){
			$("#saveButton").addClass('disabled');
			$(this).removeClass('border-primary');
		} else{
			$("#saveButton").removeClass('disabled');
			$(this).addClass('border-primary');

		}				
	});
});