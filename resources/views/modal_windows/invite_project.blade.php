@section("modal_invite_project")


<div class="modal fade" id="invite-project" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Приглашение</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">        
        @if(!empty($response['status']) && $response['status'] == 'open')
          <label for="inviteInProject" class="form-label">Вас пригласили вступить в проект {{ $response['name'] }}</label>
        @endif
        @if(!empty($response['status']) && $response['status'] == 'close')
          <label for="inviteInProject" class="form-label">Вы можете подать запрос на вступление в проект {{ $response['name'] }}label>
        @endif
      </div>
      <div class="modal-footer">
        @if(!empty($response['status']) && $response['status'] == 'open')
          <button type="button" class="btn btn-success joine-project-button" value="0">Вступить</button>
        @endif
        @if(!empty($response['status']) && $response['status'] == 'close')
          <button type="button" class="btn btn-success joine-project-button" value="1">Подать запрос</button>
        @endif
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>        
      </div>
    </div>
  </div>
</div>

<script>

$(".joine-project-button").click(function(){
	
    let idProjectStr = $(".group-item-project.active").attr("id");
    let idSelectProject = parseInt(idProjectStr.match(/\d+/));

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '{{route('joinProject')}}',
      method: 'get',
      data: {
          type: $(this).val(),
          projectId: {{ $response['id_project'] }},
          userId: {{auth()->user()->id}},
      },
      success: function(data){
        let projectData = data['resultat'];
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