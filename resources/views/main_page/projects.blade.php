@section("projects")

    <div class="container" >
    
        <div class="container" id='project-container'>
            <div class="container" id='project-container-header' style="background-color:#E9967A;margin-top: 5px;align: center">
                   <center><h4>Список проектов</h4></center>
                   <div class="container" id='project-container-body' style="background-color:#E9967B;margin-top: 5px;align: center; min-height: 600px;">
                        <div class="overflow-auto" id="available-projects" style="max-width:70%; max-height: 500px; padding:4px; ">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Дата создания</th>
                                        <th scope="col">Название проекта</th>
                                        <th scope="col">Доступность проекта</th>
                                        <th scope="col">Создатель</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $key => $project)
                                        <tr>
                                            <th scope="row">{{++$key}}</th>
                                            <td>{{$project->created_at}}</td>
                                            <td>{{$project->name}}</td>
                                            <td>{{$project->type_id === 1 ? "Открытый" : "Закрытый"}}</td>
                                            <td>{{$users->where('id', $project->who_changed)->first()->name}}</td>
                                            
                                            @if($projectParticipants->where('project_id',$project->id)->where('participant_id',Auth::user()->id)->first())
                                                <td><button type="button" class="btn btn-outline-danger" id="leaveProject" onclick='leaveProject(this)' value="{{$project->id}}">Покинуть проект</button></td>
                                            @else
                                                <td><button type="button" class="btn btn-outline-primary" id="joinProject" onclick='joinProject(this)' value="{{$project->id}}">Присоединиться к проекту</button></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            
                         </div>
                         @include('main_page.projectMenu.main')
                         @yield('projectsMenu', 'Не удалось получить меню проекта') 
                         
                     </div>
                     
            </div>
            
         </div>

    </div>
@csrf
    <script>

function leaveProject(projectId){
    
    $.ajax({
    url: '{{route('leaveProject')}}',         
    method: 'post',          
    dataType: 'html',      
    data: {"_token": "{{ csrf_token() }}",
        projectId: projectId.value,
        userId: {{auth()->user()->id}},
    },    
    success: function(data){  
	    
         location.reload();
    }
});
}

function joinProject(projectId){
    $.ajax({
    url: '{{route('joinProject')}}',         
    method: 'post',          
    dataType: 'html',      
    data: {"_token": "{{ csrf_token() }}",
        projectId: projectId.value,
        userId: {{auth()->user()->id}},
    },    
    success: function(data){  
        location.reload();
         
    }
});
}
  </script>

@endsection