<table>
  <tr>
    <td>{{ $comment->user ? $comment->user->nickname : '主催者' }}</td>
  </tr>
  <tr>
    <td>{{ $comment->content }}</td>
  </tr>
  <tr>
    <td>{{ $comment->created_at }}</td>
  </tr>
</table>
