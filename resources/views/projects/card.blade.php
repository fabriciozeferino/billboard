<div class="card bg-white rounded shadow-sm border-0">
    <a href="{{ $project->path() }}">
        <div class="card-body p-3">
            <h6 class="card-title font-weight-bold">{{ $project->title }}</h6>
            <p class="card-text">{{ $project->description }}</p>
            <a href="{{ $project->path() }}">
        </div>
    </a>
    <div class="card-footer">
        <form action="{{ $project->path() }}" method="POST">
            @method("DELETE")
            @csrf
            <button type="submit" class="btn btn-danger btn-sm float-right">Delete</button>
        </form>
    </div>
</div>
