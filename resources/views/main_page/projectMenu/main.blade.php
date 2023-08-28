@section("projectsMenu")

    <div class="container" style = 'border: thick double #32a1ce;margin-left:71%;  max-width:30%; height:328px'>
        <div class="container" >
            <div class="container" id="search-body" style = 'border-bottom:  thick double #32a1ce;'>
                <form>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" style="margin-left:10%">Поиск проекта по названию</label>
                        <input type="text" class="form-control" id="inputProjectName" aria-describedby="emailHelp" >
                    </div>
                    <button type="button" class="btn btn-primary" style = 'margin-left:35%; margin-bottom:2%' onclick='searchByName()'>Поиск</button>
                </form>
            </div> 
            <div class="container" id="filter-body" style='margin-top:5px;border-bottom:  thick double #32a1ce;' >
                 <label for="exampleInputEmail1" class="form-label" style="margin-left:32%">Сортировка</label>
                <div class="btn-group" role="group" aria-label="Basic outlined example" style="margin-left:-8%;margin-bottom:2%">
                    <button type="button" class="btn btn-outline-primary" onclick='sort(this)' value="created_at">Дата</button>
                    <button type="button" class="btn btn-outline-primary" onclick='sort(this)' value="name">Название</button>
                    <button type="button" class="btn btn-outline-primary" onclick='sort(this)' value="type_id">Доступ</button>
                    <button type="button" class="btn btn-outline-primary" onclick='sort(this)' value="who_changed">Создатель</button>
                </div>
            </div> 
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick='resetFilter()' style="margin-top:2%;margin-left:22%">
                 Сбросить фильтры
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#creat-project" style="margin-top:2%;margin-left:26%">
                 Создать проект
            </button>
        </div> 
    </div>

@endsection