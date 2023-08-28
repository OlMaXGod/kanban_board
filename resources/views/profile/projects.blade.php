@section("projects")

<div class="col-lg-6 bd-example p-1">
	<div class="card card-body" style="background-color:#66cdab1c; height:350px">
		<div class="row">

			<div class="col-4">
				<div class="list-group overflow-auto" id="list-tab-project" role="tablist" style="background-color:#a8ccc05d; height:300px;">
				</div>
			</div>
			<div class="col-8">
				<div class="tab-content" id="nav-tabContent-project" style="background-color:#a8ccc05d; height:250px; border-radius:var(--bs-border-radius); padding:10px;">
				</div>
				<button type="button" id="changeNameProjectButton" class="btn btn-secondary mt-2 mx-auto">
					Настройки
				</button>
				<button type="button" id="deleteProjectButton" class="btn btn-danger mt-2 mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModalDeleteProject">
					Удалить
				</button>
			</div>

		</div>
	</div>
</div>

@endsection