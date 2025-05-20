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
                                        <td>{{ $store->class_name }}</td>
                                        <td>{{ $store->store_name }}</td>
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
                            @foreach ($products as $product)
                                <li>
                                    <div class="productList__image">{{ $product->class_name }}</div>
                                    <div class="productList__name">{{ $product->product_name }}</div>
                                    <div class="productList__money">{{ $product->price }}円</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- 店舗登録フォーム --}}
                <div class="storeForm--index">
                    <div class="right__content--storeFormTtlArea">
                        <div class="right__content--storeFormTtlBg">
                            <img src="{{ asset('img/book.svg') }}" alt="bookImage">
                            <h2 class="right__content--ttl">店舗登録フォーム</h2>
                        </div>
                    </div>

                    <form action="{{ route('admin.store.create') }}" method="POST">
                        <div class="storeForm-group">    
                            @csrf
                            <div class="right__content--tableArea">                        
                                <div class="styleDiv">
                                    <table class="storeForm--input">
                                        <thead>
                                            <tr>
                                                <th>クラス</th>
                                                <th>店名</th>
                                                <th>種別</th>
                                                <th>教室</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select name="class_name">
                                                        @foreach ($classes as $class)
                                                            <option value="{{ $class }}">{{ $class }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input type="text" name="store_name" placeholder="自由入力"></td>
                                                <td>
                                                    <select name="type">
                                                        <option value="飲食">飲食</option>
                                                        <option value="アトラクション">アトラクション</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="classroom">
                                                        @foreach ($classrooms as $room)
                                                            <option value="{{ $room }}">{{ $room }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button class="storeFormAdd" type="submit">店舗登録</button>
                    </form>
                </div>

                {{-- 商品登録フォーム --}}
                <div class="productForm--index">
                    <div class="right__content--productFormTtlArea">
                        <div class="right__content--productFormTtlBg">
                            <img src="{{ asset('img/book.svg') }}" alt="bookImage">
                            <h2 class="right__content--ttl">商品登録フォーム</h2>
                        </div>
                    </div>

                    <form action="{{ route('admin.product.create') }}" method="POST" enctype="multipart/form-data">
                        <div class="storeForm-group">
                            @csrf
                            <div class="right__content--tableArea">                        
                                <div class="styleDiv">
                                    <table class="storeForm--input">
                                        <thead>
                                            <tr>
                                                <th>クラス</th>
                                                <th>商品名</th>
                                                <th>写真</th>
                                                <th>金額</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select name="class_name">
                                                        @foreach ($classes as $class)
                                                            <option value="{{ $class }}">{{ $class }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                <input type="text" name="product_name" placeholder="自由入力">
                                            </td>
                                            <td class="picture-box">
                                                <input
                                                    type="file"
                                                    class="pictureInput"
                                                    multiple
                                                    accept="image/*"
                                                    style="display:none" />
                                                    <button type="button" class="pictureSelectBtn">画像を選択</button>
                                            </td>
                                            <td>
                                                <input type="text" name="price" placeholder="円">
                                            </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="product_btn_box">
                                                    <div class="product_btn">
                                                        <a class="product_btn--styleBox" type="submit">追加</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button class="storeFormAdd" type="submit">商品登録</button>
                    </form>
                </div>   
            </div>
        </div>
    </main>

    <footer>
        <form action="{{ route('admin.index') }}" method="get">
            <button class="return" type="submit">＜ 管理者画面へ戻る</button>
        </form>
    </footer>

    <script src="{{ asset('javascript/storeAdmin.js') }}"></script>
</body>
</html>
