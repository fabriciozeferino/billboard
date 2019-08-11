@extends('layouts.app')

@section('content')

    @include('projects.nav')

    <div class="card-columns">
        @forelse ($projects as $project)
            @include('projects.card')
        @empty
            <ul>
                <li>No projects yet.</li>
            </ul>
        @endforelse
    </div>

@endsection
