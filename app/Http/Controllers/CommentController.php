<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Comment\Comment;
use App\Model\Event\Event;
class CommentController extends Controller
{

  public function show_comments(Request $request,$event_id)
  {
    $comments = Comment::where('event_id',$event_id)->orderBy('created_at','desc')->paginate(5);
    $event = Event::where('id',$event_id)->first();
    $per_block = 3;
    return view('event.comments',['comments' => $comments,
                                  'event_id' => $event_id,
                                  'event' => $event,
                                  'per_block' => $per_block]);
  }

  public function show_comments_cooper(Request $request,$event_id)
  {
    $comments = Comment::where('event_id',$event_id)->orderBy('created_at','desc')->paginate(5);
    $event = Event::where('id',$event_id)->first();
    $per_block = 3;
    return view('event.comments',['comments' => $comments,
                                  'event_id' => $event_id,
                                  'event' => $event,
                                  'per_block' => $per_block]);
  }

  public function create_comment(Request $request)
  {
    if(!$request->contents){

      return redirect()->back();
    }

    $one_comment = new Comment;
    $one_comment->user_id = auth('user')->user() ? auth('user')->user()->id : null;
    $one_comment->event_id = $request->event_id;
    $one_comment->contents = $request->contents;
    $one_comment->save();

    return redirect()->back();
  }
}
