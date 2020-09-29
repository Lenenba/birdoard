@extends('layouts.app')

@section('content')

        <header class="flex items-center mb-3 py-4">
                <div class="flex justify-between  items-end w-full">
                    <p class="break">
                       <a href="/projects" class="no-underline break"> My Projects</a> / {{ $project->title }}
                    </p>

                    <div class="flex items-center">
                        @foreach ($project->members as $member)

                            <img src="{{ gravatar_url($member->email) }}" 
                                 alt="{{ $member->name }}'s avatars" 
                                 class="rounded-full mr-2" 
                                 width="40" height="40" >

                        @endforeach

                            <img src="{{ gravatar_url($project->owner->email) }}" 
                                 alt="{{ $project->owner->name }}'s avatars" 
                                 class="rounded-full mr-2" 
                                 width="40" height="40" >

                        <a href="{{ $project->path(). '/edit' }}" class="buttonV ml-4">Edit Project</a>
                    </div>                    
                </div>
        </header>

        <main>
            <div class="lg:flex -mx-3 justify-begin">
                <div class="lg:w-3/4 px-3">
                    <div class="mb-8">

                        <h2 class="break text-lg mb-3">Task</h2>

                        <!-- tasks -->
                        @foreach($project->tasks as $task)

                                <div class="card mb-3">
                                    
                                    <form action="{{ $task->path() }}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <div class="flex">
        
                                            <input name="body" value="{{ $task->body }}" class="w-full {{ $task->completed ? 'text-gray-500' : '' }} ">  
                                            <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }} >

                                        </div>
                                       
                                    </form>
                                </div>

                        @endforeach

                            <div class="card mb-3">
                                    <form action="{{ $project->path() . '/tasks' }}" method="POST">
                                            @csrf
                                            <input placeholder="add a New task....." class="w-full" name="body">
                                    </form>
                             </div>

                    </div>
                    <div>

                        <h2 class="break text-lg mb-3">General Note</h2>
                        
                            <!-- General note -->
                            <form action="{{ $project->path() }}" method="post">
                                    @csrf
                                    @method('patch')


                                    <textarea class="card w-full mb-3"
                                              name="notes" 
                                               style="min-height: 200px;" 
                                               placeholder="entrer vos notes ici"
                                               >{{ $project->notes }}
                                </textarea> 

                                <button type="submit" class="buttonV">save</button>
                            </form>
                            @if ($errors->any())

                                <div class="fields mt-6">
                                    @foreach ($errors->all() as $error)
                                    
                                        <li class="text-sm text-red">{{ $error }}</li>

                                    @endforeach
                                </div>

                            @endif
                        
                    </div>  
                </div>

 
                <div class="lg:w-1/4 px-3 lg:py-8">
                   @include('projects._card')
                   
                   @include('projects.activity._card')

                </div>

            </div>
        </main>


@endsection