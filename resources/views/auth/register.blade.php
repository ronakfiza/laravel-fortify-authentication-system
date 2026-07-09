<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <style>
        body{
            font-family: Arial;
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
            margin-top:10px;
            margin-bottom:15px;
        }

        button{
            width:100%;
            padding:10px;
            background:#007bff;
            color:#fff;
            border:none;
            cursor:pointer;
        }

        a{
            text-decoration:none;
        }

        .error{
            color:red;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Register</h2>

    @if ($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <input
            type="text"
            name="name"
            placeholder="Name"
            value="{{ old('name') }}"
            required
        >

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

        <input
            type="password"
            name="password_confirmation"
            placeholder="Confirm Password"
            required
        >

        <button type="submit">
            Register
        </button>

    </form>

    <br>

    <a href="{{ route('login') }}">
        Already have an account? Login
    </a>

</div>

</body>
</html>