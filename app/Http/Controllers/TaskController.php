<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\Session;
use Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        return view('tasks', [
            'tasks' => Task::paginate($perpage)->withQueryString()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task_create', [
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_name' => 'required|max:255',
            'task_description'=> 'required|max:500',
            'task_due_date'=>'required|after:now',
            'user_id'=>'required|integer'
        ]);
        $task = new Task($validated);
        $task->save();
        return redirect('/task');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('task_edit',[
            'task'=> Task::all()->where('id', $id)->first(),
            'users'=>User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'task_name' => 'required|max:255',
            'task_description'=> 'max:500',
            'task_due_date'=>'required|after:now',
            'user_id'=>'required|integer'
        ]);
        $task = Task::all()->where('id', $id)->first();
        $task->task_name = $validated['task_name'];
        $task->task_description = $validated['task_description'];
        $task->task_due_date = $validated['task_due_date'];
        $task->user_id = $validated['user_id'];
        $task->save();
        return redirect('/task');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('destroy-task', Task::all()->where('id', $id)->first())){
            return redirect('/error')->with('message',
                'У вас нет разрешения на удаление задачи под номером ' . $id);
        }
        Task::destroy($id);
        return redirect('/task');
    }
}
