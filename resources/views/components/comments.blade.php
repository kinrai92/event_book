<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-9">
     <p>{{ $comment->user_id ? $comment->user->user_detail->nickname : '主催者' }}</p>
     <p>{{ $comment->contents }}</p>
     <p style="text-align:right">{{ $comment->created_at }}</p>
  </div>
  <div class="col-md-2"></div>
</div>
