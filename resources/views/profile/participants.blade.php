@section("participants")

	<div class="col-lg-6 bd-example p-1">
		<div class="card card-body" style="background-color:#66cdab1c; height:350px">
			<div class="row">

				<div class="col-4">
					<div class="list-group" id="list-tab-participant" role="tablist" style="background-color:#a8ccc05d; height:300px; overflow-y: scroll;">
					</div>
				</div>
				<div class="col-8">
					<div class="tab-content" id="nav-tabContent-participant" style="background-color:#a8ccc05d; height:257px; border-radius:var(--bs-border-radius); padding:10px;">
					</div>
					<button type="button" id="deleteProjectButton" class="btn btn-danger mt-2 mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModalDeleteParticipant">
						Удалить
					</button>
				</div>

			</div>
		</div>
	</div>

@endsection