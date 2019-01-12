<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <!-- 自分のcss -->
    <link rel="stylesheet" href="{{asset('/css/layout.css')}}">
    <link rel="stylesheet" href="{{asset('/css/div.css')}}">

    <title>register_user</title>

  </head>

  <body>
    <div id="content" class="container-fluid">

      <div class="row top36 bottom36">
        <div class="col-sm-2"></div>

        <div class="col-sm-8 div01">
          <div class="row">
            <div class="col-sm-2 bg-light"></div>

            <!-- 入力部分-->
            <div class="col-sm-8 bg-light">
              <form action="{{ route('post_user_create') }}" method="post">

                <div class="row top60">
                  <div class="col-sm-6">
                    姓
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="lastname">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    姓（フリガナ）
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="lastname_reading">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    名
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="firstname">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    名（フリガナ）
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="firstname_reading">
                  </div>
                </div>

                <div class="row top36">
                  <div class="col-sm-6">
                    性別
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="radio" name="gender_flg" value="1"> 男性
                    <input type="radio" name="gender_flg" value="2"> 女性
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    生年月日
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="date" style="width:173px" name="birthday">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    住所
                  </div>
                  <div class="col-sm-6 text-right">
                    <div>
                      <select type="text" name="mtb_area_id">
                        <option>都道府県</option>
                      </select>
                    </div>
                    <div class="top6">
                      <input type="text" name="adress">
                    </div>
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    電話番号
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="phone_no">
                  </div>
                </div>

                <div class="row top36">
                  <div class="col-sm-6">
                    ニックネーム
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="nickname">
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
    </div>
  </body>
</html>
