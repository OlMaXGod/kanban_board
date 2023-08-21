@section("projects")

<div class="row">
	<div class="col-lg-6 bd-example p-1" data-spy="scroll">
		<div class="card card-body" style="background-color:#66cdab1c; height:350px">
			<div class="row">

				<div class="col-4">
					<div class="list-group" id="list-tab" role="tablist" style="height:300px; overflow-y: scroll;">
						@foreach ($projectsData as $id => $project)
							@if ($loop->first)
							<a class="list-group-item list-group-item-action active" id="proect-{{$id}}-list"
								data-bs-toggle="list" href="#proect-{{$id}}" role="tab"
								aria-controls="proect-{{$id}}">{{ $project['name'] }}</a>
							@else
							<a class="list-group-item list-group-item-action" id="proect-{{$id}}-list"
								data-bs-toggle="list" href="#proect-{{$id}}" role="tab"
								aria-controls="proect-{{$id}}">{{ $project['name'] }}</a>
							@endif
						@endforeach
					</div>
				</div>
				<div class="col-8">
					<div class="tab-content" id="nav-tabContent">
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
				</div>

			</div>
		</div>
	</div>
	<div class="col-lg-6 p-1">
		4
	</div>	
</div>

@endsection