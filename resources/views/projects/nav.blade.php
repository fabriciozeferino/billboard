
{{--<nav class="navbar navbar-light bg-light">
    <div class="col-sm-8">
        <a class="text-muted breadcrumb-item" >My Projects @if(isset($project)) / {{ $project->title }} @endif</a>
    </div>
    <div class="col-sm-4">
        @if (Route::current()->getName() == 'projects.show')
            <a class="nav-link btn btn-primary btn-sm float-right" href="{{ route('projects.edit', $project) }}">Edit Project</a>
        @else
            <a class="nav-link btn btn-primary btn-sm float-right" href="{{ route('projects.create') }}">New Project</a>
        @endif
    </div>
</nav>
<hr class="p-0 mt-0">--}}

