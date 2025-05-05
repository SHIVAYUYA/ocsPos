<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>学園祭レジシステム</title>
</head>
<body>
  <main>
    <div class="main__container">
      <h1 class="loginPage__title">login</h1>
      <div class="main__content">
        @if ($errors->any())
        <div class="form__errors">
          <ul>
            @foreach ($errors->all() as $error)
              <li style="color:red;">{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
        <form action="{{ route('login.auth') }}" method="POST">
          @csrf
          <div class="form__group">
            <input type="text" name="class_name" class="form__group--userID" placeholder="class_name">
            <input type="password" name="password" class="form__group--password" placeholder="password">
            <button type="submit" class="form__group--btn">login</button>
          </div>
        </form>
      </div>
    </div>
  </main>
</body>
</html>
