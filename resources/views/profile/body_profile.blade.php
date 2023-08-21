@section("body_profile")

<div class="row p-1">
	<div class="card card-body" style="background-color:#66cdab1c">
		<div class="row">

			<div class="col-lg-3 p-1">
				<div class="w-50 my-5 mx-auto">
					<img src="/kanban_board/default_profile_image.jpg" style="max-height: 300px; max-weight: 300px"
						class="img-fluid" alt="default_profile_image.jpg">
				</div>
			</div>
			<div class="col-lg-9 p-1">
				<div class="m-5" style="max-height:300px">		
					<label for="exampleInputName" class="form-label pt-1">Имя</label>
					<input type="text" class="form-control border-3" id="exampleInputName" value={{ $userData['name'] }}>
					<label for="exampleInputEmail" class="form-label pt-1">Email</label>
					<input type="email" class="form-control border-3" id="exampleInputEmail" value={{ $userData['email'] }}>
					<label for="exampleInputPhone" class="form-label pt-1">Телефон</label>
					<input type="test" class="form-control border-3" id="exampleInputPhone" value={{ $userData['phone'] }}>
					<button type="button" id="saveButton" class="btn btn-success mt-2 mx-auto disabled">Сохранить изменения</button>                            
					<button type="button" class="btn btn-primary mt-2 mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
						Изменить пароль
					</button>
				</div>
			</div>

		</div>
	</div>
</div>

@endsection