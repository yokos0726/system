@extends('layout')
@section('title', '商品登録')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>商品情報登録画面</h2>
        @if(session('flash_message'))
            <div class="text-danger">
                {{ session('flash_message') }}
            </div>
        @endif
        <form method="POST" action="{{ route('exeStore') }}" enctype="multipart/form-data" onSubmit="return checkSubmit()">
           @CSRF

            <div class="form-group">
                <label for="product_name">
                    商品名
                </label>
                <input
                    id="product_name"
                    name="product_name"
                    class="form-control"
                    value="{{ old('product_name') }}"
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
                    <option selected value="0">選択してください</option>
                    <option value="1">株式会社 加納</option>
                    <option value="2">株式会社 渚</option>
                    <option value="3">株式会社 浜田</option>
                    <option value="4">有限会社 吉田</option>
                    <option value="5">有限会社 石田</option>
                    <option value="6">株式会社 西之園</option>
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
                >{{ old('price') }}</textarea>
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
                    value="{{ old('stock') }}"
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
                    
                >{{ old('comment') }}</textarea>
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
                    value="{{ old('image') }}"
                    type="file"
                >
                @if ($errors->has('image'))
                    <div class="text-danger">
                        {{ $errors->first('image') }}
                    </div>
                @endif
            </div>


            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('showList') }}">
                    戻る
                </a>
                <button type="submit" class="btn btn-primary">
                    登録する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('送信してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection