<?php
namespace App\Repository;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskRepository{

    public function __construct()
    {
        if (!Auth::user()){
            throw new \Exception('You have to be logged in');
        }
    }

    public function getTasksOfCurrentUser(){
        $userId = Auth::id();
        return Task::where('user_id',$userId)->get();
    }

    public function getTasksCountOfCurrentUser(){
        return count($this->getTasksOfCurrentUser());
    }
}
