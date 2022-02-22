

@extends('layout')
@section('title','商品詳細')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 detail">
      @if(session('flash_message'))
          <div class="text-danger">
            {{ session('flash_message') }}
          </div>
      @endif
        <h2>{{ $product->product_name }}</h2>

        <span>商品情報ID：{{ $product->id }}</span><br>
        <span>商品名：{{ $product->product_name }}</span><br>
        <span>メーカー：{{ optional($product->company)->company_name }}</span><br>
        <span>価格：{{ $product->price }}</span><br>
        <span>在庫数：{{ $product->stock }}</span><br>
        <p>コメント：{{ $product->comment }}</p><br>
        <span>
        <img src="{{ asset('uploads/'.$product->image) }}" width="100px"></span><br>
        <br>

        <a href="{{ route('showEdit', $product->id) }}">編集</a>
        <a href="{{ route('showList') }}">戻る</a>


    </div>
  </div>
</div>
@endsection
