<?php

namespace App\Http\Controllers;

use App\Models\Task;

/**
 * Description of TaskController
 */
class TaskController
{
    public function index()
    {
//        $columns = ['*'];
        $columns = ['title', 'description', 'created_at'];
        $result = [
            'data' => Task::where([
                'status' => 1
            ])->get($columns),
            'status' => 'success'
        ];
        
        return $result;
    }
    
    public function show($id)
    {
        die('show task' . $id);
    }
    
    public function create()
    {
        die('create task');
    }
    
    public function update($id)
    {
        die('update task');
    }
    
    public function delete($id)
    {
        die('delete task');
    }
}
