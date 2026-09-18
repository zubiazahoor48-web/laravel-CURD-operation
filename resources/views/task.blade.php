<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Task Manager</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  @include('components.user')

    <!-- Add Task -->
    <div class="container mt-5">

        <h1>Add Tasks</h1>

        <div class="container mt-4">

            <form action="/task" method="POST">
                @csrf

                <!-- Task Name -->
                <div class="mb-3">
                    <label for="task_name" class="form-label">
                        Task Name
                    </label>

                    <input 
                        type="text" 
                        class="form-control" 
                        name="Task_name" 
                        value="{{ old('Task_name') }}"
                        placeholder="Enter task name">

                    @error('Task_name')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">
                        Description
                    </label>

                    <textarea 
                        class="form-control" 
                        name="Description" 
                        rows="3"
                        placeholder="Enter description">{{ old('Description') }}</textarea>

                    @error('Description')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Add Task
                </button>

            </form>

        </div>


        <!-- Task List -->
        <h1 class="mt-5 mb-4">Task List</h1>

        <table class="table table-bordered table-striped table-hover">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($tasks as $index => $item)

                    <tr>
                        <th scope="row">
                            {{ $index + 1 }}
                        </th>

                        <td>
                            {{ $item->Task_name }}
                        </td>

                        <td>
                            {{ $item->Description }}
                        </td>

                        <td>

                            <a 
                                href="/task/{{ $item->id }}/edit"
                                class="btn btn-sm btn-primary">
                                Edit
                            </a>

                            <form 
                                action="/task/{{ $item->id }}" 
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button 
                                    type="submit" 
                                    class="btn btn-sm btn-danger">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>


    <!-- Edit Task Form -->
    @if(isset($task))

        <div class="container mt-5 mb-5">

            <h1>Edit Task</h1>

            <div class="container mt-4">

                <form action="/task/{{ $task->id }}" method="POST">

                    @csrf
                    @method('PUT')

                    <!-- Task Name -->
                    <div class="mb-3">

                        <label for="task_name" class="form-label">
                            Task Name
                        </label>

                        <input 
                            type="text" 
                            class="form-control" 
                            name="Task_name"
                            value="{{ old('Task_name', $task->Task_name) }}"
                            placeholder="Enter task name">

                        @error('Task_name')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- Description -->
                    <div class="mb-3">

                        <label for="description" class="form-label">
                            Description
                        </label>

                        <textarea 
                            class="form-control" 
                            name="Description" 
                            rows="3"
                            placeholder="Enter description">{{ old('Description', $task->Description) }}</textarea>

                        @error('Description')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <button 
                        type="submit" 
                        class="btn btn-success">
                        Update
                    </button>

                </form>

            </div>

        </div>

    @endif


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>