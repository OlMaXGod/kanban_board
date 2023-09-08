@section("subtask_information")
    @if(!empty($_GET['participant']))
    <?php date_default_timezone_set( 'Europe/Moscow' );?>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$participant->where('id', $_GET['participant'])->first()->subtask}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть" onclick='closeModal()'></button>
                </div>
                <div class="modal-body">
                <form action="{{route('updateSubtask')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Сотрудник</label>
                                <select class="form-select" aria-label="Пример выбора по умолчанию" name='participant'>

                                    @foreach($projectParticipants as $key => $participants)
                                        <option value="{{$users->where('id', $participants->participant_id)->first()->id}}">
                                                {{$users->where('id', $participants->participant_id)->first()->name}}
                                            </option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Описание подзадачи</span>
                                <textarea class="form-control" name='comment' aria-label="С текстовым полем">{{$participant->where('id', $_GET['participant'])->first()->comment}}</textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Дата начала подзадачи</label>
                            <input type="date" class="form-control" name='fromDate' value='{{date('Y-m-d', strtotime($phase_participants->where('id', $_GET['participant'])->first()->time_frome))}}'>
                            <label for="exampleInputPassword1" class="form-label">Время начала подзадачи</label>
                            <input type="time" class="form-control" name='fromTime' value='{{date('H:i:s', strtotime($phase_participants->where('id', $_GET['participant'])->first()->time_frome))}}'>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Дата закрытия подзадачи</label>
                            <input type="date" class="form-control" name='toDate' value='{{date('Y-m-d', strtotime($phase_participants->where('id', $_GET['participant'])->first()->time_to))}}'>
                            <label for="exampleInputPassword1" class="form-label">Время закрытия подзадачи</label>
                            <input type="time" class="form-control" name='toTime' value='{{date('H:i:s', strtotime($phase_participants->where('id', $_GET['participant'])->first()->time_to))}}'>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputStatus" class="form-label">Статус задачи</label>
                            <select class="form-select" aria-label="Пример выбора по умолчанию" name='status'>
                                @foreach($statusList as $key => $status)
                                    @if($key == $participant->where('id', $_GET['participant'])->first()->status)
                                        <option selected value={{$key}}>{{$status}}</option>
                                    @else
                                        <option value={{$key}}>{{$status}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <input type="text" name='phaseParticipantID' style='visibility:hidden; height:0px' class="form-control" value='{{$_GET['participant']}}' >
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </form>
                </div>
                <div class="modal-footer">
                    @if($phase->where('who_changed', Auth::user()->id)->first() != null)
                        <button type="button" class="btn btn-danger" onclick='deleteSubtask({{$_GET['participant']}})'>Удалить задачу</button>
                    @endif
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick='closeModal()'>Закрыть</button>
                </div>
                </div>
            </div>
        </div>
        <button type="button" id='subtaskInformationModal' class="btn btn-primary" style="visibility:hidden;" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
        @if(!empty($_GET['participant']))
            <script>
                $( "#subtaskInformationModal" ).click();

                function closeModal(){
                    window.location.href = '{{explode('?', url()->current())[0]}}';
                    };

                function deleteSubtask(projectId){
                    $.ajax({
                        url: '{{route('deleteSubtask')}}',         
                        method: 'post',          
                        dataType: 'html',      
                        data: {"_token": "{{ csrf_token() }}",
                            subtaskId: projectId,
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Новая подзадача</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть" onclick='closeModal()'></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('createSubtask')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Название подзадачи</span>
                                <input type="text" class="form-control" name='name'>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Сотрудник</label>
                                <select class="form-select" aria-label="Пример выбора по умолчанию" name='participant'>
                                    <option selected value='{{Auth::user()->id}}'>
                                        {{Auth::user()->name}}
                                    </option>
                                        @foreach($projectParticipants as $key => $participants)
                                            @if($participants->participant_id != Auth::user()->id && $participants->project_id == explode('/', explode('?', url()->current())[0])[array_key_last(explode('/', explode('?', url()->current())[0]))])
                                                <option>
                                                    {{$users->where('id', $participants->participant_id)->first()->name}}
                                                </option>
                                            @endif
                                        @endforeach
                                </select>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Описание подзадачи</span>
                                <textarea class="form-control" name='comment' aria-label="С текстовым полем"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Дата начала подзадачи</label>
                            <input type="date" class="form-control" value='{{date('Y-m-d')}}' name='fromDate'>
                            <label class="form-label">Время начала подзадачи</label>
                            <input type="time" class="form-control" value='{{date("H:i:s")}}' name='fromTime'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Дата закрытия подзадачи</label>
                            <input type="date" class="form-control" value='{{date('Y-m-d', strtotime("+1 day"))}}' name='toDate'>
                            <label class="form-label">Время закрытия подзадачи</label>
                            <input type="time" class="form-control" value='{{date('H:i:s')}}' name='toTime'>
                            <input type="text" style='visibility:hidden; height:0px' class="form-control" value='{{$_GET['phase']}}' name='phaseID'>
                            <input type="text" name='projectID' style='visibility:hidden; height:0px' class="form-control" value='{{explode("/", explode('?', url()->current())[0])[count(explode("/", explode('?', url()->current())[0]))-1]}}' name='phaseID'>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputStatus" class="form-label">Статус задачи</label>
                            <select class="form-select" aria-label="Пример выбора по умолчанию" name='status'>
                                <option value='0'>Ожидание</option>
                                <option value='1'>В работе</option>
                                <option value='2'>Закрыта</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Создать подзадачи</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick='closeModal()'>Закрыть</button>
                </div>
                </div>
            </div>
        </div>
        <button type="button" id='subtaskInformationModal' class="btn btn-primary" style="visibility:hidden;" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
        @if(!empty($_GET['phase']))
            <script>
                $( "#subtaskInformationModal" ).click();
                function closeModal(){
                    window.location.href = '{{explode('?', url()->current())[0]}}';
                    };
            </script>
        @endif
    @endif
@endsection