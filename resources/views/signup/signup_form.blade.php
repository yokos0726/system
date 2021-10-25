<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>新規登録画面</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js')}}" defer></script>
    <!-- Styles-->
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/signup.css')}}" rel="stylesheet">
  </head>

  <body>
    <form class="form-signup" method="POST" action="{{ route('register') }}">
      @csrf
      <h1 class="h3 mb-3 font-weight-normal">新規登録画面</h1>

      <label for="user_name" class="sr-only">ユーザー名</label>
      <input type="text" name="user_name" class="form-control" placeholder="ユーザー名" required autofocus>

      @if ($errors->has('username'))
      <div class="text-danger">
        {{$errors->first('username')}}
      </div>
      @endif

      <label for="email" class="sr-only">メールアドレス</label>
      <input type="email" name="email" class="form-control" placeholder="メールアドレス" required autofocus>

      @if ($errors->has('email'))
      <div class="text-danger">
        {{$errors->first('email')}}
      </div>
      @endif

      <label for="password" class="sr-only">パスワード</label>
      <input type="password" name="password" class="form-control" placeholder="パスワード" required autofocus>

      @if ($errors->has('password'))
      <div class="text-danger">
        {{$errors->first('password')}}
      </div>
      @endif

      <label for="password_confirmation" class="sr-only">パスワード確認</label>
      <input type="password" name="password_confirmation" class="form-control" placeholder="パスワード確認" required autofocus>

      @if ($errors->has('password_confirmation'))
      <div class="text-danger">
        {{$errors->first('password_confirmation')}}
      </div>
      @endif

      <button class="btn btn-lg btn-primary btn-block" type="submit">新規登録</button>
      <a href="{{ route('showLogin') }}">戻る</a>

    </form>

  </body>
</html>
