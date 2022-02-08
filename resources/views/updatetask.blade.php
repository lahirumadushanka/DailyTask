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
            <form method = "post"  action="/updateTask">
                {{csrf_field()}}
                <input type="text" class="form-control" name="task" value="{{$taskData->task}}"/>
                <input type="hidden" name="id" value="{{$taskData->id}}">
                <br/>
                <input type="submit" class="btn btn-primary" value="UPDATE"/>
                <input type="button" class="btn btn-warning" value="CANCEL"/>
            </form>


        </div>
    </div>

</body>
</html>
