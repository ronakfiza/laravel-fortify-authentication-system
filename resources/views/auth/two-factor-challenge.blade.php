<!DOCTYPE html>
<html>
<head>
    <title>Two Factor Authentication</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-header text-center">

                    <h3>Two-Factor Authentication</h3>

                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/two-factor-challenge') }}">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Authentication Code
                            </label>

                            <input
                                type="text"
                                name="code"
                                class="form-control"
                                placeholder="Enter 6-digit OTP"
                                autofocus
                            >

                        </div>

                        <button class="btn btn-primary w-100">
                            Verify
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>