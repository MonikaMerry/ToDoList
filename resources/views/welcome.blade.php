<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>ToDoList</title>
</head>

<body>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <br>
                <h3>ToDo List</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- table --}}
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ url('todo-list') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="todo" value=""></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"></label>
                        <button type="submit" class="btn btn-primary">Add Task</button>
                    </div>
                </form>
            </div>

        </div><br><br><br>

        <div class="row  justify-content-center">
            <br>

            <div class="col-md-5">
                @if (Session::has('danger'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{ Session::get('danger') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @foreach ($list as $key => $item)
                    <div class="card">

                        <div class="card-body">
                            <span>{{ $key + 1 }}. {{ $item->todo }}</span>

                            <a href="{{ url('delete-todo') }}/{{ $item->id }} "style="float: right;"> <i
                                    class="bi bi-x-lg text-danger"></i></a>

                        </div>

                    </div>
                    <br>
                @endforeach


            </div>
        </div>
    </div>
</body>

</html>
