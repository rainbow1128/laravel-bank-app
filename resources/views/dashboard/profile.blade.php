<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')
    @extends('dashboard')

    @section('message')
        @if (session('success'))
            <div>
                {{ session('success') }}
            </div>
        @else 
            <div>
                unsuccessful
            </div>
        @endif
    @endsection

    @section('dashboard-content')
        <h1> User profile </h1>

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('patch')
            <input type="text" name="name" value="{{ $user->name }}">
            <input type="text" name="email" value="{{ $user->email }}">
            <input type="submit" value="update">
        </form>
    @endsection
</body>
</html>
