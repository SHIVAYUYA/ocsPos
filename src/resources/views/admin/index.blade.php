<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理者画面</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
<header>
  <div>大阪情報専門学校</div>
  <div>学園祭</div>
  <div>管理者画面</div>
</header>

<div class="container">
  <button class="button" onclick="location.href='{{ url('proceeds') }}'">
    <div class="jp">データ管理</div>
    <div class="en">Data Manager</div>
    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <circle cx="12" cy="12" r="8" stroke="white" stroke-width="2" fill="none"/>
    </svg>
  </button>
  <button class="button" onclick="location.href='{{ url('store') }}'">
    <div class="jp">店舗管理</div>
    <div class="en">Store Manager</div>
    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <rect x="4" y="10" width="16" height="4" stroke="white" stroke-width="2" fill="none"/>
    </svg>
  </button>
</div>

<footer>
  <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button class="logout">&lt; ログアウト</button>
  </form>
  <div class="footer-text">OCS-Festival POS-System</div>
</footer>
</body>
</html>
