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

        return view('tasks.list',compact('tasks'));
    }

    public function create(){

        return view('tasks.create');
    }

    public function save(Request $request){

        $this->validate($request,[
            "name"=>'required|min:5|max:255',
            "description"=>'nullable|string',
            "end_time"=>'required|after:today',
        ]);
        $savedTask=$this->taskRepository->createTask($request->except('_token'));

        if ($savedTask){
            return redirect(route('task.all'));
        }
        else
            return view('404');

    }

    public function delete($id){
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('task.all');
    }
}
