<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1> create a Exercise</h1>
    <div>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
<form method="post" action="{{route('exercise.store')}}">
    @csrf
    @method('post')
    <div>
        <label>Name of the exercise:</label>
        <input type="text" name="name" placeholder="Example: Benchpress" />
    </div>
    <div>
        <label>Username:</label>
        <input type="text" name="username" placeholder="Enter username" />
    </div>
    <div>
        <label>Muscle group:</label>
        <input type="text" name="muscle" placeholder="Which muscles are being trained?" />
    </div>
    <div>
        <label>Description:</label>
        <input type="text" name="description" placeholder="How do you perform the exercise?"/>
    </div>
    <div>
        <input type="submit" value="Save a New Exercise" />
    </div>
</form>
</body>
</html>

