

@extends('layout')
@section('title','商品一覧')
@section('content')
    <div class="row">
  <div class="col-md-8 col-md-offset-2">
      <h2>商品一覧</h2>

      @if (session('err_msg'))
      <p class="text-danger">{{session('err_msg')}}</p>
      @endif

      <table class="table table-striped">
          <tr>
              <th>商品ID</th>
              <th>商品会社ID</th>
              <th>商品名</th>
              <th>値段</th>
              <th>在庫数</th>

          </tr>
          @foreach($products as $product)
          <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->company_id }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
          </tr>
          @endforeach
      </table>
  </div>
</div>
@endsection
