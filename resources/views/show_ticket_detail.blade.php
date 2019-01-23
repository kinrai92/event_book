<table>
<!-- 検証stpe6 -->
<tr>
  <th>イベント名</th>
  <td>{{ $ticket->event->title }}</td>
</tr>

<tr>
  <th>開催時間</th>
  <td>{{ $ticket->event->start_at }}</td>
</tr>

<tr>
  <th>開催状態</th>
  <td>{{ $ticket->event->mtb_event_status->value }}</td>
</tr>

<tr>
  <th>主催者名</th>
  <td>{{ $ticket->event->cooperation->name }}</td>
</tr>

<tr>
  <th>購入者名</th>
  <td>{{ $ticket->user->user_detail->lastname . " " . $ticket->user->user_detail->firstname }}</td>
</tr>

<tr>
  <th>チケット料金</th>
  <td>{{ $ticket->event->cost }}円</td>
</tr>

<tr>
  <th>購入時間</th>
  <td>{{ $ticket->created_at }}</td>
</tr>

<tr>
  <th>
    <!-- 検証stpe7 -->
    <form action="{{ route('ticket_check_in') }}" method="post">
      @csrf
      <input type="hidden" name="ticket_code" value="{{ $ticket->code }}">
      <input type="submit" value="確認">
    </form>
  </th>
  <th>
    <!-- 検証stpe8 -->
    <form action="{{ route('ticket_cancel_by_cooperation') }}" method="post">
      @csrf
      <input type="hidden" name="ticket_code" value="{{ $ticket->code }}">
      <input type="submit" value="チケットキャンセル">
    </form>
  </th>
</table>
