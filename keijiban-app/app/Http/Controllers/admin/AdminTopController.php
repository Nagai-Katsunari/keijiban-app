<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thread;

class AdminTopController extends Controller
{
    public function index()
    {
        $threads = Thread::latest()->paginate(20);

        return view('admin.admin_top', [
            'threads' => $threads
        ]);
    }

    public function destroy(Thread $thread)
    {

        $thread->delete();

        return back();
    }
}
