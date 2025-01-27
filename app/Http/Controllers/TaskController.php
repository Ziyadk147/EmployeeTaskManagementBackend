<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = DB::SELECT("SELECT employeeID , taskDate , taskDescription FROM tasks ORDER BY id DESC");
        return response()->json(['data' => $tasks , 'message' => "Task Fetched Successfully" , 'status' => 200], 200);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $task = Task::insertOrUpda($tasks);;
//        $request->validate([
//            'id' => 'required|string',
//            'day' => 'required|string',
//            'task' => 'required|string',
//        ]);
//
//        $task = Task::create([
//            'employeeID' => $request->id,
//            'taskDate' => $request->day,
//            'taskDescription' => $request->task,
//        ]);

        return response()->json(['data' => $task  , 'message' => "Task Stored Successfully" , 'status' => 200] , 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
