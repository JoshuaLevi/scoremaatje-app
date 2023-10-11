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
    <h1> Edit a Exercise</h1>
    <div>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
<form method="post" action="{{route('exercise.update', ['exercise' => $exercise])}}">
    @csrf
    @method('put')
    <div>
        <label>Name of the exercise:</label>
        <input type="text" name="name" placeholder="Example: Benchpress" value="{{$exercise->name}}"/>
    </div>
    <div>
        <label>Username:</label>
        <input type="text" name="username" placeholder="Enter username" value="{{$exercise->username}}"/>
    </div>
    <div>
        <label>Muscle group:</label>
        <input type="text" name="muscle" placeholder="Which muscles are being trained?" value="{{$exercise->muscle}}"/>
    </div>
    <div>
        <label>Description:</label>
        <input type="text" name="description" placeholder="How do you perform the exercise?" value="{{$exercise->description}}"/>
    </div>
    <div>
        <input type="submit" value="Edit the Exercise" />
    </div>
</form>
</body>
</html>

