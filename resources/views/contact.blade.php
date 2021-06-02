<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My First Todo Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        th{
            text-align: center;
        }
        td{
            text-align: center;
        }
        label{
            color: white;
        }
    </style>
</head>

<body>

    <div class="container pt-3">
        <h2 class="text-center mt-2 text-white"><span style="padding: 5px 10px; border-radius: 5px; background: #007bff;">TODO APPLICATION</span></h2>
        <div class="row justify-content-center">
            <div class="col-md-6 py-3">
                <div class="card bg-success">
                    <div class="card-body">
                        <div>
                            <form
                                action="@isset($todo) {{ route('todo.update',$todo->id) }} @else {{ route('todos.create') }}@endisset"
                                method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Name:*</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name"
                                                value="@isset($todo){{ $todo->name }}@endisset">
                                            @error('name')
                                            <p class="text-danger">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email:*</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email"
                                                value="@isset($todo){{ $todo->email }}@endisset">
                                            @error('email')
                                            <p class="text-danger">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_no">Phone:*</label>
                                            <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Your Phone Number"
                                                value="@isset($todo){{ $todo->phone_no }}@endisset">
                                            @error('phone_no')
                                            <p class="text-danger">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">description:*</label>
                                            <textarea name="description" id="description" placeholder="Write Your Description..."
                                                class="form-control">@isset($todo){{$todo->description}}@endisset</textarea>
                                            @error('$description')
                                            <p class="text-danger"> {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    @isset($todo)
                                    Update Data
                                    @else
                                    Save Date
                                    @endisset
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">description</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todos as $key=>$todo)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $todo->name}}</td>
                                    <td>{{ $todo->email }}</td>
                                    <td>{{ $todo->phone_no }}</td>
                                    <td>{{ $todo->description }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('todo.edit',$todo->id) }}">Edit</a>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ route('todo.delete',$todo->id) }}">Delete</a>
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




</body>

</html>