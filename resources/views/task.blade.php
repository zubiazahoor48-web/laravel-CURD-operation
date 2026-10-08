<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Task Manager</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        body {
            background: #f5f7fb;
            color: #1f2937;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        .page-wrapper {
            min-height: 100vh;
            padding: 40px 0 60px;
        }

        /* Header */
        .page-header {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            color: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(79, 70, 229, 0.18);
        }

        .page-header h1 {
            font-weight: 700;
            margin-bottom: 6px;
        }

        .page-header p {
            margin-bottom: 0;
            opacity: 0.88;
        }

        .header-icon {
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.16);
            border-radius: 16px;
            font-size: 27px;
        }

        /* Cards */
        .custom-card {
            background: white;
            border: none;
            border-radius: 18px;
            box-shadow: 0 5px 22px rgba(15, 23, 42, 0.07);
            overflow: hidden;
        }

        .card-heading {
            padding: 22px 24px;
            border-bottom: 1px solid #eef0f4;
        }

        .card-heading h4 {
            margin: 0;
            font-size: 19px;
            font-weight: 700;
        }

        .card-heading p {
            margin: 5px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        .card-body-custom {
            padding: 25px;
        }

        /* Form */
        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-control {
            border: 1px solid #dfe3eb;
            border-radius: 10px;
            padding: 11px 13px;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.12);
        }

        textarea.form-control {
            resize: vertical;
        }

        /* Buttons */
        .btn-primary-custom {
            background: #4f46e5;
            border-color: #4f46e5;
            color: white;
            border-radius: 10px;
            padding: 10px 18px;
            font-weight: 600;
        }

        .btn-primary-custom:hover {
            background: #4338ca;
            border-color: #4338ca;
            color: white;
        }

        .btn-success-custom {
            background: #059669;
            border-color: #059669;
            color: white;
            border-radius: 10px;
            padding: 10px 18px;
            font-weight: 600;
        }

        .btn-success-custom:hover {
            background: #047857;
            border-color: #047857;
            color: white;
        }

        .btn-edit {
            background: #eef2ff;
            color: #4f46e5;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            padding: 7px 12px;
        }

        .btn-edit:hover {
            background: #e0e7ff;
            color: #4338ca;
        }

        .btn-delete {
            background: #fef2f2;
            color: #dc2626;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            padding: 7px 12px;
        }

        .btn-delete:hover {
            background: #fee2e2;
            color: #b91c1c;
        }

        /* Table */
        .table-wrapper {
            overflow-x: auto;
        }

        .custom-table {
            margin-bottom: 0;
        }

        .custom-table thead th {
            background: #f8fafc;
            color: #64748b;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            font-weight: 700;
            border-bottom: 1px solid #e5e7eb;
            padding: 15px 18px;
            white-space: nowrap;
        }

        .custom-table tbody td,
        .custom-table tbody th {
            padding: 16px 18px;
            vertical-align: middle;
            border-color: #eef0f4;
        }

        .custom-table tbody tr {
            transition: background 0.2s ease;
        }

        .custom-table tbody tr:hover {
            background: #fafbff;
        }

        .task-number {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            background: #eef2ff;
            color: #4f46e5;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 13px;
        }

        .task-title {
            font-weight: 650;
            color: #1f2937;
        }

        .task-description {
            color: #6b7280;
            max-width: 450px;
        }

        /* Empty state */
        .empty-state {
            padding: 50px 20px;
            text-align: center;
            color: #6b7280;
        }

        .empty-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 15px;
            border-radius: 18px;
            background: #eef2ff;
            color: #6366f1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .empty-state h5 {
            color: #374151;
            font-weight: 700;
        }

        /* Alerts */
        .alert {
            border: none;
            border-radius: 12px;
        }

        /* Section spacing */
        .section-title {
            font-size: 14px;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        /* Responsive */
        @media (max-width: 767px) {
            .page-wrapper {
                padding: 20px 0 40px;
            }

            .page-header {
                padding: 24px;
                border-radius: 16px;
            }

            .page-header h1 {
                font-size: 25px;
            }

            .card-body-custom {
                padding: 20px;
            }

            .action-buttons {
                flex-direction: column;
                align-items: stretch !important;
            }

            .action-buttons form,
            .action-buttons a,
            .action-buttons button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    @include('components.user')

    <div class="page-wrapper">

        <div class="container">

            <!-- =========================
                 PAGE HEADER
            ========================== -->
            <div class="page-header">

                <div class="d-flex align-items-center gap-3">

                    <div class="header-icon">
                        <i class="bi bi-check2-square"></i>
                    </div>

                    <div>
                        <h1>Task Manager</h1>
                        <p>Create, manage and organize your tasks easily.</p>
                    </div>

                </div>

            </div>


            <!-- =========================
                 SUCCESS / ERROR MESSAGE
            ========================== -->

            @if(session('success'))
                <div class="alert alert-success d-flex align-items-center gap-2 mb-4">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger d-flex align-items-center gap-2 mb-4">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif


            <!-- =========================
                 ADD TASK + TASK LIST
            ========================== -->

            <div class="row g-4">

                <!-- ADD TASK -->
                <div class="col-lg-4">

                    <div class="custom-card">

                        <div class="card-heading">
                            <div class="d-flex align-items-center gap-2">

                                <i class="bi bi-plus-circle text-primary fs-5"></i>

                                <div>
                                    <h4>Add New Task</h4>
                                    <p>Create a new task to your list.</p>
                                </div>

                            </div>
                        </div>

                        <div class="card-body-custom">

                            <form action="/task" method="POST">

                                @csrf

                                <!-- Task Name -->
                                <div class="mb-3">

                                    <label for="task_name" class="form-label">
                                        Task Name
                                    </label>

                                    <input
                                        type="text"
                                        id="task_name"
                                        class="form-control"
                                        name="Task_name"
                                        value="{{ old('Task_name') }}"
                                        placeholder="e.g. Complete project report"
                                    >

                                    @error('Task_name')
                                        <div class="text-danger small mt-2">
                                            <i class="bi bi-exclamation-circle me-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                <!-- Description -->
                                <div class="mb-4">

                                    <label for="description" class="form-label">
                                        Description
                                    </label>

                                    <textarea
                                        id="description"
                                        class="form-control"
                                        name="Description"
                                        rows="5"
                                        placeholder="Describe your task..."
                                    >{{ old('Description') }}</textarea>

                                    @error('Description')
                                        <div class="text-danger small mt-2">
                                            <i class="bi bi-exclamation-circle me-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                <button
                                    type="submit"
                                    class="btn btn-primary-custom w-100"
                                >
                                    <i class="bi bi-plus-lg me-2"></i>
                                    Add Task
                                </button>

                            </form>

                        </div>

                    </div>

                </div>


                <!-- TASK LIST -->
                <div class="col-lg-8">

                    <div class="custom-card">

                        <div class="card-heading">

                            <div class="d-flex justify-content-between align-items-center gap-3">

                                <div>
                                    <h4>Task List</h4>
                                    <p>View and manage all your tasks.</p>
                                </div>

                                <span class="badge text-bg-light border px-3 py-2">
                                    {{ $tasks->count() }} Tasks
                                </span>

                            </div>

                        </div>


                        <div class="table-wrapper">

                            @if($tasks->count() > 0)

                                <table class="table custom-table">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Task</th>
                                            <th>Description</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($tasks as $index => $item)

                                            <tr>

                                                <td>
                                                    <span class="task-number">
                                                        {{ $index + 1 }}
                                                    </span>
                                                </td>

                                                <td>
                                                    <div class="task-title">
                                                        {{ $item->Task_name }}
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="task-description">
                                                        {{ $item->Description }}
                                                    </div>
                                                </td>

                                                <td>

                                                    <div class="d-flex justify-content-end gap-2 action-buttons">

                                                        <!-- Edit -->
                                                        <a
                                                            href="/task/{{ $item->id }}/edit"
                                                            class="btn btn-edit"
                                                        >
                                                            <i class="bi bi-pencil-square me-1"></i>
                                                            Edit
                                                        </a>


                                                        <!-- Delete -->
                                                        <form
                                                            action="/task/{{ $item->id }}"
                                                            method="POST"
                                                            class="d-inline"
                                                            onsubmit="return confirm('Are you sure you want to delete this task?');"
                                                        >

                                                            @csrf
                                                            @method('DELETE')

                                                            <button
                                                                type="submit"
                                                                class="btn btn-delete"
                                                            >
                                                                <i class="bi bi-trash3 me-1"></i>
                                                                Delete
                                                            </button>

                                                        </form>

                                                    </div>

                                                </td>

                                            </tr>

                                        @endforeach

                                    </tbody>

                                </table>

                            @else

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        <i class="bi bi-clipboard-x"></i>
                                    </div>

                                    <h5>No Tasks Yet</h5>

                                    <p class="mb-0">
                                        Add your first task using the form.
                                    </p>

                                </div>

                            @endif

                        </div>

                    </div>

                </div>

            </div>


            <!-- =========================
                 EDIT TASK
            ========================== -->

            @if(isset($task))

                <div class="custom-card mt-4 mb-5">

                    <div class="card-heading">

                        <div class="d-flex align-items-center gap-2">

                            <i class="bi bi-pencil-square text-success fs-5"></i>

                            <div>
                                <h4>Edit Task</h4>
                                <p>Update the selected task details.</p>
                            </div>

                        </div>

                    </div>


                    <div class="card-body-custom">

                        <form
                            action="/task/{{ $task->id }}"
                            method="POST"
                        >

                            @csrf
                            @method('PUT')


                            <div class="row g-4">

                                <!-- Task Name -->
                                <div class="col-md-5">

                                    <label for="edit_task_name" class="form-label">
                                        Task Name
                                    </label>

                                    <input
                                        type="text"
                                        id="edit_task_name"
                                        class="form-control"
                                        name="Task_name"
                                        value="{{ old('Task_name', $task->Task_name) }}"
                                        placeholder="Enter task name"
                                    >

                                    @error('Task_name')
                                        <div class="text-danger small mt-2">
                                            <i class="bi bi-exclamation-circle me-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                <!-- Description -->
                                <div class="col-md-7">

                                    <label for="edit_description" class="form-label">
                                        Description
                                    </label>

                                    <textarea
                                        id="edit_description"
                                        class="form-control"
                                        name="Description"
                                        rows="3"
                                        placeholder="Enter description"
                                    >{{ old('Description', $task->Description) }}</textarea>

                                    @error('Description')
                                        <div class="text-danger small mt-2">
                                            <i class="bi bi-exclamation-circle me-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>


                            <div class="d-flex justify-content-end mt-4">

                                <button
                                    type="submit"
                                    class="btn btn-success-custom"
                                >
                                    <i class="bi bi-check2 me-2"></i>
                                    Update Task
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            @endif

        </div>

    </div>


    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>
