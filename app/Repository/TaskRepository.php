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

        return $this->getTasksOfCurrentUser()->take(5);
    }
}
