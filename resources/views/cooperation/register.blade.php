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
              <div>
                  @if($errors->any())
                    <ul id="ul_errors_message">
                    @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                    @endforeach
                   </ul>
                @endif
              </div>
              <form action="{{route('post_cooperation_register')}}" method="post">
                @csrf
                <div class="row top60">
                  <div class="col-sm-6">
                    メールアドレス
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="mail" value="{{ old('mail') }}">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    パスワード
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="password" name="password">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    パスワードの確認
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="password" name="password_confirmation">
                  </div>
                </div>

                <div class="row top60">
                  <div class="col-sm-6">
                    会社名
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="name" value="{{ old('name') }}">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    会社名（フリガナ）
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="reading" value="{{ old('reading') }}">
                  </div>
                </div>

                <div class="row top36">
                  <div class="col-sm-6">
                    住所
                  </div>
                  <div class="col-sm-6" style="padding-left:55px">
                    <div>
                      <select type="text" name="mtb_area_id">
                        <option>都道府県</option>
                        @foreach($areas as $area)
                        <option value="{{$area->id}}"
                          @if(old('mtb_area_id') && old('mtb_area_id')==$area->id)
                            selected
                          @endif>{{$area->value}}
                        @endforeach
                      </select>
                    </div>
                    <div class="top6">
                      <input type="text" name="address" value="{{ old('address') }}">
                    </div>
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    電話番号
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="tel_number" value="{{ old('tel_number') }}">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    FAX
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="fax_number" value="{{ old('faxnumber') }}">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    代表者氏名
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="representative_name" value="{{ old('representative_name') }}">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    代表者氏名（フリガナ）
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="rn_reading" value="{{ old('rn_reading') }}">
                  </div>
                </div>

                <div class="row top36">
                  <div class="col-sm-6">
                    業種
                  </div>
                  <div class="col-sm-6" style="padding-left:55px">
                    <select type="text" name="mtb_industry_type_id" style="width:100px;">
                      <option>業種選択</option>
                      @foreach($industry_types as $industry_type)
                      <option value="{{$industry_type->id}}"
                        @if(old('mtb_industry_type_id') && old('mtb_industry_type_id')==$industry_type->id)
                          selected
                        @endif>{{$industry_type->value}}
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    事業内容
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="business" value="{{ old('business') }}">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    従業員数
                  </div>
                  <div class="col-sm-6" style="padding-left:55px">
                    <select type="text" name="mtb_staff_total_id">
                      <option>従業員数</option>
                      @foreach($staff_totals as $staff_total)
                      <option value="{{$staff_total->id}}"
                        @if(old('mtb_staff_total_id') && old('mtb_staff_total_id')==$staff_total->id)
                          selected
                        @endif>{{$staff_total->value}}
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    設立年
                  </div>
                  <div class="col-sm-6" style="padding-left:55px">
                    <input type="date" style="width:178px" name="established_at" value="{{ old('established_at') }}">
                  </div>
                </div>

                <div class="row top36 bottom36">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4 text-center">
                    <input type="submit" value="送信">
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
