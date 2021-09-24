<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ユーザーログイン画面</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js')}}" defer></script>
    <!-- Styles-->
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/signin.css')}}" rel="stylesheet">
  </head>
  <body>
    <form class="form-signin" method="POST" action="{{route('login')}}">
      @csrf
      <h1 class="h3 mb-3 font-weight-normal">ユーザーログイン画面</h1>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach

        </ul>

      </div>
      @endif
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail"　name="email" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword"  name="password" class="form-control" placeholder="Password" required>

      <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
      <a href="{{ route('sign_up') }}">新規登録はこちら</a>

    </form>



  </body>
</html>
