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
            <div  class="col-sm-8 text-right margin">
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('{{$ticket->code}}')) !!} ">
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
