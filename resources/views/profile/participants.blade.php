@section("participants")

	<div class="col-lg-6 bd-example p-1">
		<div class="card card-body" style="background-color:#66cdab1c; height:350px">
			<div class="row">

				<div class="col-4">
					<div class="list-group" id="list-tab-participant" role="tablist" style="background-color:#a8ccc05d; height:300px; overflow-y: scroll;">
						@foreach ($participantsData[1] as $id => $project)
							@if ($loop->first)
							<a class="list-group-item list-group-item-action active" id="participant-{{$id}}-list"
								data-bs-toggle="list" href="#participant-{{$id}}" role="tab"
								aria-controls="participant-{{$id}}">{{ $project['name'] }}</a>
							@else
							<a class="list-group-item list-group-item-action" id="participant-{{$id}}-list"
								data-bs-toggle="list" href="#participant-{{$id}}" role="tab"
								aria-controls="participant-{{$id}}">{{ $project['name'] }}</a>
							@endif
						@endforeach
					</div>
				</div>
				<div class="col-8">
					<div class="tab-content" id="nav-tabContent-participant" style="background-color:#a8ccc05d; height:257px; border-radius:var(--bs-border-radius); padding:10px;">
						@foreach ($participantsData[1] as $id => $project)
							@if ($loop->first)
							<div class="tab-pane fade show active" id="participant-{{$id}}" role="tabpanel"
								aria-labelledby="participant-{{$id}}-list">{{ "Роль: ".$project['role'].". Комментарий: " }}</div>
							@else
							<div class="tab-pane fade show" id="participant-{{$id}}" role="tabpanel"
								aria-labelledby="participant-{{$id}}-list">{{ "Роль: ".$project['role'].". Комментарий: " }}</div>
							@endif
						@endforeach
					</div>
					<button type="button" id="deleteProjectButton" class="btn btn-danger mt-2 mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModalDelete">
						Удалить
					</button>
				</div>

			</div>
		</div>
	</div>

@endsection