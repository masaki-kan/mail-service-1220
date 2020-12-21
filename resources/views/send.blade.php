@extends('index')
@section('content')

<div class="mt-4 mb-3 container-fluid" id="form_img">
  <img src="{{ asset('/images/Send_completely.png') }}" class="img-fluid">
</div>

<div class="alert alert-primary mt-3 mb-3" role="alert">
  <p>送信完了しました。</p>
</div>
<a href="{{ route('top') }}">他の方にも送りますか？</a>
@endsection