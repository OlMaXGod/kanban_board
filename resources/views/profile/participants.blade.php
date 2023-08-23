@section("participants")

	<div class="col-lg-6 bd-example p-1">
		
		<div class="card" style="background-color:#66cdab1c; height:350px;">

			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link group-item-project1 active" id="participant-pane-list"
						data-bs-toggle="list" href="#participant-pane" role="tab"
						aria-controls="participant-pane">Участники проекта</a>
					</li>
					<li class="nav-item">
						<a class="nav-link group-item-project1" id="participant1-list"
						data-bs-toggle="list" href="#participant1-pane" role="tab"
						aria-controls="participant1-pane">Запросы на вступление</a>
					</li>
				</ul>
			</div>

			<div class="card-body" style="background-color:#66cdab1c; height:300px;">
				<div class="tab-content" id="nav-tabContent">
					<div class='tab-pane fade show active' id='participant-pane' role='tabpanel' aria-labelledby='participant-list' style="height:30%">
						<div class="row">			
							<div class="col-4">
								<div class="list-group" id="list-tab-participant" role="tablist" style="background-color:#a8ccc05d; height:250px; overflow-y: scroll;">
								</div>
							</div>
							<div class="col-8">
								<div class="tab-content" id="nav-tabContent-participant" style="background-color:#a8ccc05d; height:207px; border-radius:var(--bs-border-radius); padding:10px;">
								</div>
								<button type="button" id="deleteProjectButton" class="btn btn-danger mt-2 mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModalDeleteParticipant">
									Удалить
								</button>
							</div>			
						</div>
					</div>
					<div class='tab-pane fade show' id='participant1-pane' role='tabpanel' aria-labelledby='participant1-list' style="height:30%">
						<div class="row">			
							<div class="col-4">
								<div class="list-group" id="list-tab-participant" role="tablist" style="background-color:#a8ccc05d; height:250px; overflow-y: scroll;">
								</div>
							</div>
							<div class="col-8">
								<div class="tab-content" id="nav-tabContent-participant" style="background-color:#a8ccc05d; height:207px; border-radius:var(--bs-border-radius); padding:10px;">
								</div>
								<button type="button" id="deleteProjectButton" class="btn btn-success mt-2 mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModalDeleteParticipant">
									Принять в проект
								</button>
							</div>
						</div>
					</div>
				</div>	
			</div>

		</div>
	</div>

@endsection