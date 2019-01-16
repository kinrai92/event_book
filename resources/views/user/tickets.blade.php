@extends("layout.layout")
@section('title','Tickets')
@section("content")
 <script src="{{asset('/js/qrcode.js')}}"></script>
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
        <div class="col-sm-3 {{ ($current_page=='used') ? 'current' : '' }}">
          <a href="/user_tickets/used">使用済み</a>
        </div>
        <div class="col-sm-3 {{ ($current_page=='cancelled') ? 'current' : '' }}">
          <a href="/user_tickets/cancelled">キャンセル済み</a>
        </div>
      </div>

      @foreach($tickets as $ticket)
      <div class="row top36 div01 bg-light">
        <div class="col-sm-2 top24 text-center">
        </div>
        <div class="col-sm-9">
          <div class="row top36">
            <div class="col-sm-4 text-left">チケットの番号:</div>
            <div class="col-sm-8 text-right">{{$ticket->code}}</div>
          </div>
          <div class="row top36">
            <div class="col-sm-4 text-left">QRコード:</div>
            <div id="{{$ticket->id}}" class="col-sm-8 text-right margin" type="text/javascript">
              <script type="text/javascript">
              new QRCode(document.getElementById("{{$ticket->id}}"), {
                 text: "1234567890123456",
                 width: 128,
                 height:128,
                });
              </script>
            </div>
          </div>
          <div class="row top6">
            <div class="col-sm-4 text-left">イベント:</div>
            <div class="col-sm-8 text-right">
              {{$ticket->event->title}}
            </div>
          </div>
          <div class="row top6">
            <div class="col-sm-4 text-left">チケット状態:</div>
            <div class="col-sm-8 text-right">{{$ticket->mtb_ticket_status->value}}</div>
          </div>
          <div class="row top6">
            <div class="col-sm-4 text-left">user:</div>
            <div class="col-sm-8 text-right">{{$ticket->user->nickname}}</div>
          </div>
          <div class="row top6 bottom36">
            <div class="col-sm-4 text-left"></div>
            <div class="col-sm-8 text-right">
            <a href="#">キャンセル</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
