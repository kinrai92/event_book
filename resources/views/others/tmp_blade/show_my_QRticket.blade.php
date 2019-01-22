@extends('layout.layout')
@section('title','show_my_QRticket')

@section('content')

<div class="row">
  <div class='col-md'>
    <img src = 'http://qr.liantu.com/api.php?text={{$text}}'>
  </div>
</div>
<div class="row">
  <div class='col-md'>
      <table class='table'>
        <tr>
          <td>イベント名</td>
          <td>{{$ticket->event->title}}</td>
        </tr>
        <tr>
          <td>開催時間</td>
          <td>{{$ticket->event->start_at}}</td>
        </tr>
        <tr>
          <td>開催地</td>
          <td>{{$ticket->event->mtb_municipality->value}}</td>
        </tr>
        <tr>
          <td>チケット料金</td>
          <td>{{$ticket->event->cost}}</td>
        </tr>
      </table>
  </div>
</div>

@endsection
