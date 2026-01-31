<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TasksTableSeeder extends Seeder
{
    private $data = [
        [
            'Заголовок 1', 'Описание первой задачи.'
        ],
        [
            'Заголовок 2', 'Описание второй задачи.'
        ],
        [
            'Заголовок 3', 'Описание третьей задачи.'
        ],
        [
            'Заголовок 4', 'Описание четвертой задачи.'
        ],
        [
            'Заголовок 5', 'Описание пятой задачи.'
        ],
    ];
    
    public function run(): void
    {
        foreach ($this->data as $element) {
            Task::create([
                'title' => $element[0],
                'description' => $element[1],
                'status' => 1
            ]);
        }
    }
}
