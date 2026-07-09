<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f7fc;
        }

        .navbar{
            background:#1e3a8a;
        }

        .navbar-brand{
            color:#fff;
            font-weight:bold;
        }

        .navbar-brand:hover{
            color:#fff;
        }

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
        }

        .profile-circle{
            width:80px;
            height:80px;
            background:#1e3a8a;
            color:white;
            font-size:30px;
            display:flex;
            justify-content:center;
            align-items:center;
            border-radius:50%;
            margin:auto;
        }

        .btn-primary{
            background:#1e3a8a;
            border:none;
        }

        .btn-primary:hover{
            background:#163172;
        }

        .otp-box{
            letter-spacing:10px;
            text-align:center;
            font-size:22px;
            font-weight:bold;
        }

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg">

    <div class="container">

        <a class="navbar-brand" href="#">
            Laravel Fortify
        </a>

        <div class="ms-auto">

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button class="btn btn-light">
                    Logout
                </button>

            </form>

        </div>

    </div>

</nav>


<div class="container mt-5">

    <div class="row">

        <div class="col-lg-4">

            <div class="card p-4 text-center">

                <div class="profile-circle">

                    {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                </div>

                <h4 class="mt-3">
                    {{ auth()->user()->name }}
                </h4>

                <p class="text-muted">
                    {{ auth()->user()->email }}
                </p>

            </div>

        </div>

       <div class="col-lg-8">

    <div class="card p-4">

        <h3>
            Welcome, {{ auth()->user()->name }}
        </h3>

        <p class="text-muted">
            You have successfully logged into your account.
        </p>

        <hr>

        <h4 class="mb-4">
            Two-Factor Authentication
        </h4>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if(auth()->user()->two_factor_confirmed_at)

            <div class="alert alert-success">
                ✅ Two-Factor Authentication is Enabled.
            </div>

            <form method="POST" action="{{ url('/user/two-factor-authentication') }}">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">
                    Disable Two-Factor Authentication
                </button>

            </form>

        @elseif(auth()->user()->two_factor_secret)

            <div class="alert alert-warning">
                Scan the QR Code using Google Authenticator.
            </div>

            <div class="mb-4 text-center">

                {!! auth()->user()->twoFactorQrCodeSvg() !!}

            </div>

            <form method="POST" action="{{ url('/user/confirmed-two-factor-authentication') }}">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Enter 6 Digit OTP
                    </label>

                    <input
                        type="text"
                        name="code"
                        class="form-control otp-box"
                        maxlength="6"
                        placeholder="Enter OTP"
                        required
                    >

                </div>

                <button class="btn btn-success">
                    Verify OTP
                </button>

            </form>

        @else

            <div class="alert alert-info">
                Two-Factor Authentication is currently disabled.
            </div>

            <form method="POST" action="{{ url('/user/two-factor-authentication') }}">

                @csrf

                <button class="btn btn-primary">
                    Enable Two-Factor Authentication
                </button>

            </form>

        @endif

    </div>

</div>

    </div>

</div>

</body>
</html>