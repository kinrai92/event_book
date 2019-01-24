@extends("layout.layout")

@section("content")

<style>
div.current {
  background: gray;
}
</style>

  <div class="col-sm text-center top36 bottom36">
    <p>EVENT詳細</p>
  </div>

  <div class="media row top36">
    <div class="col-sm-2"></div>

    <div class="col-sm-8">

      <div class="row">
        @if (!$event->picture2 && !$event->picture3)
          <div class="col-sm text-center">
            <img src="{{ $event->picture1 }}" class="media-object" style="width:300px">
          </div>
        @elseif ($event->picture2 && $event->picture3)
          <div class="col-sm-4 text-center">
            <img src="{{ $event->picture1 }}" class="media-object" style="width:250px">
          </div>
          <div class="col-sm-4 text-center">
            <img src="{{ $event->picture2 }}" class="media-object" style="width:250px">
          </div>
          <div class="col-sm-4 text-center">
            <img src="{{ $event->picture3 }}" class="media-object" style="width:250px">
          </div>
        @else
          <div class="col-sm-6 text-center">
            <img src="{{ $event->picture1 }}" class="media-object" style="width:300px">
          </div>
          <div class="col-sm-6 text-center">
            <img src="{{ $event->picture2 }}" class="media-object" style="width:300px">
          </div>
        @endif
      </div>

      <div class="row top6 div01 bg-light">
        <div class="col-sm">
          @if(Session::has('one_message'))
            <p style="text-align:center;padding:20px">{{Session::get('one_message') }}</p>
          @endif
          <div class="row top36">
            <div class="col-sm-4 text-left">イベント名</div>
            <div class="col-sm-8 text-right">{{ $event->title }}</div>
          </div>
          <div class="row top6">
            <div class="col-sm-4 text-left">開催時間</div>
            <div class="col-sm-8 text-right">
              {{ $event->start_at->format("Y年n月j日 H時s分") }}
            </div>
          </div>
          <div class="row top6">
            <div class="col-sm-4 text-left">地域</div>
            <div class="col-sm-8 text-right">{{ $event->mtb_municipality->value }}</div>
          </div>
          <div class="row top6">
            <div class="col-sm-4 text-left">詳細</div>
            <div class="col-sm-8 text-right">{{ $event->detail }}</div>
          </div>

          <div class="row top36">
            <div class="col-sm-4 text-left">参加費用</div>
            <div class="col-sm-8 text-right">{{ number_format($event->cost) }}円/人</div>
          </div>
          <div class="row top6">
            <div class="col-sm-4 text-left">開催状態</div>
            <div class="col-sm-8 text-right">
              @if ($event->mtb_event_status_id == 3)
                キャンセル済
              @elseif ($event->mtb_event_status_id == 2 && $event->start_at >= \Carbon\Carbon::now())
                未開催
              @elseif ($event->mtb_event_status_id == 2 && $event->start_at < \Carbon\Carbon::now())
                開催済
              @endif
            </div>
          </div>
          <div class="row top6">
            <div class="col-sm-4 text-left">主催者</div>
            <div class="col-sm-8 text-right">{{ $event->cooperation->name }}</div>
          </div>
          <div class="row top6">
            <div class="col-sm-4 text-left">参加最大人数</div>
            <div class="col-sm-8 text-right">{{ $event->maximum }}人</div>
          </div>

          <!-- 現在の参加人数 -->
          @if ($event->mtb_event_status_id == 2 && $event->start_at >= \Carbon\Carbon::now())
            <div class="row top6">
              <div class="col-sm-4 text-left">現在の参加人数</div>
              <div class="col-sm-8 text-right">{{ $tickets->count() }}人</div>
            </div>

            <div class="row top6">
              <div class="col-sm-4 text-left">在庫</div>
              <div class="col-sm-8 text-right">{{ $stock }}人</div>
            </div>

            <div class="row top6">
              <div class="col-sm-4 text-left">お問い合わせ</div>
              <div class="col-sm-8 text-right">
              　<a href="/show_comments/{{ $event->id }}">お問い合わせ</a></div>
            </div>
          @endif

          <!-- 申し込みボタン -->
          <div class="row top36">
            <div class="col-sm text-center">
              @if ($errors->any())
                　<div class="alert alert-danger">
                    　<ul>
                    　    @foreach ($errors->all() as $error)
                        　    <li>{{ $error }}</li>
                      　  @endforeach
                  　  </ul>
                　</div>
            　  @endif
              @if ($event->mtb_event_status_id == 2 && $event->start_at >= \Carbon\Carbon::now() && $tickets->count() < $event->maximum && $check_user == null)
                <form action="{{ route('post_create_ticket') }}" method="post">
                  @csrf
                  <input type="submit" value="申し込み">
                  <input type="hidden" name="event_id" value="{{ $event->id }}">
                  <input type="hidden" name="user_id" value="{{auth('user')->user()->user_detail->user_id}}">
                </form>
              @else
                申し込み不可
              @endif
            </div>
          </div>

          <div class="row top6 bottom36">
            <div class="col-sm text-center">
              <a href="{{ route('get_events') }}">戻る</a>
            </div>
          </div>

        </div>
      </div>

    </div>

    <div class="col-sm-2"></div>
  </div>

@endsection
