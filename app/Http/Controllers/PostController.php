<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Models\Topic;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::orderBy('name')->get();
        return view('posts.create')->with(compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Auth::user()
            ->posts()
            ->create($request->all());

        return redirect()
            ->route('post.edit', $post)
            ->with('success', __('Post created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show')->with(compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $topics = Topic::orderBy('name')->get();
        return view('posts.edit')->with(compact('post', 'topics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->except('_token'));

        return redirect()
            ->route('post.edit', $post)
            ->with('success', __('Post saved successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function comment(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required|min:5',
        ]);

        $comment = new Comment;

        $comment->user_id = Auth::user()->id;
        $comment->message = $request->comment;

        $post->comments()->save($comment);

        return back()
            ->with('success', __('Comment created successfully'));
    }

    public function uploadImage(Request $request, Post $post)
    {
        if (!$request->ajax()) {
            return abort(404);
        }

        $image = $request->file('image');
        $fileID = uniqid();
        $filename = "posts/{$fileID}.{$image->extension()}";

        Image::make($image)->save(public_path("/uploads/{$filename}"));

        $post->image = $filename;
        $post->save();

        return response()->json(['image' => $post->image ]);
    }
}
