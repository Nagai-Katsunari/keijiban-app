<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Comment;


class AdminController extends Controller
{
    public function index()
    {
        $threads = Thread::latest()->paginate(20);

        return view('admin.index', [
            'threads' => $threads
        ]);
    }

    public function destroy(Thread $thread)
    {

        $thread->delete();

        return back();
    }
}
