@extends('layout.layout')

@section('title','UserCreate')

@section('content')
        <div class="container-fluid" >
          <!-- へーダー -->
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

              <form action="{{ route('post_user_create') }}" method="post">
                @csrf
                <div class="row">
                  <div id="row1" class="cool col-sm-6 top10">
                    メールアドレス新規入力
                  </div>
                  <div class="socool col-sm-6">
                    <input type="text" name="mail" value="{{ old('mail') }}">
                  </div>
                </div>

                <div class="row">
                  <div id="row1" class="col-sm-6 top10">
                    パスワード入力
                  </div>
                  <div class="col-sm-6 top10">
                    <input type="password" name="password">
                  </div>
                </div>

                <div class="row">
                  <div id="row1" class="col-sm-6 top10">
                    パスワード確認
                  </div>
                  <div class="col-sm-6 top10">
                    <input type="password" name="password_confirmation">
                  </div>
                </div>

                <div class="top30 text-center top10">
                  <input type="submit" value="送信">
                </div>
                <div class="top15 text-center top10">
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
