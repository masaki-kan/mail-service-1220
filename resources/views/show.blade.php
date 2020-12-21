@extends('index')
@section('content')

<div class="mt-4 mb-3 container-fluid" id="form_img">
  <img src="{{ asset('/images/Sending_confirmation.png') }}" class="img-fluid">
</div>

<div class="card mt-3 mb-3 container-fluid" style="">
  <div class="card-body">
  <p>送信内容の確認です。</p>
  <p>以下の内容で送信します。</p>
  <p>変更がなければ、そのまま送信ボタンを押してください。</p>
  </div>
</div>

 <div class="form-group">
  
<form action="{{ route('inquiry') }}" method="POST">
  @csrf
<table class="table">
     <tr>
       <th scope="col">送り主</th>    
       <td>{{ config('mail.from.name') }}</td>
     </tr>
    <tr>
      <th scope="col">宛先</th>
      <td>{{ session('inquiry.name') }}</td>
    </tr>
    <tr>
      <th scope="col">アドレス</th>
      <td>{{ session('inquiry.email') }}</td>
    </tr>
    <tr>
      <th scope="col">伝えたいこと</th>
      <td>{!! nl2br($message) !!}</td>
    </tr>
</table>
  <div class="d-flex justify-content-around">
<button type="submit" class="btn btn-primary">送信</button>
  </div>
</form>
  <div class="d-flex justify-content-around mt-4">
<button class="btn btn-primary"><a href="{{ route('top')}}">戻る</a></button>
</div>
</div>
@endsection