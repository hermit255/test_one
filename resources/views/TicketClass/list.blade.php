@extends('Layout.default')

@section('content')

<h1> チケット一覧 </h1>
@if (empty($body))
<p> 表示できるデータがありません </p>
@else
<table class="table">
  <tr>
    <th> <a href="/ticket_class/edit"> new </a>
    @foreach ($titles as $title)
    </th>
    <th class="text-center"><small> {{ $title }} </small></th>
  @endforeach
  </tr>
  @foreach ($body as $row)
  <tr>
    <td> <a href="/ticket_class/{{ $row->id }}/edit"> edit </a> </td>
    @foreach ($row as $column)
    <td>{{ $column }}</td>
    @endforeach
  </tr>
  @endforeach
</table>
{{ $paginator->links() }}
@endif

@endsection

@section('memo')

●「ギフトチケット一覧」画面を新規追加
●表示項目は下記
└・タイトル
　・チケット種別
　・レンタル（なし / フルレンタル / タオルレンタル / レンタル1点）
　・クーポン金額
　・枚数
　・チケット有効期限
　・表示期限
　・利用可能店舗
●「タイトル」がリンクになっており、押下すると「ギフトチケット編集」画面に遷移する

@endsection