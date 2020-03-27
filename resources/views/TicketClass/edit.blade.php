@extends('Layout.default')

@php
$ticket_types = [
  [
    'id' => '1',
    'name' => '標準',
  ],
  [
    'id' => '2',
    'name' => 'イベント',
  ],
  [
    'id' => '3',
    'name' => '緊急',
  ],
];
$ticket_types = json_decode(json_encode($ticket_types), false);

$rental_types = [
  [
    'id' => '1',
    'name' => 'なし',
  ],
  [
    'id' => '2',
    'name' => 'レンタル1点',
  ],
  [
    'id' => '3',
    'name' => 'フルレンタル',
  ],
];
$rental_types = json_decode(json_encode($rental_types), false);

@endphp

@section('content')

<h1> チケット編集 </h1>
<form method="post" action="/ticket_class/edit/confirm" class="col-3">
@csrf

@if (empty($body->id))
<div class="form-group d-none">
@else
<div class="form-group">
@endif
  <label for="id">{{ $titles['id'] }}</label>
  <input type="hidden" class="form-control" id="id" name="id" value="{{ $body->id }}">
  {{ $body->id }}
</div>

<div class="form-group">
  <label for="seq">{{ $titles['seq'] }}</label>
  <input type="number" class="form-control" id="seq" name="seq" value="{{ $body->seq }}">
</div>
<div class="form-group">
  <label for="name">{{ $titles['name'] }}</label>
  <input type="text" class="form-control" id="name" name="name" value="{{ $body->name }}">
</div>
<div class="form-group">
  <label for="ticket_type_id">{{ $titles['ticket_type_id'] }}</label>
  <select name="ticket_type_id" value="{{ $body->ticket_type_id }}" class="custom-select">
  @foreach ( $ticket_types as $ticket_type )
  @if ( $ticket_type->id == $body->ticket_type_id )
  <option value="{{ $ticket_type->id }}" selected>
  @else
  <option value="{{ $ticket_type->id }}">
  @endif
    {{ $ticket_type->name }}
  </option>
  @endforeach
  </select>
</div>
<div class="form-group">
  <label for="rental_type_id">{{ $titles['rental_type_id'] }}</label>
  <select name="rental_type_id" value="{{ $body->rental_type_id }}" class="custom-select">
  @foreach ( $rental_types as $rental_type )

  @if ( $rental_type->id == $body->rental_type_id )
  <option value="{{ $rental_type->id }}" selected>
  @else
  <option value="{{ $rental_type->id }}">
  @endif
    {{ $rental_type->name }}
  </option>
  @endforeach
  </select>
</div>
<div class="form-group">
  <label for="original_price">{{ $titles['original_price'] }}</label>
  <input type="text" class="form-control" id="original_price" name="original_price" value="{{ $body->original_price }}">
</div>
<div class="form-group">
  <label for="discount_price">{{ $titles['discount_price'] }}</label>
  <input type="text" class="form-control" id="discount_price" name="discount_price" value="{{ $body->discount_price }}">
</div>
<div class="form-group">
  <label for="number_per_package">{{ $titles['number_per_package'] }}</label>
  <input type="number" class="form-control" id="number_per_package" name="number_per_package" value="{{ $body->number_per_package }}">
</div>
<div class="form-group">
  <label for="available_from">{{ $titles['available_from'] }}</label>
  <input type="datetime-local" class="form-control" id="available_from" name="available_from" value="{{ date('Y-m-d\TH:i', strtotime($body->available_from)) }}">
</div>
<div class="form-group">
  <label for="available_to">{{ $titles['available_to'] }}</label>
  <input type="datetime-local" class="form-control" id="available_to" name="available_to" value="{{ date('Y-m-d\TH:i', strtotime($body->available_to)) }}">
</div>
<div class="form-group">
  <label for="on_sale_from">{{ $titles['on_sale_from'] }}</label>
  <input type="datetime-local" class="form-control" id="on_sale_from" name="on_sale_from" value="{{ date('Y-m-d\TH:i', strtotime($body->on_sale_from)) }}">
</div>
<div class="form-group">
  <label for="on_sale_to">{{ $titles['on_sale_to'] }}</label>
  <input type="datetime-local" class="form-control" id="on_sale_to" name="on_sale_to" value="{{ date('Y-m-d\TH:i', strtotime($body->on_sale_to)) }}">
</div>
<button type="submit" class="btn btn-primary"> 確認 </button>
</form>

@endsection

@section('memo')

要件定義での言及なし

@endsection

@section('debug')

要件定義での言及なし
<!-
{{ var_dump($titles) }}
{{ var_dump($body) }}
-->
@endsection