<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - ECOBOT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6e6e6;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar {
            background-color: #0057B8;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar .logo {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }
        .navbar .user-greeting {
            color: #fff;
            font-size: 16px;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin: auto;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .form-container h1 {
            font-size: 24px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input:focus {
            outline: none;
            border-color: #0066cc;
        }
        .form-group .error {
            border-color: #ff3333;
        }
        .form-group .error-message {
            color: #ff3333;
            font-size: 12px;
            margin-top: 5px;
        }
        .alert {
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .alert.success {
            background-color: #d4edda;
            color: #155724;
        }
        .alert.error {
            background-color: #f8d7da;
            color: #721c24;
        }
        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #0066cc;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0052a3;
        }
        .text-center {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        .text-center a {
            color: #0066cc;
            text-decoration: none;
        }
        .text-center a:hover {
            text-decoration: underline;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #666;
            background-color: #f1f3f5;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar">
        <a href="{{ route('login') }}" class="logo">ECOBOT</a>
        <div class="user-greeting">
            Hola, Invitado
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="form-container">
        <h1>Iniciar Sesión</h1>

        @if (session('error'))
            <div class="alert error">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="correo" id="correo" value="{{ old('correo') }}"
                       class="{{ $errors->has('correo') ? 'error' : '' }}">
                @if ($errors->has('correo'))
                    <span class="error-message">{{ $errors->first('correo') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password"
                    class="{{ $errors->has('password') ? 'error' : '' }}">
                @if ($errors->has('password'))
                    <span class="error-message">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <button type="submit">Iniciar Sesión</button>
        </form>

        <p class="text-center">
            ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>
        </p>
    </div>

    <!-- Pie de página -->
    <footer class="footer">
        &copy; 2025 Ecobot. Todos los derechos reservados.
    </footer>
</body>
</html>