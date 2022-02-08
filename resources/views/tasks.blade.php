<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1>Daily Tasks</h1>
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach
            <form method = "post"  action="/saveTask">
                {{csrf_field()}}
                <input type="text" class="form-control" name="task" placeholder="Enter Your Task Here"/>
                <br/>
                <input type="submit" class="btn btn-primary" value="SAVE"/>
                <input type="button" class="btn btn-warning" value="CLEAR"/>
            </form>
            <br/>

            <table class="table table-dark">
                <th>ID</th>
                <th>Task</th>
                <th>Completed</th>
                <th>Action</th>
                @foreach($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->task}}</td>
                    <td>
                        @if($task->isCompleted)
                            <button class="btn btn-success">Completed</button>
                        @else
                            <button class="btn btn-warning">Not Completed</button>
                        @endif
                    </td>
                    <td>
                        @if(!$task->isCompleted)
                            <a href="/markAsCompleted/{{$task->id}}" class="btn btn-primary">Mark as Completed</a>
                        @else
                            <a href="/markAsNotCompleted/{{$task->id}}" class="btn btn-danger">Mark as Not Completed</a>
                        @endif
                            <a href="/deleteTask/{{$task->id}}" class="btn btn-warning">Delete</a>
                            <a href="/updatetaskview/{{$task->id}}" class="btn btn-primary">Update</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</body>
</html>
