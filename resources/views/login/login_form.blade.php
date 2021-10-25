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
    <form class="form-signin" method="POST" action="{{ route('login') }}">
      @csrf
      <h1 class="h3 mb-3 font-weight-normal">ユーザーログイン画面</h1>
      
      @if(session('flash_message'))
      <div class="text-danger">
          {{ session('flash_message') }}
      </div>
      @endif
      
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <label for="email" class="sr-only">メールアドレス</label>
      <input type="email" name="email" class="form-control" placeholder="メールアドレス" required autofocus>
      
      <label for="password" class="sr-only">パスワード</label>
      <input type="password" name="password" class="form-control" placeholder="パスワード" required autofocus>

      <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
      <a href="{{ route('sign_up') }}">新規登録はこちら</a>

    </form>
  
    



  </body>
</html>
