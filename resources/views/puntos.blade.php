<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puntos - ECOBOT</title>
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
        .main-content {
            flex: 1;
            padding: 20px;
            max-width: 1000px;
            margin: 0 auto;
            width: 100%;
        }
        .points-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .points-container h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .points-container .total-points {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .points-container .total-points span {
            font-weight: bold;
            color: #0057B8;
        }
        .rewards-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .rewards-container h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .reward-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        .reward-item:last-child {
            border-bottom: none;
        }
        .reward-details {
            flex: 1;
        }
        .reward-details h3 {
            font-size: 16px;
            font-weight: bold;
        }
        .reward-details p {
            font-size: 14px;
            color: #666;
        }
        .reward-points {
            font-size: 14px;
            font-weight: bold;
            margin-right: 20px;
        }
        .redeem-button {
            background-color: #0057B8;
            color: #fff;
            padding: 8px 16px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .redeem-button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
        .redeem-button:hover:not(:disabled) {
            background-color: #004494;
        }
        .table-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0,0, 0.1);
            overflow-x: auto;
        }
        .table-container h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
            padding: 20px 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        thead {
            background-color: #f1f3f5;
        }
        th, td {
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }
        th {
            font-weight: medium;
        }
        tr {
            border-top: 1px solid #e5e7eb;
        }
        td.empty {
            text-align: center;
            color: #666;
            padding: 20px;
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
        <!-- Puntos actuales -->
        <div class="points-container">
            <h2>Tus puntos</h2>
            <div class="total-points">
                Puntos actuales: <span>{{ $user->puntos }}</span>
            </div>
        </div>

        <!-- Recompensas disponibles -->
        <div class="rewards-container">
            <h2>Canjear puntos</h2>

            @if (session('success'))
                <div class="alert success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert error">
                    {{ session('error') }}
                </div>
            @endif

            @foreach ($recompensas as $recompensa)
                <div class="reward-item">
                    <div class="reward-details">
                        <h3>{{ $recompensa->nombre }}</h3>
                        <p>{{ $recompensa->descripcion }}</p>
                    </div>
                    <div class="reward-points">
                        {{ $recompensa->puntos_requeridos }} puntos
                    </div>
                    <form method="POST" action="{{ route('puntos.redeem', $recompensa->id) }}">
                        @csrf
                        <button type="submit" class="redeem-button" {{ $user->puntos < $recompensa->puntos_requeridos ? 'disabled' : '' }}>
                            Canjear
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <!-- Histórico de transacciones de puntos -->
        <div class="table-container">
            <h2>Histórico de puntos</h2>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Puntos</th>
                    </tr>
                </thead>
                <tbody>
                    @if (empty($transacciones))
                        <tr>
                            <td colspan="3" class="empty">No tienes transacciones de puntos registradas.</td>
                        </tr>
                    @else
                        @foreach ($transacciones as $transaccion)
                            <tr>
                                <td>{{ $transaccion['fecha'] }}</td>
                                <td>{{ $transaccion['descripcion'] }}</td>
                                <td>{{ $transaccion['puntos'] }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>