@extends('layouts.app')

@section('content')

    @include('projects.nav')

    <div class="container-fluid">
        <div class="row py-3">
            <div class="col-sm-8">

                @include('projects.task')
            </div>
            <div class="col-sm-4">
                @include('projects.card')
            </div>
        </div>
    </div>
    <a href="/projects" class="btn btn-primary">Back</a>

@endsection
