@section("without_flters")

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

@endsection

@section("search_by_name")
                                        @foreach($projects as $key => $project)
                                            @if($project->name === @$_GET["filter_name"])
                                                @if($project->type != 0)
                                                    <tr>
                                                        <th scope="row">{{++$key}}</th>
                                                        <td>{{$project->created_at}}</td>
                                                        <td>{{$project->name}}</td>
                                                        <td>{{$project->type_id === 1 ? "Открытый" : "Закрытый"}}</td>
                                                        <td>{{$project->type === 1 ? "Открытый" : "Закрытый"}}</td>
                                                        <td>{{$users->where('id', $project->who_changed)->first()->name}}</td>                  
                                                        @if($projectParticipants->where('project_id',$project->id)->where('participant_id',Auth::user()->id)->first())
                                                            <td><button type="button" class="btn btn-outline-danger" id="leaveProject" onclick='leaveProject(this)' value="{{$project->id}}">Покинуть проект</button></td>
                                                        @else
                                                            <td><button type="button" class="btn btn-outline-primary" id="joinProject" onclick='joinProject(this)' value="{{$project->id}}">Присоединиться к проекту</button></td>
                                                        @endif
                                                    </tr>
                                                @endif
                                            @endif
                                        @endforeach
@endsection



@section("search_by_name")
                                        @foreach($projects as $key => $project)
                                            @if($project->type != 0)
                                                @if($project->name === @$_GET["filter_name"])
                                                    <tr>
                                                        <th scope="row">{{++$key}}</th>
                                                        <td>{{$project->created_at}}</td>
                                                        <td>{{$project->name}}</td>
                                                        <td>{{$project->type === 1 ? "Открытый" : "Закрытый"}}</td>
                                                        <td>{{$users->where('id', $project->who_changed)->first()->name}}</td>                  
                                                        
                                                        @if($projectParticipants->where('project_id',$project->id)->where('participant_id',Auth::user()->id)->first())
                                                            <td><button type="button" class="btn btn-outline-danger" id="leaveProject" onclick='leaveProject(this)' value="{{$project->id}}">Покинуть проект</button></td>
                                                        @else
                                                            <td><button type="button" class="btn btn-outline-primary" id="joinProject" onclick='joinProject(this)' value="{{$project->id}}">Присоединиться к проекту</button></td>
                                                        @endif
                                                    </tr>
                                                @endif
                                            @endif
                                        @endforeach

@endsection

@section("sort")
                                        <?php $projects = $projects->sortBy(@$_GET["filter_name"]); ?>
                                        @foreach($projects as $key => $project)
                                            @if($project->type != 0)

                                                <tr>
                                                    <th scope="row">{{++$key}}</th>
                                                    <td>{{$project->created_at}}</td>
                                                    <td>{{$project->name}}</td>
                                                    <td>{{$project->type_id === 1 ? "Открытый" : "Закрытый"}}</td>
                                                    <td>{{$project->type === 1 ? "Открытый" : "Закрытый"}}</td>
                                                    <td>{{$users->where('id', $project->who_changed)->first()->name}}</td>                  
                                                 
                                                    @if($projectParticipants->where('project_id',$project->id)->where('participant_id',Auth::user()->id)->first())
                                                        <td><button type="button" class="btn btn-outline-danger" id="leaveProject" onclick='leaveProject(this)' value="{{$project->id}}">Покинуть проект</button></td>
                                                    @else
                                                        <td><button type="button" class="btn btn-outline-primary" id="joinProject" onclick='joinProject(this)' value="{{$project->id}}">Присоединиться к проекту</button></td>
                                                    @endif
                                                </tr>
                                            @endif
                                        @endforeach

@endsection