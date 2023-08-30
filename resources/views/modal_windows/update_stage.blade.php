@section("modal_update_stage")


<div class="modal fade" id="update-stage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Настройка этапа</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
            <form method="POST" action="#">
            @csrf
                <div class="mb-3">
                    <label for="exampleInputNameStage" class="form-label">Название этапа</label>
                    <input type="text" class="form-control" id="exampleInputNameStage" aria-describedby="exampleInputNameStage" name='name'>
                </div>
                <div class="mb-3">
                    <label for="commentStage" class="form-label">Описание этапа</label>
                    <textarea class="form-control mt-2" id="commentStage" aria-label="С текстовым полем"maxlength="88" style="height:160px; resize: none;"></textarea>
                </div>
								<div class="mb-3">
                    <label for="datepickerfrom" class="form-label">Время выполнения с</label><br>
                    <input type="text" class="form-control mt-2" id="datepickerfrom" name="datepickerfrom">
                </div>
                <div class="mb-3">
                    <label for="datepickerto" class="form-label">По</label><br>
                    <input type="text" class="form-control mt-2" id="datepickerto" name="datepickerto">
                </div>
                <button type="submit" class="btn btn-outline-primary" >Обновить</button>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>        
      </div>      
    </div>
  </div>
</div>


@endsection