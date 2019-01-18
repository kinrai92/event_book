<tr>
  <td>{{ $ticket->user->user_detail->lastname.
         $ticket->user->user_detail->firstname.
        "(".
         $ticket->user->user_detail->lastname_reading.
         $ticket->user->user_detail->firstname_reading.
        ")" }}</td>
  <td>{{ $ticket->user->mail }}</td>
  <td>{{ $ticket->user->user_detail->get_age() }}</td>
  <td>{{ $ticket->user->user_detail->mtb_area->value }}</td>
  <td>{{ $ticket->created_at }}</td>
  @if($ticket->mtb_ticket_status_id == "3")
    <td>キャンセル済み</td>
   @else
  <td><a href='/cancell_ticket/{{ $ticket->id }}'>キャンセル</a></td>
  @endif
</tr>
