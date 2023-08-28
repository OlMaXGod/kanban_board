@section("modal_create_project")


<div class="modal fade" id="creat-project" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Создание проекта</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
            <form method="POST" action="{{ route('newProject') }}">
            @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Название проекта</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='name'>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">описание проекта</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name='comment'>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Тип проекта</label>
                    <select class="form-select" aria-label="Пример выбора по умолчанию" name='type'>
                        <option value="0">Закрытый</option>
                        <option value="1">Открытый</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Доступ к проекту</label>
                    <select class="form-select" aria-label="Пример выбора по умолчанию" name='access'>
                        <option value="0">Без подтверждения</option>
                        <option value="1">С подтверждением, от администрации проекта</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-outline-primary" >Создать</button>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        
      </div>
      
    </div>
  </div>
</div>


@endsection