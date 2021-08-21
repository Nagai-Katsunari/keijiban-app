<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Comment;

class CommentController extends Controller
{

    public function index()
    {
        $threads = Thread::latest()->paginate(20);

        return view('threads.index', [
            'threads' => $threads
        ]);
    }



    public function store(Thread $thread, Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:512'
        ]);

        $thread->comments()->create([
            'body' => $request->body,
            'user_id' => $request->user()->id
        ]);

        return back();
    }

    public function show($id,Request $request)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.show',[
            'comment' => $comment,
            'body' => $request->body,
        ]);
    }

    public function __construct()
    {
        $this->middleware('auth')->only(['store']);
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return back();
    }

    public function edit($id)
    {

        $comment = Comment::findOrFail($id);

        return view('comments.edit',[
            'comment' => $comment,
        ]);
    }

    public function update($id, Request $request)
    {

        $params = $request->validate([
            'body' => 'required|string|max:512',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->fill($params)->save();

        return redirect()->route('comments.show',[
            'comment' => $comment,
            'body' => $request->body,
        ]);
    }

}


