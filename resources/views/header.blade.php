@section("header")
<div style="background-color:#FFE4C4; padding: 10px">
    
<ul class="nav justify-content-end" >

  <li class="nav-item" style="padding-right: 10px">
     <button type="button" class="btn btn-outline-light"><a class="nav-link" href="{{ route('get.user') }}">Личный кабинет</a></button>
  </li>
  <li class="nav-item" style="padding-right: 10px">
     <button type="button" class="btn btn-outline-light"><a class="nav-link" href="{{ route('logout') }}">Выйти</a></button>
  </li>

</ul>

</div>
@endsection