<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Register</title>
</head>

<body>
    <div class="login">
        <div class="login-triangle"></div>

        <h2 class="login-header">Register</h2>

        <form class="login-container" method="POST" action="{{ route('register.user') }}">
            @csrf
            <p><input type="text" placeholder="Name" name="name"></p>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <p><input type="email" placeholder="Email" name="email"></p>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <p><input type="password" placeholder="Password" name="password"></p>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <p><input type="password" placeholder="Password" name="password_confirmation"></p>
            @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <p><input type="submit" value="Register"></p>
            <p><span>Already have account ? </span><a href="{{ route('login')}}">Login</a></p>

        </form>
    </div>
</body>

</html>
