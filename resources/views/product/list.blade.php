

@extends('layout')
@section('title','商品一覧')
@section('content')
<h6>＜検索条件を入力してください＞</h6>

<form>
  

  @if(session('flash_message'))
      <div class="text-danger">
          {{ session('flash_message') }}
      </div>
  @endif

  <div class="form-group">
    <label>商品名</label>
    <input id="search_text" type="text" class="form-control col-md-5" placeholder="検索したい商品名を入れてください" value=""  name="search_text">
  </div>

  <div class="form-group">
    <label>メーカー名</label>
    <select id="company" class="form-control col-md-5" name="company">
      <option selected value="">選択してください</option>
      <option value="1">株式会社 加納</option>
      <option value="2">株式会社 渚</option>
      <option value="3">株式会社 浜田</option>
      <option value="4">有限会社 吉田</option>
      <option value="5">有限会社 石田</option>
      <option value="6">株式会社 西之園</option>
    </select>
  </div>

  <div class="form-group">
    <label>価格</label>
    <input id="price_min" type="number" class="form-control col-md-5" placeholder="" name="price_min">以上
    <input id="price_max" type="number" class="form-control col-md-5" placeholder="" name="price_max">以下
  </div>

  <div class="form-group">
    <label>在庫数</label>
    <input id="stock_min" type="number" class="form-control col-md-5" placeholder="" name="stock_min">以上
    <input id="stock_max" type="number" class="form-control col-md-5" placeholder="" name="stock_max">以下
  </div>

  
  <button id="search_form" class="btn btn-primary col-md-5">検索</button>

</form>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h2>商品一覧</h2>

      @if (!empty($message))
        <p class="text-danger">{{ $message }}</p>
      @endif
    
        <table id="list" class="table table-striped">
          <tr>
            <th>@sortablelink('id','商品ID')</th>
            <th>@sortablelink('product_name','商品名')</th>
            <th>@sortablelink('price','値段')</th>
            <th>@sortablelink('stock','在庫数')</th>
            <th>メーカー名</th>
            <th>商品画像</th>
            <th></th>
            <th></th>
            

          </tr>
          
          @foreach($products as $product)
          <div id="return">
            <tr id="list_result">
              <td>{{ $product->id }}</td>
              <td>{{ $product->product_name }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->stock }}</td>
              <td>{{ optional($product->company)->company_name }}</td>
              <td><img src="{{ asset('uploads/'.$product->image) }}" width="50px"></td>
              <td><a href="/product/{{ $product->id }}">詳細表示</a></td>
              <form>
                <td><button class="delete_product" data-id="{{ $product->id }}" type="submit" class="btn btn-primary">削除</button></td>
              </form>
            </tr>
          </div>
          @endforeach 
        </table>
      
    </div>
   
  </div>
</div>  <!-- /.container -->
<!-- <script>
  function checkSubmit(){
  if(window.confirm('削除してよろしいですか？')){
      return true;
  } else {
      return false;
  }
  }
</script> -->
@endsection