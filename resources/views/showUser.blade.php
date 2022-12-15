
 <!DOCTYPE html>
 <html lang="en">
    <head>
        <title>Laravel 9 User List </title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class='container'>

        <h1>User List</h1>


        <div class="mb-3">
            <a href="{{url('/form')}}" class="btn btn-primary">Add User</a>
        </div>


        <div class="mb-10">



        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                <td>

                    <a href="{{url('user/edit/'.$user->id)}}" class="btn btn-primary">edit</a>
                    <a href="{{url('user/delete/'.$user->id)}}" class="btn btn-danger">delete</a>

                </td>
            </tr>
            @endforeach
        </table>
        </div>
    </div>

 </body>
 </html>


