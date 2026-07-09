<!DOCTYPE html>
<html>
<head>

    <title>Login</title>

    <style>

        body{
            font-family:Arial;
            background:#f5f5f5;
        }

        .container{
            width:400px;
            margin:60px auto;
            background:#fff;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,.2);
        }

        input{
            width:100%;
            padding:10px;
            margin-bottom:15px;
        }

        button{
            width:100%;
            padding:10px;
            background:#28a745;
            color:white;
            border:none;
            cursor:pointer;
        }

        .error{
            color:red;
        }

        a{
            text-decoration:none;
        }

    </style>

</head>

<body>

<div class="container">

    <h2>Login</h2>

    @if ($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">

        @csrf

        <input
            type="email"
            name="email"
            placeholder="Email"
            value="{{ old('email') }}"
            required
        >

        <input
            type="password"
            name="password"
            placeholder="Password"
            required
        >

        <label>
            <input
                type="checkbox"
                name="remember"
            >
            Remember Me
        </label>

        <br><br>

        <button type="submit">
            Login
        </button>

    </form>

    <br>

    @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">
            Forgot Password?
        </a>
    @endif

    <br><br>

    <a href="{{ route('register') }}">
        Create Account
    </a>

</div>

</body>

</html>