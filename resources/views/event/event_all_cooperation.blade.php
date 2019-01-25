@extends("layout.layout")

@section("content")

<script>
$(document).ready(function(){
  $('p').on('click',function(){
    $(this).next().slideToggle('slow');
  });
});
</script>
<style>
div.current {
  background: gray;
}
</style>

  <div class="col-sm text-center top36 bottom36">
    <p>MYEVENTS一覧</p>
  </div>

  <div class="col-sm text-center top36 bottom36">

  <div class="media row top36 bottom36">
    <div class="col-sm-2"></div>

    <div class="col-sm-8">

      <div class="row text-center">
        <!-- 三元运算 -->
        <div class="col-sm-4 {{ ($current_page=='all') ? 'current' : '' }}">
          <a href="/event/myevents/">すべて</a>
        </div>
        <div class="col-sm-2 {{ ($current_page=='opening') ? 'current' : '' }}">
          <a href="/event/myevents/opening">開催中</a>
        </div>
        <div class="col-sm-2 {{ ($current_page=='held') ? 'current' : '' }}">
          <a href="/event/myevents/held">開催済</a>
        </div>
        <div class="col-sm-2 {{ ($current_page=='not_publish') ? 'current' : '' }}">
          <a href="/event/myevents/not_publish">未公開</a>
        </div>
        <div class="col-sm-2 {{ ($current_page=='canceled') ? 'current' : '' }}">
          <a href="/event/myevents/canceled">キャンセル済</a>
        </div>
      </div>
      @foreach($events as $event)
        <p class="event_title">{{ $event->title }}</p>
        <div class="event_content row top36 div01 bg-light">
          <div class="col-sm-4 top24 text-center">
            <img src="{{ asset('/storage/' . $event->picture1) }}" class="media-object" style="width:100px">
          </div>
          <div class="col-sm-8">

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
              <div class="col-sm-4 text-left">参加費用</div>
              <div class="col-sm-8 text-right">{{ number_format($event->cost) }}円/人</div>
            </div>
            <div class="row top6">
              <div class="col-sm-4 text-left">開催状態</div>
              <div class="col-sm-8 text-right">
                @if ($event->mtb_event_status_id == 3)
                キャンセル済
                @elseif ($event->mtb_event_status_id == 1)
                未公開
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
            <div class="col-sm text-right top６6">
              <a href="/show_comments_cooper/{{ $event->id }}">問い合わせを見る</a>
            </div>
            <div class="col-sm text-right top6 bottom36">
              <a href="{{ route('get_one_event_of_cooperation',['id' => $event->id]) }}">詳しくはこちら</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="col-sm-2"></div>
  </div>

@endsection
