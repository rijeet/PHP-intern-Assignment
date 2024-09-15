<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container mt-5">
    <h1>Edit Task</h1>

    <form action="{{ route('updateTask', $task->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="task" class="form-label">Task</label>
            <input type="text" name="task" id="task" class="form-control" value="{{ $task->task }}" required>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="completed" id="completed" class="form-check-input" {{ $task->completed ? 'checked' : '' }}>
            <label for="completed" class="form-check-label">Completed</label>
        </div>
        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
