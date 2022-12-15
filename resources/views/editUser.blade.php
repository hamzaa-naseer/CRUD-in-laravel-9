<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Form Validation </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">

        <h1>Update User</h1>

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif

        <!-- Way 1: Display All Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form method="POST" action="{{url('user/update/'.$user->id)}}"  enctype="multipart/form-data" >

            {{ csrf_field() }}

            <div class="mb-3">
                <label class="form-label" for="inputName">Name:</label>
                <input
                    type="text"
                    name="name"
                    id="inputName"
                    value="{{ $user->name }}"



                    class="form-control
                     @error('name') is-invalid @enderror"
                    placeholder="Name">


            </div>

            <div class="mb-3">
                <label class="form-label" for="inputPassword">Password:</label>
                <input
                    type="password"
                    name="password"
                    id="inputPassword"
                    value="{{ $user->password }}"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password">


            </div>

            <div class="mb-3">
                <label class="form-label" for="inputEmail">Email:</label>
                <input
                    type="text"
                    name="email"
                    id="inputEmail"
                    value="{{ $user->email }}"
                    class="form-control"
                    placeholder="Email">


            </div>

            <div class="mb-3">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
