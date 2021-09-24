<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>新規登録完了画面</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js')}}" defer></script>
    <!-- Styles-->
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/signin.css')}}" rel="stylesheet">
  </head>

  <body>

      <h1 class="h3 mb-3 font-weight-normal">新規登録完了画面</h1>

      <p>新規登録が完了しました</p>
      <a href="{{ route('showLogin') }}">ログイン画面へ戻る</a>


    </form>

  </body>
</html>
