<?php

namespace App\Http\Controllers\NormalUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tasks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $fileName = null;

        $imageFile = $request->image;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $extension = $imageFile->getClientOriginalName();
            $fileName = uniqid(rand() . '_') . $extension;
            Storage::putFileAs('public/tasks', $imageFile, $fileName);
        }

        $tasks->create([
            'title' => $request->input('task_title'),
            'description' => $request->input('task_description'),
            'user_id' => Auth::id(),
            'file_name' => $fileName
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
