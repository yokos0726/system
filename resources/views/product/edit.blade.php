@extends('layout')
@section('title', '商品編集')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>商品情報編集画面</h2>

        @if(session('flash_message'))
            <div class="text-danger">
                {{ session('flash_message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('exeUpdate') }}" enctype="multipart/form-data" onSubmit="return checkSubmit()">
           @CSRF
            <input type="hidden" name="id" value="{{ $product->id }}">
            <div class="form-group">
                <label for="product_name">
                    商品名
                </label>
                <input
                    id="product_name"
                    name="product_name"
                    class="form-control"
                    value="{{ $product->product_name }}"
                    type="text"
                >
                @if ($errors->has('product_name'))
                    <div class="text-danger">
                        {{ $errors->first('product_name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>メーカー名</label>
                <select class="form-control col-md-5" name="company">
                    <option value="0">選択して下さい</option>
                    <option value="1" @if ($product->company_id == 1 ) selected @endif>株式会社 加納</option>
                    <option value="2" @if ($product->company_id == 2 ) selected @endif>株式会社 渚</option>
                    <option value="3" @if ($product->company_id == 3 ) selected @endif>株式会社 浜田</option>
                    <option value="4" @if ($product->company_id == 4 ) selected @endif>有限会社 吉田</option>
                    <option value="5" @if ($product->company_id == 5 ) selected @endif>有限会社 石田</option>
                    <option value="6" @if ($product->company_id == 6 ) selected @endif>株式会社 西之園</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="price">
                    価格
                </label>
                <textarea
                    id="price"
                    name="price"
                    class="form-control"
                    rows="4"
                >{{ $product->price }}</textarea>
                @if ($errors->has('price'))
                    <div class="text-danger">
                        {{ $errors->first('price') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="stock">
                    在庫数
                </label>
                <input
                    id="stock"
                    name="stock"
                    class="form-control"
                    value="{{ $product->stock }}"
                    type="text"
                >
                @if ($errors->has('stock'))
                    <div class="text-danger">
                        {{ $errors->first('stock') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="comment">
                    コメント
                </label>
                <textarea
                    id="comment"
                    name="comment"
                    class="form-control"
                    
                >{{ $product->comment }}</textarea>
                @if ($errors->has('comment'))
                    <div class="text-danger">
                        {{ $errors->first('comment') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="image">
                    商品画像
                </label>
                <input
                    id="image"
                    name="image"
                    class="form-control"
                    value="{{ $product->image }}"
                    type="file"
                >
                @if ($errors->has('image'))
                    <div class="text-danger">
                        {{ $errors->first('image') }}
                    </div>
                @endif
            </div>


            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('showDetail', $product->id) }}">
                    戻る
                </a>
                <button type="submit" class="btn btn-primary">
                    更新する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('更新してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection