@section("modal_invite_project")
<?php $id_project = explode('/', explode('?', url()->current())[0])[array_key_last(explode('/', explode('?', url()->current())[0]))]?>
@if(!empty($projectParticipants->where('participant_id',Auth::user()->id)->where('project_id', $id_project)->first()->entry_request))
@if(!empty($_GET['invite']) && $projectParticipants->where('participant_id',Auth::user()->id)->where('project_id', $id_project)->first()->entry_request === 1)
    <script>
      window.location.href = '{{explode('?', url()->current())[0]}}';
    </script>
  @endif
  @endif

<div class="modal fade" id="invite-project" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Приглашение</h1>
          </div>
          <div class="modal-body">
              <label for="inviteInProject" class="form-label">Вы можете подать запрос на вступление в проект '{{ $project->name }}'<label>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-success joine-project-button" value="1">Подать запрос</button>  
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">

    $(window).on('load',function(){
        $('#invite-project').modal('show');
    });

    $(".joine-project-button").click(function(){
      
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: '{{route('joinProject')}}',
          method: 'post',
          data: {
              type: $(this).val(),
              projectId: {{ $id_project }},
              userId: {{auth()->user()->id}},
          },
          success: function(data){
            $('#invite-project').modal('hide');
          },
          error: function(jqXHR, exception){

              console.log(jqXHR.responseText);
              var msg = '';
              if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
              } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
              } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
              } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
              } else if (exception === 'timeout') {
                msg = 'Time out error.';
              } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
              } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
              };

              alert(msg);
            }
        });	
    });
    
    </script>


@endsection