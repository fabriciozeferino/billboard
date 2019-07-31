<div class="card">
    <div class="card-body">
        <h5 class="card-title font-weight-bold">{{ $project->title }}</h5>
        <p class="card-text">{{ Illuminate\Support\Str::limit($project->description, 100) }}</p>
    </div>

    <div class="card-footer">
        <a href="{{ $project->path() }}">Edit</a>
    </div>
</div>
