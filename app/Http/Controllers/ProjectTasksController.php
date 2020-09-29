<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;

class ProjectTasksController extends Controller
{
    public function store(Project $project)
    {
        $this->authorize('update', $project);

        request()->validate(['body' => 'required']);

        $project->addTask(request('body'));

        return redirect($project->path());
    }

    /**
     * mis a jour du projet
     *
     * @param Project $project
     * @param Task  $task
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Project $project, Task $task)
    {
        $this->authorize('update', $task->project);

        $task->update(request()->validate(['boby' => 'required|sometimes']));

        
        request('completed') ? $task->completed() : $task->incompleted();


        // if (request('completed')) {
        //     $task->completed();
        // } else {
        //     $task->incompleted();
        // }



        // $task->update([
        //     'body' => request('body'),
        //     'completed' => request()->has('completed')
        // ]);

        return redirect($project->path());
    }
}
