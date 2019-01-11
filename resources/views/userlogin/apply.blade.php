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
          margin-top: 250px;
        }

        #row1{
          text-align: center;
        }

        #div_register{
          margin-top: 20px;
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

            <div id="div_register" class="col-sm-6 bg-light div_register_login">
              <div class="row">
                <div id="row1" class="col-sm-6">
                  名前
                </div>
                <div class="col-sm-6">
                  <form>
                    <input type="text">
                  </form>
                </div>
              </div>

              <div class="row">
                <div id="row1" class="col-sm-6">
                  メールアドレス
                </div>
                <div class="col-sm-6">
                  <form>
                    <input type="text">
                  </form>
                </div>
              </div>

              <div class="row">
                <div id="row1" class="col-sm-6">
                  性別
                </div>
                <div class="col-sm-6">
                  <input type="radio" name="gender_flg" value="1"> 男性
                  <input type="radio" name="gender_flg" value="2"> 女性
                </div>
              </div>

              <div class="row">
                <div id="row1" class="col-sm-6">
                  パスワード確認
                </div>
                <div class="col-sm-6">
                  <form>
                    <input type="text">
                  </form>
                </div>
              </div>

              <div class="top30 text-center">
                <input type="submit" value="申し込み">
              </div>
              <div class="top15 text-center">
                <a href="index.html">キャンセル</a>
              </div>
            </div>

            <div class="col-sm-3"></div>
          </div>

          <!-- ここからフッター-->
          <div class="row top60">
            <div class="col-sm text-center">
              <p>Copyright@2018 Event</p>
            </div>
          </div>
        </div>
      </body>
    </html>
