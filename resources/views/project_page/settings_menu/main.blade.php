@section("setting_menu")
    <div>
        <div style="width:100%; height:200px; background-color:#cfcbc2; display: flex; padding: 10px;" >
            <div style='width:25%; float:left' >
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Название проекта</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='name' value='{{$project->name}}'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">описание проекта</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name='comment' value='{{$project->comment}}'>
                    </div>    
            </div>
            <div style='width:22%;'>
                <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Тип проекта</label>
                        <select class="form-select" aria-label="Пример выбора по умолчанию" name='type'>
                            <option value="0" {{($project->comment == 0) ? "selected " : ""}}>Закрытый</option>
                            <option value="1" {{($project->comment == 1) ? "selected " : ""}}>Открытый</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Доступ к проекту</label>
                        <select class="form-select" aria-label="Пример выбора по умолчанию" name='access'>
                            <option value="0" {{($project->access == 0) ? "selected " : ""}}>Без подтверждения</option>
                            <option value="1" {{($project->access == 1) ? "selected " : ""}}>С подтверждением, от администрации проекта</option>
                        </select>
                    </div>
            </div>
            <div style='width:30%;'>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ссылка на проект</label>
                    <input type="text" class="form-control" id="projectURL" readonly value="{{url()->full()}}">
                </div>
            </div>
            <div style='width:22%;padding: 8px;'>
                <div class="mb-3">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">Список участников и заявок</button>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style='width:40%'>
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Участники и запросы на вступление</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
  </div>
  <div class="offcanvas-body">
    
  @include('profile.participants')
  @yield('participants', 'Не удалось получить список шапку') 
    </div>
  </div>
</div>
@endsection