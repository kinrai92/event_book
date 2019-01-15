@extends('layout.layout')

@section('title', 'UserLogin')

@section('content')

<font size="5" color="darkgrey">好きなイベントを一緒に参加しましょう。</font>

<!-- ログインウィンドウ -->
<div class="row top60">
  <div class="col-sm-3"></div>

  <div id="div_register" class="col-sm-6 top1 bg-light div_register_login">

    <div>
    　@if ($errors->any())
      　<div class="alert alert-danger">
          　<ul>
          　    @foreach ($errors->all() as $error)
              　    <li>{{ $error }}</li>
            　  @endforeach
        　  </ul>
      　</div>
  　  @endif

    </div>

    <form action="{{ route('post_user_login') }}" method="post">
      @csrf
      <div class="row">
        <div id="row1" class="cool col-sm-6">
          メールアドレス
        </div>
        <div class="socool col-sm-6">
          <input type="text" name="mail" value="{{ old('mail') }}">
        </div>
      </div>

      <div class="row">
        <div id="row1" class="col-sm-6">
          パスワード
        </div>
        <div class="col-sm-6">
          <input type="password" name="password">
        </div>
      </div>

      <div class="top30 text-center">
        <input type="submit" value="送信">
      </div>
      <div class="top15 text-center">
        <a href="index.html">戻る</a>
      </div>
    </form>
  </div>

  <div class="col-sm-3"></div>
</div>


<!-- ここからフッター-->
<div class="row top60">
  <div class="col-sm text-center">
    <p>Copyright@Event 2019</p>
  </div>
</div>

@endsection
