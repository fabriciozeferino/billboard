@extends('layouts.app')

@section('content')

    @include('projects.nav')

    <div class="card-columns">
        @forelse ($projects as $project)
            @include('projects.card')
        @empty
            <li>No projects yet.</li>
        @endforelse
    </div>



@endsection
