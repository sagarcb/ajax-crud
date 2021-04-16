<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Laravel and Ajax Crud Application</title>

</head>
<body>
<header class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Welcome to Laravel and Ajax Crud Application</h1>
                <hr>
            </div>
        </div>
    </div>
</header>

<section class="body">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">All Tasks</h3>
                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTask">Create Task</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Task Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="taskTableBody">
                            @foreach($tasks as $task)
                            <tr data-id="{{$task->id}}">
                                <td>{{$task->id}}</td>
                                <td class="task-name">{{$task->name}}</td>
                                <td style="width: 150px">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editTask" class="btn btn-primary btn-sm edit">Edit</a>
                                    <a href="#" data-id="{{$task->id}}" class="btn btn-danger btn-sm delete">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Create Task Modal -->
<div class="modal fade" id="createTask" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="createTaskForm" action="{{url('task/store')}}" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="createTaskLabel">Create Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="createTaskMessage">

                </div>
                <div class="form-group">
                    <label for="taskName">Enter Task Name</label>
                    <input type="text" name="name" id="taskName" class="form-control" placeholder="Enter Task Name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create Task</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{--Create Task Modal edns--}}

{{--Edit Task Modal Start--}}
<div class="modal fade" id="editTask" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editTaskLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="editTaskForm" action="{{url('task/store')}}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTaskLabel">Edit Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editTaskMessage">

                    </div>
                    <div class="form-group">
                        <label for="taskName">Enter Task Name</label>
                        <input type="text" name="name" id="taskName" class="form-control" placeholder="Enter Task Name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update Task</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{--Edit Task Modal End--}}

{{--Delete Task Modal starts--}}

{{--<div class="modal fade" id="deleteTask" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteTaskLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="deleteTaskForm" action="{{url('task/store')}}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteTaskLabel">Delete Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <h4>Are you sure want to Delete this TODO?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete Task</button>
                </div>
            </form>
        </div>
    </div>
</div>--}}

{{--Delete Task Modal Ends--}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
<script src="{{asset('js')}}/main.js"></script>
</body>
</html>

