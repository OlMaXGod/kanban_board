@section("subtask_information")
    @if(!empty($_GET['participant']))
    <?php date_default_timezone_set( 'Europe/Moscow' );?>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$participant->where('id', $_GET['participant'])->first()->subtask}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                <form action="{{route('updateSubtask')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Сотрудник</label>
                                <select class="form-select" aria-label="Пример выбора по умолчанию" name='participant'>
                                    <option selected value='{{Auth::user()->id}}'>
                                        {{Auth::user()->name}}
                                    </option>
                                    @foreach($phase_participants as $key => $phase_participants)
                                        @if($phase_participants->participant_id != $users->where('id', $participant->where('id', $_GET['participant'])->first()->participant_id)->first()->id)
                                            <option>
                                                {{$users->where('id', $participant->where('id', $phase_participants->participant_id)->first()->participant_id)->first()->name}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Описание задачи</span>
                                <textarea class="form-control" name='comment' aria-label="С текстовым полем">{{$participant->where('id', $_GET['participant'])->first()->comment}}</textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Дата начала задачи</label>
                            <input type="date" class="form-control" name='fromDate' value='{{date('Y-m-d', strtotime($participant->time_frome))}}'>
                            <label for="exampleInputPassword1" class="form-label">Время начала задачи</label>
                            <input type="time" class="form-control" name='fromTime' value='{{date('H:i:s', strtotime($participant->time_frome))}}'>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Дата закрытия задачи</label>
                            <input type="date" class="form-control" name='toDate' value='{{date('Y-m-d', strtotime($participant->time_to))}}'>
                            <label for="exampleInputPassword1" class="form-label">Время закрытия задачи</label>
                            <input type="time" class="form-control" name='toTime' value='{{date('H:i:s', strtotime($participant->time_to))}}'>
                        </div>
                        <input type="text" name='participantsID' style='visibility:hidden; height:0px' class="form-control" value='{{$_GET['participant']}}' name='participantsID'>
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </form>
                </div>
                <div class="modal-footer">
                    @if($phase->where('who_changed', Auth::user()->id)->first() != null)
                        <button type="button" class="btn btn-danger" onclick='deleteSubtask({{$_GET['participant']}})'>Удалить задачу</button>
                    @endif
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
                </div>
            </div>
        </div>
        <button type="button" id='subtaskInformationModal' class="btn btn-primary" style="visibility:hidden;" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
        @if(!empty($_GET['participant']))
            <script>
                $( "#subtaskInformationModal" ).click();
                function deleteSubtask(projectId){
                    $.ajax({
                        url: '{{route('deleteSubtask')}}',         
                        method: 'post',          
                        dataType: 'html',      
                        data: {"_token": "{{ csrf_token() }}",
                            subtaskId: projectId,
                            backURL: '{{explode('?', url()->current())[0]}}',
                        },    
                        success: function(data){  
                            window.location.href = '{{explode('?', url()->current())[0]}}';
                        }
                    });
                }
            </script>
        @endif
    @endif
@endsection

@section("create_subtask")
    @if(!empty($_GET['phase']))
    <?php date_default_timezone_set( 'Europe/Moscow' );?>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Новая задача</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('createSubtask')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Название задачи</span>
                                <input type="text" class="form-control" name='name'>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Сотрудник</label>
                                <select class="form-select" aria-label="Пример выбора по умолчанию" name='participant'>
                                    <option selected value='{{Auth::user()->id}}'>
                                        {{Auth::user()->name}}
                                    </option>
                                    @foreach($phase_participants as $key => $phase_participants)

                                        @if($phase_participants->participant_id != $users->where('id', $participant->where('project_id', explode("/", explode('?', url()->current())[0])[count(explode("/", explode('?', url()->current())[0]))-1])->first()->participant_id)->first()->id)
                                            <option value = '{{$users->where('id', $participant->where('id', $phase_participants->participant_id)->first()->participant_id)->first()->id}}'>
                                                {{$users->where('id', $participant->where('id', $phase_participants->participant_id)->first()->participant_id)->first()->name}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Описание задачи</span>
                                <textarea class="form-control" name='comment' aria-label="С текстовым полем">{{$participant->where('phase_id', explode("/", explode('?', url()->current())[0])[count(explode("/", explode('?', url()->current())[0]))-1])->first()->comment}}</textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Дата начала задачи</label>
                            <input type="date" class="form-control" value='{{date('Y-m-d')}}' name='fromDate'>
                            <label class="form-label">Время начала задачи</label>
                            <input type="time" class="form-control" value='{{date("H:i:s")}}' name='fromTime'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Дата закрытия задачи</label>
                            <input type="date" class="form-control" value='{{date('Y-m-d', strtotime("+1 day"))}}' name='toDate'>
                            <label class="form-label">Время закрытия задачи</label>
                            <input type="time" class="form-control" value='{{date('H:i:s')}}' name='toTime'>
                            <input type="text" style='visibility:hidden; height:0px' class="form-control" value='{{$_GET['phase']}}' name='phaseID'>
                            <input type="text" name='projectID' style='visibility:hidden; height:0px' class="form-control" value='{{explode("/", explode('?', url()->current())[0])[count(explode("/", explode('?', url()->current())[0]))-1]}}' name='phaseID'>
                        </div>
                        <button type="submit" class="btn btn-primary">Создать задачу</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
                </div>
            </div>
        </div>
        <button type="button" id='subtaskInformationModal' class="btn btn-primary" style="visibility:hidden;" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
        @if(!empty($_GET['phase']))
            <script>
                $( "#subtaskInformationModal" ).click();
            </script>
        @endif
    @endif
@endsection