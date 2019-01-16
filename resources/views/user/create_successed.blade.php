@extends("layout.layout")
@section('title','RegisterSuccessed')
@section('content')
<!-- へーダー -->
<font size="5" color="darkgrey">好きなイベントを一緒に参加しましょう。</font>

<!-- ログインウィンドウ -->
<div class="row top60">
  <div class="col-sm-3"></div>
  <div class="card-header col-sm-12 top5">仮会員登録完了</div>
  <div id="div_register" class="col-sm-12 bg-light div_register_login">

    <div class="row ">

      <div class="col-sm-12">
        <p>この度は、ご登録いただき、誠にありがとうございます。</p>
        <p>
          ご本人様確認のため、ご登録いただいたメールアドレスに、<br>
          本登録のご案内のメールが届きます。
        </p>
        <p>
          そちらに記載されているURLにアクセスし、<br>
          アカウントの本登録を完了させてください。
        </p>
      </div>
    </div>
    <div class="row1">
      <a href="index.html">戻る</a>
    </div>
  </div>

  <div class="col-sm-3"></div>

<!-- ここからフッター-->
<div class="row top60">
  <div class="col-sm text-center">
    <p>Copyright@2019 Event</p>
  </div>
</div>
@endsection  
