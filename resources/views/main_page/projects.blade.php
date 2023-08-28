@section("projects")

    <div class="container" >
    
        <div class="container" id='project-container'>
            <div class="container" id='project-container-header' style="background-color:#E9967A;margin-top: 5px;align: center">
                   <center><h4>Список проектов</h4></center>
                   <div class="container" id='project-container-body' style="background-color:#E9967B;margin-top: 5px;align: center; min-height: 600px; ">
                        <div class="overflow-auto" id="available-projects" style="max-width:70%; max-height: 500px; padding:4px; float:left; ">
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
                                        @include('main_page.projectMenu.filters')
                                         @if(empty($_GET["filter"]))
                                            @yield('without_flters', 'Не удалось получить проекты') 
                                        @endif
                                        @if(!empty($_GET["filter"]) && $_GET["filter"] === 'search_by_name')
                                            @yield('search_by_name', 'Не удалось получить проекты') 
                                        @endif
                                        @if(!empty($_GET["filter"]) && $_GET["filter"] === 'filter')
                                            @yield('sort', 'Не удалось получить проекты') 
                                        @endif
                                </tbody>
                            </table>
                            
                            
                         </div>
                         @include('main_page.projectMenu.main')
                         @yield('projectsMenu', 'Не удалось получить меню фильтра') 
                         
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

function searchByName(){

    window.location.href = '{{url()->current();}}'+'?&filter_name='+$('#inputProjectName').val()+'&filter=search_by_name';

}

function resetFilter(){

window.location.href = '{{url()->current();}}';

}

function sort(filter){
window.location.href = '{{url()->current();}}'+'?&filter_name='+filter.value+'&filter=filter';
}
  </script>

@endsection