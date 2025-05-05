<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>履歴画面</title>
    <link rel="stylesheet" href="{{ asset('css/sales.css') }}">
</head>
<body>
<header>
    <h2>WestVillage</h2>
    <h4>{{ now()->format('n月j日G時i分') }}</h4>
</header>
<main>
    <div class="update-button">
        <form method="get" action="{{ route('user.sales') }}">
            <button class="update" type="submit">更新</button>
        </form>
    </div>
    <div class="main__inner">
        <div class="main__inner--table">
            <table>
                <thead>
                    <tr>
                        <th>商品名</th>
                        <th>商品コード</th>
                        <th>単価</th>
                        <th>点数</th>
                        <th>クーポン値引き</th>
                        <th>合計金額</th>
                        <th>取引日時</th>
                    </tr>                
                </thead>
                <tbody>
                    @isset($error)
                        <tr><td colspan="7">{{ $error }}</td></tr>
                    @else
                        @forelse ($results as $row)
                            @php
                                $price = $row->price ?? 0;
                                $count = $row->count ?? 0;
                                $coupon = $row->coupon_price ?? 0;
                                $total = ($price * $count) - $coupon;
                            @endphp
                            <tr>
                                <td>{{ $row->product_name }}</td>
                                <td>{{ $row->product_code }}</td>
                                <td>{{ number_format($price) }}円</td>
                                <td>{{ $count }}</td>
                                <td>{{ $coupon ? number_format($coupon) . '円' : '0円' }}</td>
                                <td>{{ number_format($total) }}円</td>
                                <td>{{ $row->trade_datetime }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="7">データがありません。</td></tr>
                        @endforelse
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
    <div class="sum-button">
        <button class="sum" type="button">売上金額：{{ number_format($totalSum ?? 0) }} 円</button>
    </div>
</main>
<footer>
    <form action="{{ route('user.resister') }}" method="get">
        <button class="return" type="submit">＜ 会計に戻る</button>
    </form>
</footer>
</body>
</html>
