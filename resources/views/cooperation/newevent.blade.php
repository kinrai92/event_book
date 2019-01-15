@extends("layout.layout")

@section("content")
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
              <div>
                @if($errors->any())
                  @foreach($errors->all() as $error)
                    <p>{{ $error }}</p >
                  @endforeach
                @endif
              </div>
              <form action="{{ route('post_event_create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="cooperation_id" value="{{ $cooperation->id }}">
                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    開催地域
                  </div>
                  <div class="col-sm-6">
                    <select type="text" name="mtb_municipality_id">
                      <option>開催地域を選択してください。</option>
                      @foreach($mtbmuncipality as $mtbmuncipalite)
                        <option value="{{ $mtbmuncipalite->id }}"
                          @if(old("mtb_municipality_id") && old("mtb_municipality_id") == $mtbmuncipalite->id)
                            selected
                          @endif
                          >{{ $mtbmuncipalite->value }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="row top100">
                 <div id="row1" class="col-sm-6">
                   開催状態
                 </div>
                 <div class="col-sm-6">
                   <select type="text" name="mtb_event_status_id">
                     <option>開催地域を選択してください。</option>
                     @foreach($mtbeventstatu as $mtb_event_status)
                       <option value="{{ $mtb_event_status->id }}"
                         @if(old("mtb_event_status_id") && old("mtb_event_status_id") == $mtb_event_status->id)
                           selected
                         @endif
                         >{{ $mtb_event_status->value }}</option>
                     @endforeach
                   </select>
                 </div>
               </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    主題
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="title" value="{{ old('title') }}">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    開催時間
                  </div>
                  <div class="col-sm-6">
                    <input type="date" name="start_at" value="{{ old('start_at') }}">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    最大人数
                  </div>
                  <div class="col-sm-6">
                    <input type="number" name="maximum" value="{{ old('maximum') }}">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    最小人数
                  </div>
                  <div class="col-sm-6">
                    <input type="number" name="minimum" value="{{ old('minimum') }}">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    参加費
                  </div>
                  <div class="col-sm-6">
                    <input type="number" name="cost" value="{{ old('cost') }}">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    内容の詳細
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="detail" value="{{ old('detail') }}">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    写真1
                  </div>
                  <div class="col-sm-6">
                    <input type="file" name="picture1">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    写真2
                  </div>
                  <div class="col-sm-6">
                    <input type="file" name="picture2">
                  </div>
                </div>

                <div class="row top100">
                  <div id="row1" class="col-sm-6">
                    写真3
                  </div>
                  <div class="col-sm-6">
                    <input type="file" name="picture3">
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
@endsection
