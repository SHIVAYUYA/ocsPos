<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>各店舗売上画面</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/proceeds.css') }}">
</head>
<body>

<header>
  <h2>各店舗売上画面</h2>
  <h4>{{ now()->format('n月j日G時i分') }}</h4>
</header>

<div class="update-button">
  <form method="get" action="{{ route('proceeds.index') }}">
    <button class="update" type="submit">更新</button>
  </form>
</div>

<table>
  <thead>
      <tr color="blue">
          <th>クラス</th>
          <th>店名</th>
          <th>合計件数</th>
          <th>各店舗売上合計</th>
      </tr>                
  </thead>
  <tbody>
    @if ($results->isEmpty())
        <tr><td colspan="4">売上データがありません。</td></tr>
    @else
        @foreach ($results as $index => $row)
            <tr color="{{ $index % 2 == 0 ? 'gray' : 'orange' }}">
                <th>{{ $row->class_name }}</th>
                <th>{{ $row->store_name }}</th>
                <th>{{ $row->total_count }}</th>
                <th>{{ number_format($row->total_sales) }}</th>
            </tr>
        @endforeach
    @endif
  </tbody>
</table>

<footer>
  <form action="{{ route('admin.index') }}" method="get">
    <button class="return" type="submit">＜ 管理者画面へ戻る</button>
  </form>
</footer>

</body>
</html>
