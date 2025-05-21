<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ECOBOT</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        /* Barra de navegación */
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
        .navbar .nav-links {
            display: flex;
            gap: 20px;
        }
        .navbar .nav-links a {
            color: #fff;
            font-size: 16px;
            text-decoration: none;
        }
        .navbar .nav-links a:hover {
            text-decoration: underline;
        }
        .navbar .user-greeting {
            color: #fff;
            font-size: 16px;
        }
        /* Contenido principal */
        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .dashboard-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: left;
        }
        .dashboard-container h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 15px;
        }
        .dashboard-container .info {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }
        .dashboard-container .info strong {
            color: #333;
        }
        .dashboard-container .buttons {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }
        .dashboard-container .buttons a {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
        }
        .dashboard-container .buttons a.recolecciones {
            background-color: #0057B8;
        }
        .dashboard-container .buttons a.recolecciones:hover {
            background-color: #004494;
        }
        .dashboard-container .buttons a.puntos {
            background-color: #28a745;
        }
        .dashboard-container .buttons a.puntos:hover {
            background-color: #218838;
        }
        /* Pie de página */
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
        <a href="{{ route('dashboard') }}" class="logo">ECOBOT</a>
        <div class="nav-links">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('recolecciones') }}">Recolecciones</a>
            <a href="{{ route('puntos') }}">Puntos</a>
            <a href="{{ route('logout') }}">Cerrar sesión</a>
        </div>
        <div class="user-greeting">
            Hola, {{ $user->rol === 'admin' ? 'Administrador' : ($user->rol === 'user' ? 'Usuario' : 'Recolector') }}
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="main-content">
        <div class="dashboard-container">
            <h1>Bienvenido, {{ $user->nombre }}</h1>
            <p class="info"><strong>Rol:</strong> {{ $user->rol }}</p>
            <p class="info"><strong>Puntos acumulados:</strong> {{ $user->puntos }} pts</p>
            <div class="buttons">
                <a href="{{ route('recolecciones') }}" class="recolecciones">Recolecciones</a>
                <a href="{{ route('puntos') }}" class="puntos">Mis puntos</a>
            </div>
        </div>
    </div>

    <!-- Pie de página -->
    <footer class="footer">
        &copy; 2025 Ecobot. Todos los derechos reservados.
    </footer>
</body>
</html>