@section("subtask_information")
    @if(!empty($_GET['participant']))
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$participant->where('id', $_GET['participant'])->first()->subtask}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Сотрудник</label>
                                <select class="form-select" aria-label="Пример выбора по умолчанию">
                                    <option selected>
                                        {{$users->where('id', $participant->where('id', $_GET['participant'])->first()->participant_id)->first()->name}}
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
                                <textarea class="form-control" aria-label="С текстовым полем">{{$participant->where('id', $_GET['participant'])->first()->comment}}</textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Дата начала задачи</label>
                            <input type="date" class="form-control" value='{{date('Y-m-d', strtotime($participant->time_frome))}}'>
                            <label for="exampleInputPassword1" class="form-label">Время начала задачи</label>
                            <input type="time" class="form-control" value='{{date('H:i:s', strtotime($participant->time_frome))}}'>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Дата закрытия задачи</label>
                            <input type="date" class="form-control" value='{{date('Y-m-d', strtotime($participant->time_to))}}'>
                            <label for="exampleInputPassword1" class="form-label">Время закрытия задачи</label>
                            <input type="time" class="form-control" value='{{date('H:i:s', strtotime($participant->time_to))}}'>
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary">Сохранить изменения</button>
                </div>
                </div>
            </div>
        </div>
        <button type="button" id='subtaskInformationModal' class="btn btn-primary" style="visibility:hidden;" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
        @if(!empty($_GET['participant']))
            <script>
                $( "#subtaskInformationModal" ).click();
            </script>
        @endif
    @endif
@endsection