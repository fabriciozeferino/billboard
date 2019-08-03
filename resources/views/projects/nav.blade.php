<nav class="navbar navbar-light bg-light px-0 py-1">
    <div class="col-sm-8">
        <a class="text-muted breadcrumb-item" >My Projects @if(isset($project)) / {{ $project->title }} @endif</a>
    </div>
    <div class="col-sm-4">
        <a class="nav-link btn btn-primary btn-sm btn-size float-right" href="{{ route('projects.create') }}">New Project</a>
    </div>
</nav>
<hr class="p-0 mt-0">

