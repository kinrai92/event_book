@extends("layout.layout")

@section("content")
      <div>
        <font size="5" color="darkgrey">イベント情報の更新コーナー。</font>
      </div>
      <div class="row top36 bottom36">
        <div class="col-sm-1"></div>
        <div id="div_register" class="col-sm-10 cool be-light div_register_login">
          <div class="row">
            <div class="col-sm-1 bg-light"></div>

            <div id="error-messages">
            @if($errors->any())
              @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
              @endforeach
            @endif
            </div>

            <!-- 入力部分 -->
            <div class="col-sm-10 bg-light socool">
              <form action="{{ route('post_event_update') }}" method="post">
                @csrf
                <div class="row top100">
                  <div class="row" id="annai">
                    更新し方：古い値を削除して、新しい情報を入力してください。
                  </div>
                </div>

               <input type="hidden"  name="id" value="{{ $data->id }}">
               <input type="hidden"  name="cooperation_id" value="{{ $data->cooperation_id }}">

               <div class="row top100">
                 <div id="row1" class="col-sm-6">
                   開催状態
                 </div>
                 <div class="col-sm-6">
                   <select type="text" name="mtb_event_status_id">
                     @foreach($mtb_event_status as $mtb_event_statu)
                       <option value="{{ $mtb_event_statu->id }}">{{ $mtb_event_statu->value }}</option>
                     @endforeach
                   </select>
                 </div>
               </div>

               <div class="row top100">
                 <div id="row1" class="col-sm-6">
                   開催地域
                 </div>
                 <div class="col-sm-6">
                   <select type="text" name="mtb_municipality_id">
                     @foreach($mtb_municipality as $mtb_municipalite)
                       <option value="{{ $mtb_municipalite->id }}">{{ $mtb_municipalite->value }}</option>
                     @endforeach
                   </select>
                 </div>
               </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    主題
                  </div>
                  <div class="col-sm-6">
                    <input type="text"  name="title"  value="{{ $data['title'] }}">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    開催時間
                  </div>
                  <div class="col-sm-6">
                    <input type="date"  name="start_at" value="{{ date("Y-m-d", strtotime($data['start_at'])) }}">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    最大人数
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="maximum"  value="{{ old('maximum', $data->maximum) }}">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    最小人数
                  </div>
                  <div class="col-sm-6">
                    <input type="text"  name="minimum"  value="{{ $data['minimum'] }}">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    参加費
                  </div>
                  <div class="col-sm-6">
                    <input type="text"  name="cost" value="{{ $data['cost'] }}">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    内容の詳細
                  </div>
                  <div class="col-sm-6">
                    <input type="text"  name="detail" value="{{ $data['detail'] }}">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    写真1
                  </div>
                  <div class="col-sm-6">
                    <input type="file" name="picture1"  value="{{ $data['picture1'] }}">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    写真2
                  </div>
                  <div class="col-sm-6">
                    <input type="file"  name="picture2" value="{{ $data['picture2'] }}">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    写真3
                  </div>
                  <div class="col-sm-6">
                    <input type="file"  name="picture3" value="{{ $data['picture3'] }}">
                  </div>
                </div>
                <div class="padding2">
                  <input type="submit" value="更新">
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
@endsection
