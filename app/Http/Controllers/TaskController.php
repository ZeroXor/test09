<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

/**
 * Description of TaskController
 */
class TaskController
{
    /**
     * 
     * @return type
     */
    public function index()
    {
        $columns = ['title', 'created_at'];
        $result = [
            'data' => Task::where([
                'status' => 1
            ])->get($columns),
            'status' => 'success'
        ];
        
        return $result;
    }

    /**
     * 
     * @param int $id
     * 
     * @return type
     */
    public function show(int $id)
    {
        $columns = ['title', 'description', 'created_at', 'updated_at'];
        $result = [
            'data' => Task::where([
                'status' => 1,
                'id' => $id
            ])->get($columns),
            'status' => 'success'
        ];
        
        return $result;
    }

    /**
     * 
     * @param Request $request
     * 
     * @return Task
     */
    public function create(Request $request)
    {
        $task = new Task();
        $task->title = $request->post('title');
        $task->description = $request->post('description');
        $task->status = $request->post('status');
        
        $task->save();
        
        return $task;
    }

    /**
     * 
     * @param Request $request
     * @param int $id
     * 
     * @return Task
     */
    public function update(Request $request, int $id)
    {
        $task = Task::find($id);
        
        if (!empty($task)) {
            if ($request->post('title'))
                $task->title = $request->post('title');
            if ($request->post('description'))
                $task->description = $request->post('description');
            if ($request->post('status'))
                $task->status = $request->post('status');
        }
        
        $task->save();

        return $task;
    }

    /**
     * 
     * @param int $id
     * 
     * @return bool
     */
    public function delete(int $id)
    {
        $task = Task::find($id);
        
        if (!empty($task)) {
            $task->delete();
        }

        return true;
    }
}
