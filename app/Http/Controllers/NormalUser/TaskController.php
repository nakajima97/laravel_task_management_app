<?php

namespace App\Http\Controllers\NormalUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tasks;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Tasks::where('user_id', Auth::id())->get()->toArray();

        return view('NormalUser.tasks', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $tasks = new Tasks();

        $tasks->create([
            'title' => $request->input('task_title'),
            'description' => $request->input('task_description'),
            'user_id' => Auth::id()
        ]);

        return redirect('/normal-user/tasks');
    }
}
