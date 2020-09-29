@extends('layouts.app')

@section('content')

    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between  items-end w-full">
            <h2 class="break">My Project</h2>
            <a href="/projects/create" class="buttonV">New Project</a>
        </div>
    </header>

    <main class="flex flex-wrap -mx-3">
        @forelse ($projects as $project)
            <div class="w-1/3 px-3 pb-6">
                @include('projects._card')
            </div>
        @empty
            <div>No Project Yet</div>

        @endforelse

    </main>


@endsection