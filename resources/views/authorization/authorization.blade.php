
@section("authorization")

<div class="container" style="margin-top:10%; border: 2px solid black;  padding: 0.5%; max-width: 600px">

<form method="POST" action="{{ route('login') }}">
@csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
    <input id="email" type="email"  class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    <div id="emailHelp" class="form-text">Мы никогда никому не передадим вашу электронную почту.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input id="password" type="password"  class="form-control" name="password" required autocomplete="current-password">
  </div>

  <button type="submit" class="btn btn-outline-primary" style="margin-left:44%;">Войти</button>
  
</form>
<a href="?register=true"><button  class="btn btn-light" style="margin-left:40%; margin-top:1%">Регистрация</button></a>
      
</div>

@endsection