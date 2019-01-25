<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{

  public function show_comments(Request $request,$event_id)
  {
    $comments = Comment::query()->where('event_id',$event_id)->get();
    return view('event.comments',['comments' => $comments,'event_id' => $event_id]);
  }

  public function create_comment(Request $request)
  {
    if(!$request->comment){

      return redirect()->back();
    }

    $one_comment = new Comment;
    $one_comment->user_id = null;
    $one_comment->cooperation_id = null;
    if(auth('user')){
      $one_comment->user_id = auth('user')->user()->id;
    }
    if(auth('cooperation')){
      $one_comment->cooperation_id = auth('cooperation')->user()->id;
    }
    $one_comment->event_id = $request->event_id;
    $one_comment->content = $request->content;
    $one_comment->save();

    $comments = Comment::query()->where('event_id',$event_id)->get();
    return view('event.comments',['comments' => $comments,'event_id' => $request->event_id]);
  }

  public function test(Request $request)
  {
    return view('event.comments');
  }
}
