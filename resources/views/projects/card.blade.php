<div class="card bg-white rounded shadow-sm border-0">
    <div class="card-body p-3">
        <h6 class="card-title font-weight-bold">{{ $project->title }}</h6>
        <p class="card-text">{{ $project->description }}</p>
        <a href="{{ $project->path() }}" class="stretched-link"></a>
    </div>
</div>
