@extends("layout.layout")
@section('title','Tickets')
@section("content")

  <div class="col-sm text-center top36 bottom36">
    <p>チケット一覧</p>
  </div>

  <div class="row top36 bottom36">
    <div class="col-sm-2"></div>

    <div class="col-sm-8">
        <nav class="navbar navbar-expand-sm">
            <ul class="navbar-nav">
                <li id="interval" class="nav-item {{ ($current_page=='all') ? 'current' : '' }}"><a class="nav-link navbar-brand" href="/user_tickets">すべて</a></li>
                <li id="interval" class="nav-item {{ ($current_page=='not_used') ? 'current' : '' }}"><a class="nav-link navbar-brand" href="/user_tickets/not_used">未使用</a></li>
                <li id="interval" class="nav-item {{ ($current_page=='used') ? 'current' : '' }}"><a class="nav-link navbar-brand" href="/user_tickets/used">使用済み</a></li>
                <li id="interval" class="nav-item {{ ($current_page=='cancelled') ? 'current' : '' }}"><a class="nav-link navbar-brand" href="/user_tickets/cancelled">キャンセル済み</a></li>
            </ul>
　　　　 </nav>

        <!-- 三元运算
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
        </div>-->
      @foreach($tickets as $ticket)
      <div class="row borderln">

         <div class="col-md-8">
           <table class="table">
             <tr>
               <td>QRコード:</td>
               <td id="qrcode"></td>
               <script type="text/javascript">
                new QRCode(document.getElementById("qrcode"), {
                 text: "{{$ticket->code}}",
                 width: 100,
                 height: 100
               });
               </script>
             </tr>
             <tr>
               <td>イベント:</td>
               <td>{{$ticket->event->title}}</td>
             </tr>
             <tr>
               <td>チケット状態:</td>
               <td>{{$ticket->mtb_ticket_status->value}}</td>
             </tr>
             <tr>
               <td>user:</td>
               <td>{{$ticket->user->nickname}}</td>
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
