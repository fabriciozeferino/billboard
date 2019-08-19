<h2 class="font-weight-bolder">Tasks</h2>
<div class="card mb-3 p-0 border-0 rounded shadow-sm">

    <form action="{{ $project->path() . '/tasks' }}" method="POST">
        @csrf
        <input type="text" name="body" class="form-control border-0" placeholder="Add new task...">
    </form>

</div>
@foreach($project->tasks as $task)
    <div class="card mb-3 rounded shadow-sm border-0">
        <form action="{{ $project->path() . '/tasks/' . $task->id }}" method="POST" class="form-row align-content">
            @method('PATCH')
            @csrf
            <div class="col-11">
                <div class="">
                    <input type="text" name="body" value="{{ $task->body }}" class="form-control border-0"
                           placeholder="Add new task...">
                </div>
            </div>

            <div class="col-1 my-auto">

                <div class="custom-control custom-checkbox  mr-1">
                    <input class="custom-control-input" id="customSwitch{{ $task->id }}" name="completed"
                           onchange="this.form.submit()" type="checkbox"
                           {{ $task->completed ? 'checked' :'' }} value="1">
                    <label class="custom-control-label" for="customSwitch{{ $task->id }}"></label>
                </div>

            </div>
        </form>
        <p class="card-text"></p>

    </div>
@endforeach
