@section("projectsMenu")

    <div class="container" style = 'border: thick double #32a1ce;margin-left:71%; margin-top:-40%; max-width:30%; height:328px'>
        <div class="container" >
            <div class="container" id="search-body" style = 'border-bottom:  thick double #32a1ce;'>
                <form>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" style="margin-left:10%">Поиск проекта по названию</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                    </div>
                    <button type="submit" class="btn btn-primary" style = 'margin-left:35%; margin-bottom:2%'>Поиск</button>
                </form>
            </div> 
            <div class="container" id="filter-body" style='margin-top:5px;border-bottom:  thick double #32a1ce;' >
                 <label for="exampleInputEmail1" class="form-label" style="margin-left:35%">Фильтры</label>
                <div class="btn-group" role="group" aria-label="Basic outlined example" style="margin-left:-8%;margin-bottom:2%">
                    <button type="button" class="btn btn-outline-primary">Дата</button>
                    <button type="button" class="btn btn-outline-primary">Название</button>
                    <button type="button" class="btn btn-outline-primary">Доступ</button>
                    <button type="button" class="btn btn-outline-primary">Создатель</button>
                </div>
            </div> 
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-top:2%;margin-left:22%">
                 Сбросить фильтры
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-top:2%;margin-left:26%">
                 Создать проект
            </button>
        </div> 
    </div>

@endsection