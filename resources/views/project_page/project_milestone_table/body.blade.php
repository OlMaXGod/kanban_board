@section("project_milestone_table")
    <div>
    @foreach($project_phases as $key => $phase)
    <a href='{{url()->current()."?&phaseInfo=".$phase->id}}'>
        <div class="border border-success p-2 mb-2 border-opacity-50" style="width:100%; height:150px; background-color:#f0f8ff; display: flex; padding: 10px;" >
            <div>
                    <div style="margin-left:-9%; margin-top:-5.4%;width:150px; height:148px;  background-color:#505873; ">
                        <div class="badge text-wrap" style="width: 100%;">
                            {{$phase->name}}
                        </div> 
                        <div class="badge  text-wrap" style="width: 100%;">
                        <label >Дата начала:</label><br><br>
                            {{$phase->time_frome}}
                        </div> 
                        <div class="badge text-wrap" style="width: 100%;">
                        <label >Дата окончания:</label><br><br>
                            {{$phase->time_to}}
                        </div> 
                    </div>
            </div>
        </a>
            @foreach($phase_participants as $key => $participant)
                @if($phase->id === $participant->phase_id)
                    <div style="margin-left: 5px;">
                        <a href='{{url()->current()."?&participant=".$participant->id}}'>
                            <div class="p-0 bg-success bg-opacity-10 border border-primary border-start-0 rounded-end" style="overflow: hidden; margin-left:-9%; margin-top:-4%;width:200px; height:112%;  background-color:#00964b; ">
                                    <center > 
                                        <div class="badge text-wrap bg-primary " style="width: 80%; color: #211C18;">
                                        <label >Сотрудник: </label>
                                            {{$users->where('id', $participant->participant_id)->first()->name}}     
                                        </div> 
                                    </center>
                                    <div class="badge text-wrap" style="width: 100%; color: #211C18;">
                                    <label >Задача: </label>
                                        {{$participant->subtask}}                               
                                    </div> 
                                    <div class="badge  text-wrap" style="width: 100%; color: #211C18;">
                                        <label >Дата начала:</label><br><br>
                                        {{$participant->time_frome}}
                                    </div> 
                                    <div class="badge text-wrap" style="width: 100%; color: #211C18;">
                                        <label >Дата окончания:</label><br><br>
                                        {{$participant->time_to}}
                                    </div> 
                                </div>
                            </a>
                    </div>
                @endif
            @endforeach
            <a href='{{url()->current()."?&phase=".$phase->id}}' style='margin-left:4px;'>
                <div class="p-0 bg-success bg-opacity-10 border border-primary border-start-0 rounded-end" style="overflow: hidden; margin-left:-9%; margin-top:-4%;width:200px; height:112%;  background-color:#00964b; ">
                    <button type="button" class="btn btn-outline-primary" style="width: 100%; height:100%">Создать задачу</button>
                </div>
            </a>
        </div>
    @endforeach

    <div>

    <a style='text-decoration:none' href='{{url()->current()."?&createNewTask=".explode("/", explode('?', url()->current())[0])[count(explode("/", explode('?', url()->current())[0]))-1]}}'>
        <div class="border border-success p-2 mb-2 border-opacity-50" style="width:100%; height:150px; background-color:#f0f8ff; display: flex; padding: 10px;" >
        <button type="button" class="btn btn-outline-primary" style="width: 100%; height:100%; color:#000; font-size:2.4vw; text-decoration:none">Создать задачу</button>
    
        </div>
    </a>
    @include('modal_windows.subtask_information')
    @yield('subtask_information', 'Не удалось получить модальное окно этапа') 
    @yield('create_subtask', 'Не удалось получить модальное окно создания этапа') 

@endsection