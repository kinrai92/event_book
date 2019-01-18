@extends("layout.layout")

@section("content")

<style>
div.current {
  background: gray;
}
p{
    text-align: center;
}
</style>

  <div class="col-sm text-center top36 bottom36">
    <p>EVENT一覧</p>
  </div>

  <div class="col-sm text-center top36 bottom36">
    <form action="{{ route('get_events', ['status' => $status]) }}" method="get">
      イベント名<input type="text" name="event_title" value="{{ Request::query('event_title') }}">
      地域別<select type="text" name="mtb_municipality_id">
        <option value=""></option>
        @foreach ($mtb_municipalities as $mtb_municipality)
        <option value="{{ $mtb_municipality->id }}"
          @if (Request::query('mtb_municipality_id') && Request::query('mtb_municipality_id') == $mtb_municipality->id)
          selected
          @endif
          >{{ $mtb_municipality->value }}</option>
        @endforeach
      </select>
      主催者名<input type="text" name="cooperation_name" value="{{ Request::query('cooperation_name') }}">
      <input type="submit" value="検索">
    </form>
  </div>

  <div class="media row top36 bottom36">
    <div class="col-sm-2"></div>

    <div class="col-sm-8">

      <div class="row text-center">
        <!-- 三元运算 -->
        <div class="col-sm-3 {{ ($current_page=='all') ? 'current' : '' }}">
          <a href="{{ route('get_events', ['event_title' => Request::query('event_title'), 'mtb_municipality_id' => Request::query('mtb_municipality_id') , 'cooperation_name' => Request::query('cooperation_name')]) }}">すべて</a>
        </div>
        <div class="col-sm-3 {{ ($current_page=='opening') ? 'current' : '' }}">
          <a href="{{ route('get_events', ['status' => 'opening', 'event_title' => Request::query('event_title'), 'mtb_municipality_id' => Request::query('mtb_municipality_id') , 'cooperation_name' => Request::query('cooperation_name')]) }}">未開催</a>
        </div>
        <div class="col-sm-3 {{ ($current_page=='held') ? 'current' : '' }}">
          <a href="{{ route('get_events', ['status' => 'held', 'event_title' => Request::query('event_title'), 'mtb_municipality_id' => Request::query('mtb_municipality_id') , 'cooperation_name' => Request::query('cooperation_name')]) }}">開催済み</a>
        </div>
        <div class="col-sm-3 {{ ($current_page=='canceled') ? 'current' : '' }}">
          <a href="{{ route('get_events', ['status' => 'canceled', 'event_title' => Request::query('event_title'), 'mtb_municipality_id' => Request::query('mtb_municipality_id') , 'cooperation_name' => Request::query('cooperation_name')]) }}">キャンセル済み</a>
        </div>
      </div>
      @php
      {{$p_count=1;$div_count=10;}}
      @endphp
      @foreach($events as $event)
      <p id="{{++$p_count}}">{{ $event->title }}</p>
        <div id="{{++$div_count}}">
          <script>
          $(document).ready(function(){
            $('#{{$p_count}}').click(function(event){
              $("#{{$div_count}}").slideToggle("slow");
            });
          });
          </script>
        <div class="row top36 div01 bg-light">
          <div class="col-sm-4 top24 text-center">
            <img src="{{ asset('/storage/' . $event->picture1) }}" class="media-object" style="width:300px">
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
            <div class="col-sm text-right top6 bottom36">
              <a href="{{ route('get_one_event',['id' => $event->id]) }}">詳しくはこちら</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="col-sm-2"></div>
  </div>

@endsection
