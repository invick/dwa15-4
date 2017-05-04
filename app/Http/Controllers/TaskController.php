<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Flag;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of current user's tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Auth::user()->tasks()->with('flags')->orderBy('completed', 'asc')->get();
        return view('tasks.list', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new task.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flags = Flag::all();
        return view('tasks.create', [
            'flags' => $flags
        ]);
    }

    /**
     * Store a newly created task in storage.
     *
     * @param TaskRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $data = $request->only(['title', 'description', 'flags']);
        $task = Auth::user()->tasks()->create($data);
        $task->flags()->attach($data['flags']);
        return redirect(route('tasks.index'))->with('success','Task created successfully!');
    }

    /**
     * Show the form for editing the specified task.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $task->flagsIds = $task->flags()->pluck('id')->toArray();
        $flags = Flag::all();
        return view('tasks.edit', [
            'task' => $task,
            'flags' => $flags
        ]);
    }

    /**
     * Update the specified task in storage.
     *
     * @param TaskRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $data = $request->only(['title', 'description', 'flags']);
        $task->update($data);
        $task->flags()->sync($data['flags']);
        return redirect(route('tasks.index'))->with('success','Task updated successfully!');
    }

    /**
     * Remove the specified task from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::destroy($id);
        return redirect(route('tasks.index'))->with('success','Task deleted successfully!');
    }

    public function markAsDone($id)
    {
        Task::findOrFail($id)->update([
           'completed' => true
        ]);
        return redirect()->back()->with('success','Task marked as done');
    }

    public function markAsUndone($id)
    {
        Task::findOrFail($id)->update([
            'completed' => false
        ]);
        return redirect()->back()->with('success','Task marked as undone');
    }
}
