<div class="flex flex-wrap -mx-4">
    @foreach($projects as $project)
        <project-card :project='@json($project)'></project-card>
    @endforeach
</div>
