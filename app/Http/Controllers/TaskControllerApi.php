<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Pagination\Paginator;


class TaskControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2(Request $request)
    {
        $user = auth()->user();

        $perPage = $request->query('per_page', 5); // Получаем per_page, по умолчанию 10
        $page = $request->query('page', 1); // Получаем page, по умолчанию 1

        // Получаем задачи пользователя с пагинацией
        $tasks = $user->tasks()->paginate($perPage, ['*'], 'page', $page); // Используем page

        return response($tasks);
    }

    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 5;
        $page = $request->page ?? 1;
        $tasks = Task::limit($perpage)
            ->offset(($page - 1) * $perpage)
            ->get();

        dd($tasks);

        $total = Task::count(); // Получаем общее количество

        return response([
            'tasks' => $tasks,
            'total' => $total,
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

        // Используйте Task::create(), а не new Task()
        $task = Task::create($validated);

        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        return response(Task::find($id));
    }

    public function user_tasks(int $id)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
