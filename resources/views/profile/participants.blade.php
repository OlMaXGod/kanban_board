@section("participants")

	<div class="col-lg-6 bd-example p-1" style="min-height:350px">
		
		<div class="card" style="background-color:#66cdab1c; height:100%;">

			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link group-item-project1 active" id="participant-pane-list"
						data-bs-toggle="list" href="#participant-pane" role="tab"
						aria-controls="participant-pane">Участники проекта</a>
					</li>
					<div>
					<li class="nav-item">
						<a class="nav-link group-item-project1" id="ParticipantInvited-list"
						data-bs-toggle="list" href="#ParticipantInvited-pane" role="tab"
						aria-controls="ParticipantInvited-pane">
							Запросы на вступление
							<span class="badge text-bg-secondary" id="countRequest">0</span>
						</a>
					</li>
					</div>
				</ul>
			</div>

			<div class="card-body" style="background-color:#66cdab1c; height:85%;">
				<div class="tab-content" id="nav-tabContent" style="height:100%;">
					<div class='tab-pane fade show active' id='participant-pane' role='tabpanel' aria-labelledby='participant-list' style="height:100%;">
						<div class="row" style="height:100%;">			
							<div class="col-4">
								<div class="list-group overflow-auto" id="list-tab-participants" role="tablist" style="background-color:#a8ccc05d; height:95%;">
								</div>
							</div>
							<div class="col-8">
								<select class="form-select form-select-sm" id="selectRoleParticipant" aria-label=".form-select-sm пример">
								</select>
								<textarea class="form-control mt-2" id="commentParticipant" aria-label="С текстовым полем"maxlength="88" style="background-color:#a8ccc05d; height:62%; resize: none;"></textarea>
								<button type="button" id="saveParticipantButton" class="btn btn-success mt-2 mx-auto">
									Сохранить изменения
								</button>
								<button type="button" id="deleteParticipantButton" class="btn btn-danger mt-2 mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModalDeleteParticipant">
									Удалить
								</button>
							</div>
						</div>
					</div>
					<div class='tab-pane fade show' id='ParticipantInvited-pane' role='tabpanel' aria-labelledby='ParticipantInvited-list' style="height:30%">
						<div class="row">
							<div class="col-4">
								<div class="list-group overflow-auto" id="list-tab-ParticipantsInvited" role="tablist" style="background-color:#a8ccc05d; height:80%;">
								</div>
							</div>
							<div class="col-8">
								<select class="form-select form-select-sm" id="selectRoleParticipantInvited" aria-label=".form-select-sm пример">
								</select>
								<textarea class="form-control mt-2" id="commentParticipantInvited" aria-label="С текстовым полем"maxlength="88" style="background-color:#a8ccc05d; height:160px; resize: none;"></textarea>
								<button type="button" id="addParticipantButton" class="btn btn-success mt-2 mx-auto">
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