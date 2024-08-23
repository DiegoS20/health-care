<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/scss/login.scss'])
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-card-content">
                <div class="login-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Health Care Logo">
                </div>
                <h2>Bienvenido Doctor</h2>
                <form method="POST" action="{{ route('login-doc') }}">
                    @csrf
                    <div class="input-field">
                        <input id="email" type="email" class="validate" name="email" required
                            autocomplete="email" autofocus>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field">
                        <input id="password" type="password" class="validate" name="password" required
                            autocomplete="current-password">
                        <label for="password">Password</label>
                        <span class="toggle-password">
                    </div>
                    <button type="submit" class="btn">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
