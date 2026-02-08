<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

/**
 * Description of TaskController
 */
class TaskController
{
    /**
     * 
     * @return array
     */
    public function index() : array
    {
        $columns = ['title', 'created_at'];
        $result = [
            'data' => Task::where([
                'status' => 1
            ])->get($columns)
        ];
        
        return $result;
    }

    /**
     * 
     * @param int $id
     * 
     * @return array
     */
    public function show(int $id) : array
    {
        $columns = ['title', 'description', 'created_at', 'updated_at'];
        $result = [
            'data' => Task::where([
                'status' => 1,
                'id' => $id
            ])->get($columns)
        ];
        
        return $result;
    }

    /**
     * 
     * @param TaskRequest $request
     * 
     * @return Task|false
     */
    public function create(TaskRequest $request) : Task|false
    {
        $task = new Task();
        $validateTask = $request->validate($request->rules());
        
        if ($validateTask) {
            $task->title = $request->post('title');
            $task->description = $request->post('description');
            $task->status = $request->post('status');
            $task->save();
        
            return $task;
        }
        
        return false;
    }

    /**
     * 
     * @param TaskRequest $request
     * @param int $id
     * 
     * @return Task
     */
    public function update(TaskRequest $request, int $id) : Task
    {
        $task = Task::find($id);
        $validateTask = $request->validate($request->rules());
        
        if ($validateTask) {
            if ($request->post('title'))
                $task->title = $request->post('title');
            if ($request->post('description'))
                $task->description = $request->post('description');
            if ($request->post('status'))
                $task->status = $request->post('status');
            
            $task->save();
        }

        return $task;
    }

    /**
     * 
     * @param int $id
     * 
     * @return bool
     */
    public function delete(int $id) : bool
    {
        $task = Task::find($id);
        if (!empty($task)) {
            $task->delete();
        }

        return true;
    }
}
