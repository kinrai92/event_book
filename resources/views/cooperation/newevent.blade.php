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
      display:block;margin:0 auto;width:700px;
      margin-top: 40px;
      text-align: center;
      font-size: 3em;
    }

    #row1{
      text-align: center;
    }



    #content {
      display: block;
      margin: 0 auto;
      width: 900px;
    }
    .cool{
      border:3px solid silver;
    }

    .socool{
      padding-top: 50px;
      padding-bottom: 30px;
      font-size: 1.3em;
    }
    .padding1{
      padding-top: 20px;
    }
    .padding2{
      padding-top: 20px;
      text-align: center;
    }

    .top100{
      padding-top: 20px;
    }
    </style>

    <title>newevent</title>
  </head>

  <body>
    <div id="content" class="container-fluid">
      <div>
        <font size="5" color="darkgrey">イベントを開催しましょう。</font>
      </div>
      <div class="row top36 bottom36">
        <div class="col-sm-1"></div>

        <div id="div_register" class="col-sm-10 cool be-light div_register_login">
          <div class="row">
            <div class="col-sm-1 bg-light"></div>
            <!-- 入力部分 -->
            <div class="col-sm-10 bg-light socool">
              <form action="" method="post">
                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    法人
                  </div>
                  <div class="col-sm-6">
                    <input type="text">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    開催地域
                  </div>
                  <div class="col-sm-6">
                    <input type="text">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    主題
                  </div>
                  <div class="col-sm-6">
                    <input type="text">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    開催時間
                  </div>
                  <div class="col-sm-6">
                    <input type="date">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    最大人数
                  </div>
                  <div class="col-sm-6">
                    <input type="text">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    最小人数
                  </div>
                  <div class="col-sm-6">
                    <input type="text">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    参加費
                  </div>
                  <div class="col-sm-6">
                    <input type="text">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    内容の詳細
                  </div>
                  <div class="col-sm-6">
                    <input type="text">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    写真1
                  </div>
                  <div class="col-sm-6">
                    <input type="file">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    写真2
                  </div>
                  <div class="col-sm-6">
                    <input type="file">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    写真3
                  </div>
                  <div class="col-sm-6">
                    <input type="file">
                  </div>
                </div>
                <div class="padding2">
                  <input type="submit" value="申し込み">
                </div>
                <div class="top15 text-center padding1">
                  <a href="index.html">キャンセル</a>
                </div>
              </form>
            </div>

            <div class="col-sm-1 bg-light"></div>
          </div>
        </div>
        </div>
        <div class="col-sm-1"></div>
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
