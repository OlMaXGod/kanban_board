@section("footer")

<div class="container-xxl" style="background-color:#FFE4C4; padding: 10px; min-top:100%;">
    
<ul class="nav justify-content-end" >

   <li class="nav-item" style="padding-right: 10px">
      <button type="button" class="btn btn-outline-light"><a class="nav-link" href="http://localhost/kanban_board/public/project/add_user_url/2/4">В проект 4 добавить id-2</a></button>
   </li>
   <li class="nav-item" style="padding-right: 10px">
      <button type="button" class="btn btn-outline-light"><a class="nav-link" href="{{ route('home') }}">Доска</a></button>
   </li>
   <li class="nav-item" style="padding-right: 10px">
      <button type="button" class="btn btn-outline-light"><a class="nav-link" href="{{ route('get.user') }}">Личный кабинет</a></button>
   </li>
  <li class="nav-item" style="padding-right: 10px">
     <button type="button" class="btn btn-outline-light"><a class="nav-link" href="{{ route('logout') }}">Выйти</a></button>
  </li>

</ul>

</div>

@endsection