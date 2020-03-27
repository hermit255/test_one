@extends('Layout.default')

@section('content')

<h1> チケット編集確認 </h1>
<form method="post" action="/ticket_class/save">
@csrf

<div class="w-50">
  <div class="row">
    <div class="col-3"> {{ $titles['id'] }} </div>
    <div class="col-9">
      {{ $params['id'] }}
      <input type="hidden" name="id" value="{{ $params['id'] }}" />
    </div>
  </div>
  <div class="row">
    <div class="col-3"> {{ $titles['seq'] }} </div>
    <div class="col-9">
      {{ $params['seq'] }}
      <input type="hidden" name="seq" value="{{ $params['seq'] }}" />
    </div>
  </div>
  <div class="row">
    <div class="col-3"> {{ $titles['name'] }} </div>
    <div class="col-9">
      {{ $params['name'] }}
      <input type="hidden" name="name" value="{{ $params['name'] }}" />
    </div>
  </div>
  <div class="row">
    <div class="col-3"> {{ $titles['ticket_type_id'] }} </div>
    <div class="col-9">
      {{ $params['ticket_type_id'] }}
      <input type="hidden" name="ticket_type_id" value="{{ $params['ticket_type_id'] }}" />
    </div>
  </div>
  <div class="row">
    <div class="col-3"> {{ $titles['rental_type_id'] }} </div>
    <div class="col-9">
      {{ $params['rental_type_id'] }}
      <input type="hidden" name="rental_type_id" value="{{ $params['rental_type_id'] }}" />
    </div>
  </div>
  <div class="row">
    <div class="col-3"> {{ $titles['original_price'] }} </div>
    <div class="col-9">
      {{ $params['original_price'] }}
      <input type="hidden" name="original_price" value="{{ $params['original_price'] }}" />
    </div>
  </div>
  <div class="row">
    <div class="col-3"> {{ $titles['discount_price'] }} </div>
    <div class="col-9">
      {{ $params['discount_price'] }}
      <input type="hidden" name="discount_price" value="{{ $params['discount_price'] }}" />
    </div>
  </div>
  <div class="row">
    <div class="col-3"> {{ $titles['number_per_package'] }} </div>
    <div class="col-9">
      {{ $params['number_per_package'] }}
      <input type="hidden" name="number_per_package" value="{{ $params['number_per_package'] }}" />
    </div>
  </div>
  <div class="row">
    <div class="col-3"> {{ $titles['available_from'] }} </div>
    <div class="col-9">
      {{ $params['available_from'] }}
      <input type="hidden" name="available_from" value="{{ $params['available_from'] }}" />
    </div>
  </div>
  <div class="row">
    <div class="col-3"> {{ $titles['available_to'] }} </div>
    <div class="col-9">
      {{ $params['available_to'] }}
      <input type="hidden" name="available_to" value="{{ $params['available_to'] }}" />
    </div>
  </div>
  <div class="row">
    <div class="col-3"> {{ $titles['on_sale_from'] }} </div>
    <div class="col-9">
      {{ $params['on_sale_from'] }}
      <input type="hidden" name="on_sale_from" value="{{ $params['on_sale_from'] }}" />
    </div>
  </div>
  <div class="row">
    <div class="col-3"> {{ $titles['on_sale_to'] }} </div>
    <div class="col-9">
      {{ $params['on_sale_to'] }}
      <input type="hidden" name="on_sale_to" value="{{ $params['on_sale_to'] }}" />
    </div>
  </div>
</div>

<button type="submit" class="btn btn-primary"> 更新実行 </button>
</form>

@endsection

@section('memo')

要件定義での言及なし

@endsection

@section('debug')

{{ var_dump($titles) }}
{{ var_dump($params) }}

@endsection