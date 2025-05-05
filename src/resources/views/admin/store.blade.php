<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/storeAdmin.css') }}">
    <title>管理者画面</title>
</head>
<body>
    <header>
        <h1 class="page--title">店舗管理</h1>
    </header>
    <div class="button__space">
        <button class="product" id="product_btn">商品リスト</button>
        <button class="storeAdd" id="storeAdd_btn">店舗追加</button>
        <button class="productAdd" id="productAdd_btn">商品追加</button>
    </div>
    <main>
        <div class="main__inner">       
            <div class="left__content">
                <div class="left__content--ttlArea">
                    <div class="left__content--ttlBg">
                        <img src="{{ asset('img/book.svg') }}" alt="bookImage">
                        <h2 class="left__content--ttl">店舗リスト</h2>
                    </div>
                </div>
                <div class="left__content--tableArea">
                    <div class="styleDiv">
                        <table class="left__content--table">
                            <thead>
                                <tr>
                                    <th>クラス</th>
                                    <th>店名</th>
                                    <th>種別</th>
                                    <th>教室</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stores as $store)
                                    <tr>
                                        <td>{{ $store->class }}</td>
                                        <td>{{ $store->name }}</td>
                                        <td>{{ $store->type }}</td>
                                        <td>{{ $store->classroom }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>          
            </div>

            <div class="right__content">
                {{-- 商品リスト --}}
                <div class="productList--index">
                    <div class="right__content--ttlArea">
                        <div class="right__content--ttlBg">
                            <img src="{{ asset('img/bookProduct.svg') }}" alt="bookProduct">
                            <h2 class="right__content--ttl">商品リスト</h2>
                        </div>
                    </div>
                    <div class="right__content--tableArea">
                        <ul class="productList">
                            {{-- ここに商品ループが入る --}}
                        </ul>
                    </div>
                </div>

                {{-- 店舗追加フォーム --}}
                <div class="storeForm--index">
                    {{-- ここにフォーム追加 --}}
                </div>

                {{-- 商品追加フォーム --}}
                <div class="productForm--index">
                    {{-- ここにフォーム追加 --}}
                </div>
            </div>
        </div>
    </main>
    <footer>
        <form action="{{ route('admin.index') }}" method="get">
            <button class="return" type="submit">＜ 管理者画面へ戻る</button>
        </form>
    </footer>
</body>
</html>
