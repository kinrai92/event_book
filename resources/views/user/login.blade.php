@extends("layout.layout")

@section("content")
      <div class="row top36 bottom36">
        <div class="col-sm-2"></div>

        <div class="col-sm-8 div01">
          <div class="row">
            <div class="col-sm-2 bg-light"></div>

            <!-- 入力部分-->
            <div class="col-sm-8 bg-light">
              <div>
                @if($errors->any())
                    <ul id="ul_errors_message" style="padding-top:20px">
                    @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                    @endforeach
                   </ul>
                @endif
              </div>
              <form action="{{ route('post_user_login') }}" method="post">
                @csrf
                <div class="row top60">
                  <div class="col-sm-6">
                    メールアドレス
                  </div>
                  <div class="col-sm-6">
                    <input id="width" type="text" name="mail" value="{{ old('mail') }}" style="width:180px">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    パスワード
                  </div>
                  <div class="col-sm-6">
                    <input id="width" type="password" name="password" value="{{ old('password') }}" style="width:180px">
                  </div>
                </div>
                <div class="row top36 bottom36">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4 text-center">
                    <input type="submit" class="" value="送信">
                  </div>
                  <div class="col-sm-4"></div>
                </div>
              </form>
            </div>

            <div class="col-sm-2 bg-light"></div>
          </div>
        </div>

        <div class="col-sm-2"></div>
      </div>

@endsection
