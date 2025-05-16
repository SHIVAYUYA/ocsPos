<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <meta name="csrf-token" content="{{ csrf_token() }}">  -->
  <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/resister.css') }}">
  <title>会計画面</title>
</head>
<body>
<header>
    <div class="menu-toggle" onclick="toggleMenu()">☰</div>
    @if ($store)
        <div>{{ $store->store_name }}（{{ $store->class_name }}）</div>
    @else
        <div>店舗情報なし</div>
    @endif
    <div>{{ now()->format('m月d日 H:i') }}</div>
</header>

<div class="side-menu" id="sideMenu">
  <div class="close-menu" onclick="toggleMenu()">✕</div>
  <a href="#" onclick="openDiscountModal()">割引き</a>
  <a href="{{ route('user.sales') }}">会計履歴</a>
  <div id="historyLog"></div>
  <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button class="logout">&lt; ログアウト</button>
  </form>
</div>

<div class="container">
  <div class="left-panel">
    <button class="discount-button" onclick="openDiscountModal()">割引き</button>
    <div class="product-grid" id="productGrid"></div>
  </div>

  <div class="right-panel">
    <div id="cart"></div>
    <div class="totals">
      <span>点数：<span id="item-count">0</span></span>
      <span>小計：¥<span id="subtotal">0</span></span>
    </div>
    <button class="checkout-button" onclick="checkout()">会計</button>
  </div>
</div>

{{-- 割引モーダル --}}
<div class="overlay" id="overlay" style="display: none;"></div>
<div class="modal" id="discountModal" style="display: none;">
  <div class="modal-left" id="discountProductList"></div>
  <div class="modal-right">
    <div id="selectedProductInfo"></div>
    <div class="discount-summary" id="discountSummary"></div>
    <label>割引金額（円）：<input type="number" id="discountAmount" min="0" style="width: 80px;" oninput="updateDiscountSummary()"></label>
    <br><br>
    <button class="apply-button" onclick="applyDiscount()">変更確定</button>
  </div>
</div>

<footer>ページ数、例（1/2）</footer>

<script>
  const products = @json($products);
</script>
<script src="{{ asset('javascript/resister.js') }}"></script>
</body>
</html>
