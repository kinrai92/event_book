@extends('layout.layout')

@section('title','Comments')

@section('content')

  @each('components.comments',$comments,'comment')

<div>
  <form action="{{ route('post_comment') }}" method='post'>
    @csrf
    <textarea name="comment" rows="10" cols="20"></textarea>
    <input type="hidden" name="event_id" value="{{ $event_id }}">
    <div style="margin-left:287px">
    <input type="submit" value="コメントする">
    </div>
  </form>
</div>

@endsection
