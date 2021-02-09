<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repository\TaskRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    private $taskRepository;
    public function __construct(TaskRepository $taskRepository)
    {
        $this->middleware('auth');
        $this->taskRepository=$taskRepository;
    }

    public function list(){

        $tasks=$this->taskRepository->getTasksOfCurrentUser();

        return view('home',compact('tasks'));
    }

    public function create(){

        return view('tasks.create');
    }

    public function save(Request $request){

        dd($request);
    }
}
