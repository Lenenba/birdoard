<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Auth::user()->accessibleProjects();
        return view('projects.index', compact('projects'));
    }


    public function show(Project $project)
    {
        $this->authorize('update', $project);

        // foreach ($project->activity as $activity) {
        //     dd($activity->subject->body);
        // }
        
        
        return view('projects.show', compact('project'));
    }


    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $attributes = $this->validation();
        
        $project = auth()->user()->projects()->create($attributes);

        return redirect($project->path());
    }

    public function edit(Project $project)
    {
        return view('Projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $this->authorize('update', $project);

        $attributes = $this->validation();

        $project->update($attributes);


        return redirect($project->path());
    }



    public function destroy(Project $project)
    {
        $this->authorize('update', $project);

        $project->delete();

        return redirect('/projects');
    }



    protected function validation()
    {
        $attributes = request()->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'notes' => 'min:3',
        ]);
        return $attributes;
    }
}
