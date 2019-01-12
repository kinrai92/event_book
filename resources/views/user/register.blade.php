@extends("layout.layout")

@section("content")
      <div class="row top36 bottom36">
        <div class="col-sm-2"></div>

        <div class="col-sm-8 div01">
          <div class="row">
            <div class="col-sm-2 bg-light"></div>

          <div id="error-messages">
            @if($errors->any())
              @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
              @endforeach
            @endif
          </div>

            <!-- 入力部分-->
            <div class="col-sm-8 bg-light">
              <form action="{{ route('post_user_register') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user_id }}">
                <input type="hidden" name="user_token" value="{{ $token }}">

                <div class="row top60">
                  <div class="col-sm-6">
                    姓
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="lastname" value="{{ old('lastname') }}">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    姓（フリガナ）
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="lastname_reading" value="{{ old('lastname_reading') }}">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    名
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="firstname" value="{{ old('firstname') }}">
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    名（フリガナ）
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="firstname_reading" value="{{ old('firstname_reading') }}">
                  </div>
                </div>

                <div class="row top36">
                  <div class="col-sm-6">
                    性別
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="radio" name="gender_flg" value="1"
                      @if(old("gender_flg") && old("gender_flg") == 1)
                        checked
                      @endif
                    > 男性
                    <input type="radio" name="gender_flg" value="2"
                      @if(old("gender_flg") && old("gender_flg") == 2)
                        checked
                      @endif
                    > 女性
                  </div>
                </div>

                <div class="row top6">
                  <div class="col-sm-6">
                    生年月日
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="date" style="width:173px" name="birthday" value="{{ old('birthday') }}">
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
                        @foreach($mtb_areas as $mtb_area)
                          <option value="{{ $mtb_area->id }}"
                            @if(old("mtb_area_id") && old("mtb_area_id") == $mtb_area->id)
                              selected
                            @endif
                          >{{ $mtb_area->value }}</option>
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
                    <input type="text" name="phone_no" value="{{ old('phone_no') }}">
                  </div>
                </div>

                <div class="row top36">
                  <div class="col-sm-6">
                    ニックネーム
                  </div>
                  <div class="col-sm-6 text-right">
                    <input type="text" name="nickname" value="{{ old('nickname') }}">
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
