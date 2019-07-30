@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-light bg-light pr-0">
        <a class="navbar-brand">My Projects</a>

        <a class="nav-link btn btn-primary" href="{{ route('projects.create') }}">New Project</a>
    </nav>
    <div class="card-columns">
        @forelse ($projects as $project)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">{{ $project->title }}</h5>
                    <p class="card-text">{{ Illuminate\Support\Str::limit($project->description, 100) }}</p>
                </div>

                <div class="card-footer">
                    <a href="{{ $project->path() }}">Edit</a>
                </div>
            </div>

        @empty
            <li>No projects yet.</li>
        @endforelse
    </div>

@endsection
