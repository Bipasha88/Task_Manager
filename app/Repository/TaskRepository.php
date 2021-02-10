<?php
namespace App\Repository;

use App\Models\Task;
use App\Traits\AuthTrait;
use Illuminate\Support\Facades\Auth;

class TaskRepository{
    use AuthTrait;



    public function getTasksOfCurrentUser(){

        $userId = Auth::id();
        return Task::where('user_id',$userId)
            ->orderBy('end_time', 'asc')
            ->get();
    }

    public function getTasksCountOfCurrentUser(){

        return count($this->getTasksOfCurrentUser());
    }
    public function getRecentTasksOfCurrentUser($noOfTask=5){

        return $this->getTasksOfCurrentUser()->take($noOfTask);
    }

    public function createTask($task){
        $endTime=(new \DateTime($task['end_time']))->format('Y:m:d h:i:s');
        $userId=Auth::id();
        $task=Task::create([
            "name"=>$task['name'],
            "description"=>$task['description'],
            "end_time"=>$task['end_time'],
            "user_id"=>$userId,
        ]);

        if (!$task){
            throw new \Exception('Failure to save task');
        }
        else
            return $task;


    }
}
