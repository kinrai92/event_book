<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>
        <script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <style>
        #logo {
          width:150px;
        }

        font{
          display:block;margin:0 auto;width:500px;
          margin-top: 150px;
        }

        #row1{
          text-align: center;

        }

        #div_register{
          margin-top: 20px;
        }

        .cool{
          padding-top: 50px;
        }
        .socool{
          padding-top: 50px;
        }
        .top15{
          margin-bottom: 50px;
          margin-top: 20px;
        }
        .top1{
          border:3px solid silver;
        }
        .row{
          margin-top: 30px;
        }
        .top30{
          margin-top: 40px;
        }
        </style>

        <title>honngasuki</title>

      </head>

      <body>
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
                  <div id="row1" class="cool col-sm-6">
                    メールアドレス新規入力
                  </div>
                  <div class="socool col-sm-6">
                    <input type="text" name="mail" value="{{ old('mail') }}">
                  </div>
                </div>

                <div class="row">
                  <div id="row1" class="col-sm-6">
                    パスワード入力
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="password">
                  </div>
                </div>

                <div class="row">
                  <div id="row1" class="col-sm-6">
                    パスワード確認
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="password_confirmation">
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
        </div>
      </body>
    </html>
