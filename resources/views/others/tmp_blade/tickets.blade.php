@extends("layout.layout")
@section('title','Tickets')
@section("content")

<style>
div.current {
  background: gray;
}
</style>

  <div class="col-sm text-center top36 bottom36">
    <p>チケット一覧</p>
  </div>

  <div class="media row top36 bottom36">
    <div class="col-sm-2"></div>

    <div class="col-sm-8">

      <div class="row text-center">
        <!-- 三元运算 -->
        <div class="col-sm-3 {{ ($current_page=='all') ? 'current' : '' }}">
          <a href="/user_tickets">すべて</a>
        </div>
        <div class="col-sm-3 {{ ($current_page=='not_used') ? 'current' : '' }}">
          <a href="/user_tickets/not_used">未使用</a>
        </div>
        <div class="col-sm-3 {{ ($current_page=='held') ? 'current' : '' }}">
          <a href="/user_tickets/used">使用済み</a>
        </div>
        <div class="col-sm-3 {{ ($current_page=='cancelled') ? 'current' : '' }}">
          <a href="/user_tickets/cancelled">キャンセル済み</a>
        </div>
      </div>

      @foreach($tickets as $ticket)
        <div class="row top36 div01 bg-light">
          <div class="col-sm-4 top24 text-center">
            <img src="{{ asset('/storage/' . $ticket->event->picture1) }}" class="media-object" style="width:300px">
          </div>
          <div class="col-sm-8">
            <div class="row top36">
              <div class="col-sm-4 text-left">イベント名</div>
              <div class="col-sm-8 text-right">{{ $ticket->event->title }}</div>
            </div>
            <div class="row top6">
              <div class="col-sm-4 text-left">開催時間</div>
              <div class="col-sm-8 text-right">
                {{ $ticket->event->start_at->format("Y年n月j日 H時s分") }}
              </div>
            </div>
            <div class="row top6">
              <div class="col-sm-4 text-left">地域</div>
              <div class="col-sm-8 text-right">{{ $ticket->event->mtb_municipality->value }}</div>
            </div>
            <div class="row top6">
              <div class="col-sm-4 text-left">参加費用</div>
              <div class="col-sm-8 text-right">{{ number_format($ticket->event->cost) }}円/人</div>
            </div>
            <div class="row top6">
              <div class="col-sm-4 text-left">開催状態</div>
              <div class="col-sm-8 text-right">
                @if ($ticket->event->mtb_event_status_id == 3)
                キャンセル済
                @elseif ($ticket->event->mtb_event_status_id == 2 && $ticket->event->start_at >= \Carbon\Carbon::now())
                未開催
                @elseif ($ticket->event->mtb_event_status_id == 2 && $ticket->event->start_at < \Carbon\Carbon::now())
                開催済
                @endif
              </div>
            </div>
            <div class="row top6">
              <div class="col-sm-4 text-left">主催者</div>
              <div class="col-sm-8 text-right">{{ $ticket->event->cooperation->name }}</div>
            </div>

          </div>
        </div>
      @endforeach
    </div>

    <div class="col-sm-2"></div>
  </div>

@endsection
