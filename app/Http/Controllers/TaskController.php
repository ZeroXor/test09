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
    
    public function create()
    {
        die('create task 1');
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
