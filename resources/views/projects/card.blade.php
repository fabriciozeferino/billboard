<div class="card">
    <div class="card-body p-3">
        <h5 class="card-title font-weight-bold">{{ $project->title }}</h5>
        <p class="card-text">{{ $project->description }}</p>
        <a href="{{ $project->path() }}" class="stretched-link"></a>
    </div>
</div>
