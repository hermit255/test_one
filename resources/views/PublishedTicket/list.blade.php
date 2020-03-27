@extends('Layout.default')

@section('content')

<h1> ギフトチケット購入者一覧 </h1>
<a class="btn btn-primary" href="/published_ticket/download" role="button"> CSVダウンロード </a>
<table class="table">
  <tr>
    @foreach ($titles as $title)
    <th class="text-center"><small> {{ $title }} </small></th>
    @endforeach
  </tr>
  @foreach ($body as $row)
  <tr>
    @foreach ($row as $column)
    <td>{{ $column }}</td>
    @endforeach
  </tr>
  @endforeach
</table>
{{ $paginator->links() }}

@endsection

@section('memo')

●「ギフトチケット購入者/使用者リスト」画面を新規追加
●表示項目は下記
└・チェックボックス
　・購入日時(決済日)
　・有効期限（始）
　・有効期限（終）
　・チケット名
　・定価（単価）
　・売価（単価）
　・割引額（単価）
　・購入者名
　・使用者名
　・緊急連絡先
　・使用日時
　・使用実績店舗
　・ダウンロードステータス
　・ダウンロード日時
●絞込表示（検索）が可能。検索軸は、「購入日(決済日)」「チケット名」「店舗」のAND検索
●表示されている情報をCSVダウンロード可能
●ページャーあり

@endsection