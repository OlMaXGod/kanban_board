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
                    <input type="text" class="form-control" id="exampleInputNameStage" aria-describedby="emailHelp" name='name'>
                </div>
                <div class="mb-3">
                    <label for="commentStage" class="form-label">Описание этапа</label>
                    <textarea class="form-control mt-2" id="commentStage" aria-label="С текстовым полем"maxlength="88" style="height:160px; resize: none;"></textarea>
                </div>
								<div class="row mb-3">
                  <div class="col-5">
                    <label for="datepickerfrom" class="form-label">Время выполнения с</label>
                  </div>
                  <div class="col-3">
                    <input type="text" class="form-control" id="datepickerfrom" name="datepickerfrom">
                  </div>
                </div>
                <div class="row mb-3">
                    <div class="col-5">
                        <label for="datepickerto" class="form-label">По</label>
                    </div>
                    <div class="col-3">
                      <input type="text" class="form-control" id="datepickerto" name="datepickerto">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Ответственный</label>                
                    <select class="form-select form-select-sm" id="selectUserforStage" aria-label=".form-select-sm пример">
                      <option class='opt-st' value="1" id='opt-st-1'>Рабочий 1</option>
                      <option class='opt-st' value="2" id='opt-st-2'>Рабочий 2</option>
                      <option class='opt-st' value="3" id='opt-st-3'>Рабочий 3</option>
                    </select>
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