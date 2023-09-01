@section("project_milestone_table")
    <div>
<<<<<<< HEAD
    @foreach($project_phases as $key => $phase)
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
                            </button>
                            </a>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach
    </div>
    @include('modal_windows.subtask_information')
    @yield('subtask_information', 'Не удалось получить модальное окно этапа') 
=======
        <div class="border border-success p-2 mb-2 border-opacity-50" style="width:100%; height:150px; background-color:#ffeded; display: flex; padding: 10px;" >
            <div style="display: flex;" id="row">
                <div style="width:10%; height:150px; background-color:#2656a3;">
                    
                </div>
            </div>
        </div>
    </div>
>>>>>>> main
@endsection