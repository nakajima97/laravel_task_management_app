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
        $tasks = Tasks::where('user_id', '=', Auth::id())->where('is_finished', '=', false)->get()->toArray();

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

    public function destroy($id)
    {
        Tasks::findOrFail($id)->delete();

        return redirect('/normal-user/tasks');
    }

    public function finish($id)
    {
        $task = Tasks::findOrFail($id);

        $task->is_finished = true;
        $task->save();

        return redirect('/normal-user/tasks');
    }
}
