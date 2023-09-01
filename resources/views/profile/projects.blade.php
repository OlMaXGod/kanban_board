@section("projects")
	<div class="card card-body" style="background-color:#66cdab1c; height:100%">
		<div class="row" style="height:100%;">

			<div class="col-4">
				<div class="list-group overflow-auto" id="list-tab-project" role="tablist" style="background-color:#a8ccc05d; height:95%;">
				</div>
			</div>
			<div class="col-8">
				<div class="tab-content" id="nav-tabContent-project" style="background-color:#a8ccc05d; height:80%; border-radius:var(--bs-border-radius); padding:10px;">
				</div>
				<button type="button" id="changeNameProjectButton" data-bs-toggle="modal" data-bs-target="#update-project" class="btn btn-secondary mt-2 mx-auto">
					Настройки
				</button>
				<button type="button" id="deleteProjectButton" class="btn btn-danger mt-2 mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModalDeleteProject">
					Удалить
				</button>
			</div>

		</div>
	</div>
@endsection