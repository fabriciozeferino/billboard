@extends('layouts.app')

@section('content')

    @include('projects.nav')

    <div class="container-fluid">
        <div class="row py-3">
            <div class="col-sm-8">

                @include('projects.task')

                <div class="card">
                    <div class="card-body py-3">
                        <form method="POST" action="{{ url($project->path()) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="notes" class="text-muted">General Notes</label>
                                <textarea class="form-control border-1" id="notes" name="notes" placeholder="Notes..."
                                         rows="5" cols="3">{{$project->notes}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="/projects" class="btn btn-danger">Back</a>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-sm-4">
                @include('projects.card')
            </div>
        </div>
    </div>
@endsection
