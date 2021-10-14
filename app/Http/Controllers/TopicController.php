<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    public function show(Topic $topic)
    {
        $posts = $topic->posts()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('topics.show')
            ->with(compact('topic', 'posts'));
    }
}
