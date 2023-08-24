@section("projects")

<div class="col-lg-6 bd-example p-1">
	<div class="card card-body" style="background-color:#66cdab1c; height:350px">
		<div class="row">

			<div class="col-4">
				<div class="list-group overflow-auto" id="list-tab" role="tablist" style="background-color:#a8ccc05d; height:300px;">
					@foreach ($projectsData as $id => $project)
						@if ($loop->first)
						<a class="list-group-item list-group-item-action group-item-project active" id="proect-{{$id}}-list"
							data-bs-toggle="list" href="#proect-{{$id}}" role="tab"
							aria-controls="proect-{{$id}}">{{ $project['name'] }}</a>
						@else
						<a class="list-group-item list-group-item-action group-item-project" id="proect-{{$id}}-list"
							data-bs-toggle="list" href="#proect-{{$id}}" role="tab"
							aria-controls="proect-{{$id}}">{{ $project['name'] }}</a>
						@endif
					@endforeach
				</div>
			</div>
			<div class="col-8">
				<div class="tab-content" id="nav-tabContent" style="background-color:#a8ccc05d; height:250px; border-radius:var(--bs-border-radius); padding:10px;">
					@foreach ($projectsData as $id => $project)
						@if ($loop->first)
						<div class="tab-pane fade show active" id="proect-{{$id}}" role="tabpanel"
							aria-labelledby="proect-{{$id}}-list">{{ $project['comment'] }}</div>
						@else
						<div class="tab-pane fade show" id="proect-{{$id}}" role="tabpanel"
							aria-labelledby="proect-{{$id}}-list">{{ $project['comment'] }}</div>
						@endif
					@endforeach
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