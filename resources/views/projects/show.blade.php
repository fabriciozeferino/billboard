@extends('layouts.app')

@section('content')
    <div>
        <h1>{{ $project->title }}</h1>
        <p>{{ $project->description }}</p>
        <a href="/projects" class="btn btn-primary">Back</a>
    </div>
    test test
    @include('projects.card')
@endsection
