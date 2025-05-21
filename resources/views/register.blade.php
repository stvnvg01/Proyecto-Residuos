<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - ECOBOT</title>
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
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input:focus,
        .form-group select:focus {
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
        <h1>Registro de Usuario</h1>

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

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                    class="{{ $errors->has('nombre') ? 'error' : '' }}">
                @if ($errors->has('nombre'))
                    <span class="error-message">{{ $errors->first('nombre') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" value="{{ old('apellidos') }}"
                    class="{{ $errors->has('apellidos') ? 'error' : '' }}">
                @if ($errors->has('apellidos'))
                    <span class="error-message">{{ $errors->first('apellidos') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="correo" id="correo" value="{{ old('correo') }}"
                    class="{{ $errors->has('correo') ? 'error' : '' }}">
                @if ($errors->has('correo'))
                    <span class="error-message">{{ $errors->first('correo') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}"
                    class="{{ $errors->has('telefono') ? 'error' : '' }}">
                @if ($errors->has('telefono'))
                    <span class="error-message">{{ $errors->first('telefono') }}</span>
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

            <div class="form-group">
                <label for="departamento">Departamento</label>
                <select name="departamento" id="departamento" onchange="updateMunicipios()"
                        class="{{ $errors->has('departamento') ? 'error' : '' }}">
                    <option value="">Seleccione un departamento</option>
                    <option value="Antioquia" {{ old('departamento') == 'Antioquia' ? 'selected' : '' }}>Antioquia</option>
                    <option value="Valle del Cauca" {{ old('departamento') == 'Valle del Cauca' ? 'selected' : '' }}>Valle del Cauca</option>
                    <option value="Bogota DC" {{ old('departamento') == 'Bogota DC' ? 'selected' : '' }}>Bogotá D.C.</option>
                </select>
                @if ($errors->has('departamento'))
                    <span class="error-message">{{ $errors->first('departamento') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="municipio">Municipio</label>
                <select name="municipio" id="municipio"
                        class="{{ $errors->has('municipio') ? 'error' : '' }}">
                    <option value="">Seleccione un municipio</option>
                </select>
                @if ($errors->has('municipio'))
                    <span class="error-message">{{ $errors->first('municipio') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" id="direccion" value="{{ old('direccion') }}"
                    class="{{ $errors->has('direccion') ? 'error' : '' }}">
                @if ($errors->has('direccion'))
                    <span class="error-message">{{ $errors->first('direccion') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="rol">Rol</label>
                <select name="rol" id="rol"
                        class="{{ $errors->has('rol') ? 'error' : '' }}">
                    <option value="">Seleccione un rol</option>
                    <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('rol') == 'user' ? 'selected' : '' }}>User</option>
                    <option value="collector" {{ old('rol') == 'collector' ? 'selected' : '' }}>Collector</option>
                </select>
                @if ($errors->has('rol'))
                    <span class="error-message">{{ $errors->first('rol') }}</span>
                @endif
            </div>

            <button type="submit">Registrar</button>
        </form>

        <p class="text-center">
            ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>
        </p>
    </div>

    <!-- Pie de página -->
    <footer class="footer">
        &copy; 2025 Ecobot. Todos los derechos reservados.
    </footer>

    <script>
        function updateMunicipios() {
            const departamento = document.getElementById('departamento').value;
            const municipioSelect = document.getElementById('municipio');
            municipioSelect.innerHTML = '<option value="">Seleccione un municipio</option>';

            if (departamento === 'Antioquia') {
                municipioSelect.innerHTML += `
                    <option value="Medellin" selected>Medellín</option>
                    <option value="Sabaneta">Sabaneta</option>
                `;
            } else if (departamento === 'Valle del Cauca') {
                municipioSelect.innerHTML += `
                    <option value="Cali" selected>Cali</option>
                    <option value="Buga">Buga</option>
                `;
            } else if (departamento === 'Bogota DC') {
                municipioSelect.innerHTML += `
                    <option value="Bogota" selected>Bogotá</option>
                `;
            }
        }

        document.addEventListener('DOMContentLoaded', updateMunicipios);
    </script>
</body>
</html>