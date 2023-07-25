<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')
    
    @section('errors')
        @if (Session::has('failed'))
            <div class="error-message">
                {{Session::get('failed')}}
            </div>
        @endif
    @endsection

    @section('success')
        @if (Session::has('success'))
            <div class="success-message">
                {{Session::get('success')}}
            </div>
        @endif
    @endsection

    @section('content')
        <h1> Login here </h1> 

       

        <div>
            <form action="/login" method="POST">
                @csrf

                <div>
                    <input type="text" name="name" placeholder="please enter your name">
                </div>
        
                <div>
                    <input type="password" name="password" placeholder="please enter your password">
                </div>
                <div>
                    <input type="submit" name="login" value="login">
                </div>
            </form>

            <p> Don't have an account? <a href="/signup"> Sign up </a></p>
        </div>
    @endsection
</body>
</html>


