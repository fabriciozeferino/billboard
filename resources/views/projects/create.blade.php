@extends('layouts.app')

@section('content')
    <form class="" method="post" action="{{ route('projects.store') }}">
        @csrf

        <h1>Create new Project</h1>

        <div class="form-group">
            <label class="col-form-label" for="title">Title</label>

            <div>
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                       value="{{ old('title') }}" {{--required--}} autofocus>

                @error('title')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-form-label" for="description">Description</label>

            <div>
                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                          name="description" value="{{ old('description') }}" {{--required--}}
                          autofocus rows="3"></textarea>

                @error('description')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="/projects">Cancel</a>
    </form>
@endsection
