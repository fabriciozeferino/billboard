@extends('layouts.app')

@section('content')
    <div class="w-full max-w-4xl">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post"
              action="{{ route('projects.store') }}">
            @csrf

            <h1 class="mb-6 font-bold text-xl">Create new Project</h1>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
                <div>
                    <input id="title" type="text"
                           class="form-input mt-1 block w-full @error('title') border border-red-500 @enderror" name="title"
                           value="{{ old('title') }}" {{--required--}} autofocus>
                    @error('title')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                <textarea id="description" type="text"
                          class="form-textarea mt-1 block w-full @error('description') border border-red-500 @enderror"
                          rows="3"
                          placeholder="Enter the project's description..."
                          name="description" value="{{ old('description') }}" {{--required--}}
                          autofocus rows="3"></textarea>

                @error('description')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="btn btn-primary">Create</button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                   href="/projects">Cancel</a>
            </div>
        </form>
    </div>
@endsection
