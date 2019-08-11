@extends('layouts.app')

@section('content')

    @include('projects.nav')

    <div class="row justify-content-between">
        <div class="col-sm-8">

            @include('projects.task')

            <div class="card border-0 shadow-sm rounded">
                <div class="card-body py-3">
                    <form method="POST" action="{{ url($project->path()) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="notes" class="text-muted">General
                                Notes</label>
                            <textarea class="form-control border-1 @error('notes') is-invalid @enderror" id="notes"
                                      name="notes" placeholder="Notes..."
                                      rows="5" cols="3">{{ old('notes') ?: $project->notes }}</textarea>
                        </div>
                        @error('notes')
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror

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

    @include('projects.activity')

@endsection
