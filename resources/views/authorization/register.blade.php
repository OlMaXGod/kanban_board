
@section("register")

<div class="container" style="margin-top:10%; border: 2px solid black;  padding: 0.5%; max-width: 600px">

<form method="POST" action="http://localhost/kanban_board/public/register">
@csrf

     <div class="mb-3">
         <label for="exampleInputEmail1" class="form-label">Ваше ФИО</label>
         <input id="name" type="text"  class="form-control" name="name" value="{{ old('email') }}" required  autofocus>
     </div> 
  
    <div class="mb-3">
         <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
         <input id="email" type="email"  class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
         <div id="emailHelp" class="form-text">Мы никогда никому не передадим вашу электронную почту.</div>
    </div>

    <div class="mb-3">
         <label for="exampleInputEmail1" class="form-label">Номер телефона</label>
         <input id="phone" type="tel"  class="form-control" name="phone" value="{{ old('email') }}" required autocomplete="phone" autofocus>
    </div>

     <div class="mb-3">
         <label for="exampleInputPassword1" class="form-label">Пароль</label>
         <input id="password" type="password"  class="form-control" name="password" required autocomplete="current-password">
     </div>

    <div class="mb-3">
         <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Введите пароль ещё раз</label>
         <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">   
    </div>

  <button type="submit" class="btn btn-outline-primary" style="margin-left:37%;">Создать аккаунта</button>
  
</form>
<a href="{{explode('?', $_SERVER['REQUEST_URI'])[0]}}"><button class="btn btn-light" style="margin-left:33%; margin-top:1%">У меня уже есть аккаунт</button></a>

</div>

@endsection