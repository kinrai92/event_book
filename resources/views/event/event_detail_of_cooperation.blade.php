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

          <div class="row top6 bottom36">
            <div class="col-sm text-center">
              <a href="{{ route('get_events') }}">戻る</a>
            </div>
          </div>

        </div>
      </div>

    </div>

    <div class="col-sm-2"></div>

    <div class="row" style="width:500px;margin-left:200px;margin-top:20px">
      <!-- 三元运算 -->
      <div class="col-sm-6 {{ ($current_page=='all') ? 'current' : '' }}" style="padding-left:100px">
        <a href="/coop_event/find/{{$event->id}}/all" style="text-center">すべて</a>
      </div>
      <div class="col-sm-6 {{ ($current_page=='cancelled') ? 'current' : '' }}" style="padding-left:80px">
        <a  name="tag" href="/coop_event/find/{{$event->id}}/cancelled">キャンセル済</a>
      </div>
    </div>

    <div class="entry_users" style="overflow: scroll">
      <table class="table" style="width:1000px">
        <tr>
          <td>ユーザーの名前</td>
          <td>メールアドレス</td>
          <td>年齢</td>
          <td>住所</td>
          <td>申し込み時間</td>
          <td>キャンセル</td>
       </tr>
       @each('components.entry_users',$tickets,'ticket')
      </table>
  </div>

  <div class="paginate">{{$tickets->links('pagination.custom_pagination',['per_block' => $per_block])}}</div>

</div>

@endsection
