@extends('layouts.app')

@section('content')
    <div class="w-full max-w-4xl">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" action="{{ route('projects.store') }}">
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

            <div class="flex items-center justify-between">
                <button type="submit" class="btn btn-primary">Create</button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                   href="/projects">Cancel</a>
            </div>
        </form>
    </div>
@endsection
