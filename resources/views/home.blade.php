{{--@extends('layouts.app')--}}


{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}--}}
{{--                </div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}


@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('crud-content')
    <h1 class="mt-5">Exercises</h1>
    <div class="mb-3">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('exercise.create') }}">Upload an Exercise</a>
        </div>
    </div>
    <div>
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Exercise</th>
                <th>Username</th>
                <th>Muscle Group</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($exercises as $exercise)
                <tr>
                    <td>{{ $exercise->id }}</td>
                    <td>{{ $exercise->name }}</td>
                    <td>{{ $exercise->username }}</td>
                    <td>{{ $exercise->muscle }}</td>
                    <td>{{ $exercise->description }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('exercise.edit', ['exercise' => $exercise]) }}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('exercise.destroy', ['exercise' => $exercise]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete Exercise</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

