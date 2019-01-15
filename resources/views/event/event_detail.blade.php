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
              <div class="col-sm-8 text-right">{{ $num_tickets }}人</div>
            </div>
          @endif

          <!-- 申し込みボタン -->
          <div class="row top36">
            <div class="col-sm text-center">
              @if ($event->mtb_event_status_id == 2 && $event->start_at >= \Carbon\Carbon::now() && $num_tickets < $event->maximum)
                <form action="" method="post">
                  <input type="submit" value="申し込み">
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