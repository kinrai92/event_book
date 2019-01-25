@extends('layout.layout')

@section('title','Comments')

@section('content')
<div style="margin-top:20px">
  <p style="text-align:center">{{ $event->title }}</p>
</div>

<div style="padding-left:300px;padding-top:50px">
  <form action="{{ route('post_comment') }}" method='post'>
    @csrf
    <textarea name="contents" rows="8" cols="40"></textarea>
    <input type="hidden" name="event_id" value="{{ $event_id }}">
    <div style="padding-left:80px">
    <input type="submit" value="コメント">
    <input type="reset" value="リセット">
    </div>
  </form>
</div>

<div style="padding-left:150px;padding-top:50px">
  @each('components.comments',$comments,'comment')
</div>
<div style="padding-top:40px;margin-left:230px">{{ $comments->links('pagination.custom_pagination',['per_block' => $per_block])}}</div>
@endsection
