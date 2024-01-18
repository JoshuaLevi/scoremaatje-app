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

<h1> IS NOT ADMIN - EXERCISES - ID: {{$user_id}}</h1>
<div>
    @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
    @endif
</div>
<div>
    <div>
        <a href="{{route('exercise.create')}}">Upload a Exercise</a>
    </div>
</div>
<div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Exercise</th>
            <th>Username</th>
            <th>Muscle Group</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($exercises as $exercise)
            <tr>
                <td>{{$exercise->id}}</td>
                <td>{{$exercise->name}}</td>
                <td>{{$exercise->username}}</td>
                <td>{{$exercise->muscle}}</td>
                <td>{{$exercise->description}}</td>
                <td>
                    <a href="{{route('exercise.edit', ['exercise' => $exercise])}}">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{route('exercise.destroy', ['exercise' => $exercise])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete Exercise"/>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>
