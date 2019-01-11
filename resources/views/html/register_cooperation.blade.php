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
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/div.css">

    <title>register_cooperation</title>

  </head>

  <body>
    <div id="content" class="container-fluid">

      <div class="row top36 bottom36">
        <div class="col-sm-2"></div>

        <div class="col-sm-8 div01">
          <div class="row">
            <div class="col-sm-1 bg-light"></div>

            <!-- 入力部分-->
            <div class="col-sm-10 bg-light">
              <form action="" method="post">

                <div class="row top60">
                  <div class="col-sm-6">
                    会社名
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="name">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    会社名（フリガナ）
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="reading">
                  </div>
                </div>

                <div class="row top36">
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
                    <input type="text" name="tel_number">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    FAX
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="fax_number">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    代表者氏名
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="representative_name">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    代表者氏名（フリガナ）
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="rn_reading">
                  </div>
                </div>

                <div class="row top36">
                  <div class="col-sm-6">
                    業種
                  </div>
                  <div class="col-sm-6 text-right">
                    <select type="text" name="mtb_industry_tpye_id">
                      <option>業種選択</option>
                    </select>
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    事業内容
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="business">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    従業員数
                  </div>
                  <div class="col-sm-6 text-right">
                    <select type="text" name="mtb_staff_total_id">
                      <option>従業員数</option>
                    </select>
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    設立時間
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="date" style="width:173px" name="established_at">
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

            <div class="col-sm-1 bg-light"></div>
          </div>
        </div>

        <div class="col-sm-2"></div>
      </div>
    </div>
  </body>
</html>
