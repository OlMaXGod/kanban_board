@section("modal_update_project")


<div class="modal fade" id="update-project" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Создание проекта</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" class="form-control" id="exampleIdProject" aria-describedby="emailHelp" name='id'>
        <div class="mb-3">
            <label for="exampleInputNameProject" class="form-label">Название проекта</label>
            <input type="text" class="form-control" id="exampleInputNameProject" aria-describedby="emailHelp" name='name'>
        </div>
        <div class="mb-3">
            <label for="exampleInputText" class="form-label">описание проекта</label>
            <input type="text" class="form-control" id="exampleInputText" name='comment'>
        </div>
        <div class="mb-3">
            <label for="exampleInputSelect1" class="form-label">Тип проекта</label>
            <select class="form-select" aria-label="Пример выбора по умолчанию" id="exampleInputSelect1" name='type'>
                <option value="0" id="opt-s1-0">Закрытый</option>
                <option value="1" id="opt-s1-1">Открытый</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputSelect2" class="form-label">Доступ к проекту</label>
            <select class="form-select" aria-label="Пример выбора по умолчанию" id="exampleInputSelect2" name='access'>
                <option value="0" id="opt-s1-0">Без подтверждения</option>
                <option value="1" id="opt-s1-1">С подтверждением, от администрации проекта</option>
            </select>
        </div>
        <button type="submit" class="btn btn-outline-primary" id="saveProjectButton">Обновить</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        
      </div>
      
    </div>
  </div>
</div>


@endsection