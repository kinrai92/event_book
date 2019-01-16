@extends("layout.layout")


@section("content")
          <!-- へーダー -->
          <font size="5" color="darkgrey">好きなイベントを一緒に参加しましょう。</font>

          <!-- ログインウィンドウ -->
          <div class="row top60">
            <div class="col-sm-3"></div>

            <div id="div_register" class="col-sm-12 bg-light div_register_login">
              <div class="row top">
                <div class="col-sm-12" style="padding-left:200px">
                  <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(500)->generate('{{$qrcode}')) !!} ">
                </div>
              </div>
              <div class="row1 col-sm-12">
                <a href="index.html">戻る</a>
              </div>
            </div>

            <div class="col-sm-3"></div>
          </div>

          <!-- ここからフッター-->
          <div class="row">
            <div class="col-sm text-center">
              <p>Copyright@2019 Event</p>
            </div>
          </div>
@endsection
