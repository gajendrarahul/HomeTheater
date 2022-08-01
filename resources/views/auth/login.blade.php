<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Login</title>
</head>

<body>
    <div class="login">
        <div class="login-triangle"></div>
        @if (Session::get('success'))
            <span style="color:green">{{ Session::get('success') }}</span>
        @endif
        @if (Session::get('error'))
            <span style="color:red">{{ Session::get('error') }}</span>
        @endif
        <h2 class="login-header">Login</h2>

        <form class="login-container" method="POST" action="{{ route('authenticate') }}">
            @csrf
            <p><input type="email" placeholder="Email" name="email"></p>
            <p><input type="password" placeholder="Password" name="password"></p>
            <p><input type="submit" value="Log in"></p>
            <p><span>Don't have account ? </span><a href="{{ route('register-form')}}">Register</a></p>
        </form>
    </div>
</body>

</html>
