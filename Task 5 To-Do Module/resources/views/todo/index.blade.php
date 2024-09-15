<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container mt-5">
    <h1>To-Do Lists</h1>

   
    <form action="{{ route('storeList') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">List Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter list name" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create List</button>
    </form>

    <hr>

   
    @foreach ($lists as $list)
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h3>{{ $list->name }} ({{ $list->date }})</h3>
                    <a href="{{ route('editList', $list->id) }}" class="btn btn-warning btn-sm">Edit List</a>
                </div>
                <form action="{{ route('deleteList', $list->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete List</button>
                </form>
            </div>
            <div class="card-body">
             
                <form action="{{ route('storeTask', $list->id) }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="task" class="form-control" placeholder="New task" required>
                        <button type="submit" class="btn btn-success">Add Task</button>
                    </div>
                </form>

               
                <ul class="list-group">
                    @foreach ($list->tasks as $task)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                               
                               
                                <form action="{{ route('updateTask', $task->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="completed" value="0"> 
                                    <input type="checkbox" name="completed" value="1" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                                </form>

                                <span @if($task->completed) style="text-decoration: line-through;" @endif>{{ $task->task }}</span>
                            </div>

                            <div>
                               
                                <a href="{{ route('editTask', $task->id) }}" class="btn btn-warning btn-sm">Edit Task</a>
                              
                                <form action="{{ route('deleteTask', $task->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
