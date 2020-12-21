@extends('index')
@section('content')
<div class="form_frex">
  
<div class="mt-4 mb-3 container-fluid form_frex_l" id="form_img">
  <img src="{{ asset('/images/ごあいさつ代行サービス「AISATU」.png') }}" class="img-fluid">
</div>

<div class="mt-4 mb-4 form_frex_r">
    <div class="card-body mb-3">
  <p>ごあいさつ代行サービス「AISATU」に足を運んでいただき、ありがとうございます。</p>
  <p>コミュニケーション不足な人、人と関わるのが苦手な人に向けて</p>
  <p>人と関われる第１歩を当サービスが代行させていただきます。</p>
  <p>下記の入力に沿って送信してみてください。</p>
  </div>
  
  <div class="alert alert-light mb-3" role="alert">
  　入力フォーム
</div>
<form action="{{ route('confirm') }}" method="POST">
    @csrf
  <div class="form-group">
    <label for="name">挨拶したい人の名前は？</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="代行 太郎" value="{{ old('name',session('inquiry.name')) }}">
  </div>
  @error('name')
<p style="color:#ff0000;"><em>{{ $message }}</em></p>
  @enderror
  <div class="form-group">
    <label for="email">メールアドレスは？</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="例：〇〇＠〇〇.com" value="{{ old('email',session('inquiry.email')) }}">
  </div>
  @error('email')
<p style="color:#ff0000;"><em>{{ $message }}</em></p>
  @enderror
    <div class="form-group">
    <label for="relations">挨拶したい人との関係は？</label>
    <select class="form-control" id="relations" name="relations">
      <option>その人との関係</option>
      @foreach( config('relations') as $relation )
      <option value="{{ $relation }}" @if( old('relations',session('inquiry.relations')) === $relation ) selected @endif>{{ $relation }}</option>
      @endforeach
    </select>
  </div>
    @error('relations')
<p style="color:#ff0000;"><em>関係を選択してください。</em></p>
  @enderror
    <div class="form-group">
    <label for="contents">伝えたいあいさつは？</label>
    <select class="form-control" id="contents" name="contents">
      <option>挨拶の種類</option>
    @foreach( config('contents') as $content )
      <option value="{{ $content }}" @if( old('contents',session('inquiry.contents')) === $content ) selected @endif>{{ $content }}</option>
    @endforeach
    </select>
  </div>
    @error('contents')
<p style="color:#ff0000;"><em>あいさつを選んでください。</em></p>
  @enderror
  <div class="d-flex justify-content-around">
  <button type="submit" class="btn btn-primary">確認</button>
  </div>
</form>
</div>

</div>
@endsection