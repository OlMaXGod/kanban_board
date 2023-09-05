@section("modal_update_stage")
@if(!empty($_GET['phaseInfo']))
<?php date_default_timezone_set( 'Europe/Moscow' );?>
  <div class="modal fade" id="update-stage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Настройка этапа</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть" onclick='closeModal()'></button>
        </div>
        <div class="modal-body">
              <form method="POST" action="{{route('updateTask')}}">
              @csrf
                  <div class="mb-3">
                      <label for="exampleInputNameStage" class="form-label">Название этапа</label>
                      <input type="text" value='{{$project_phases->where('id', $_GET['phaseInfo'])->first()->name}}' class="form-control" id="exampleInputNameStage" aria-describedby="exampleInputNameStage" name='name' >
                  </div>
                  <div class="mb-3">
                      <label for="commentStage" class="form-label">Описание этапа</label>
                      <textarea class="form-control mt-2" name='comment' id="commentStage" aria-label="С текстовым полем"maxlength="88" style="height:160px; resize: none;">{{$project_phases->where('id', $_GET['phaseInfo'])->first()->comment}}
                      </textarea>
                  </div>
                  <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Дата начала задачи</label>
                            <input type="date" class="form-control" name='fromDate' value='{{date('Y-m-d', strtotime($project_phases->where('id', $_GET['phaseInfo'])->first()->time_frome))}}'>
                            <label for="exampleInputPassword1" class="form-label">Время начала задачи</label>
                            <input type="time" class="form-control" name='fromTime' value='{{date('H:i:s', strtotime($project_phases->where('id', $_GET['phaseInfo'])->first()->time_frome))}}'>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Дата закрытия задачи</label>
                            <input type="date" class="form-control" name='toDate' value='{{date('Y-m-d', strtotime($project_phases->where('id', $_GET['phaseInfo'])->first()->time_to))}}'>
                            <label for="exampleInputPassword1" class="form-label">Время начала задачи</label>
                            <input type="time" class="form-control" name='toTime' value='{{date('H:i:s', strtotime($project_phases->where('id', $_GET['phaseInfo'])->first()->time_to))}}'>
                        </div>
                  <input type="text" class="form-control" name='phaseID' style="visibility:hidden;"  value='{{$_GET['phaseInfo']}}'>
                  <button type="submit" class="btn btn-outline-primary" >Обновить</button>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick='closeModal()'>Закрыть</button>        
        </div>      
      </div>
    </div>
  </div>
    <button type="button" id="editStaqgeButton" data-bs-toggle="modal" style="visibility:hidden;" data-bs-target="#update-stage" class="btn btn-secondary mt-2 mx-auto">
        Настройки этапа
    </button>

    <script>
                $( "#editStaqgeButton" ).click();

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
                            backURL: '{{explode('?', url()->current())[0]}}',
                        },    
                        success: function(data){  
                            window.location.href = '{{explode('?', url()->current())[0]}}';
                        }
                    });
                }
      </script>
@endif
@endsection