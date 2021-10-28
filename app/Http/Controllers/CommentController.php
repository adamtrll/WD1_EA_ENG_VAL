<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function reply(Request $request, Comment $comment)
    {
        if ($comment->is_reply) {
            return back();
        }

        $request->validate([
            'message' => 'required',
        ]);

        $reply = new Comment;
        $reply->message = $request->message;
        $reply->user_id = Auth::user()->id;

        $comment->replies()->save($reply);

        if ($request->redirect_url) {
            return redirect($request->redirect_url)
                ->with('success', __('Reply created successfully'));
        }

        return back()
            ->with('success', __('Reply created successfully'));
    }
}
