@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-light bg-light pr-0">
        <a class="navbar-brand">My Projects</a>

        <a class="nav-link btn btn-primary" href="{{ route('projects.create') }}">New Project</a>
    </nav>
    <div class="card-columns">
        @forelse ($projects as $project)
            @include('projects.card')
        @empty
            <li>No projects yet.</li>
        @endforelse
    </div>

@endsection
