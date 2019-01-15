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
      <div class="row borderln">
         <div class="col-md-4">
         <img src="{{asset('/storage/'.$ticket->event->picture1)}}" width="300px" height="230px" style="padding:20px">
         </div>
         <div class="col-md-8">
           <table class="table">
             <tr>
               <td>チケットの番号:</td>
               <td>{{$ticket->code}}</td>
             </tr>
             <tr>
               <td>イベント:</td>
               <td>{{$ticket->event->name}}</td>
             </tr>
             <tr>
               <td>チケット状態:</td>
               <td>{{$ticket->mtb_ticket_status}}</td>
             </tr>
            <tr>
              <td>イベント開催日時:</td>
              <td>{{$ticket->event->start_at}}</td>
            </tr>
            <tr>
              <td>イベント開催場所:</td>
              <td>{{$ticket->event->mtb_municipality->value}}</td>
            </tr>
            <tr>
              <td>イベント主催者:</td>
              <td>{{$ticket->event->cooperation->name}}</td>
            </tr>
            <tr>
              <td>キャンセル:</td>
              <td><a href="#">キャンセル</a></td>
            </tr>
           </table>
         </div>
      </div>
    @endforeach
    </div>

    <div class="col-sm-2"></div>
  </div>

@endsection
