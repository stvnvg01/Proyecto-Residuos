<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recolecciones - ECOBOT</title>
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
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .form-container h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: medium;
            margin-bottom: 5px;
        }
        .form-group select,
        .form-group input {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f5f5f5;
        }
        .form-group input[type="date"],
        .form-group input[type="number"] {
            background-color: #fff;
        }
        .form-group .error {
            border-color: #ff3333;
        }
        .form-group .error-message {
            color: #ff3333;
            font-size: 12px;
            margin-top: 5px;
        }
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        .form-group .note {
            color: #666;
            font-size: 12px;
        }
        button {
            background-color: #0057B8;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #004494;
        }
        .table-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
            <a href="{{ route('recolecciones') }}">Recolecciones</a> <!-- Cambiado de 'collections' a 'recolecciones' -->
            <a href="{{ route('puntos') }}">Puntos</a>
            <a href="{{ route('logout') }}">Cerrar sesión</a>
        </div>
        <div class="user-greeting">
            Hola, {{ $user->rol === 'admin' ? 'Administrador' : ($user->rol === 'user' ? 'Usuario' : 'Recolector') }}
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="main-content">
        <!-- Formulario para nueva recolección -->
        <div class="form-container">
            <h2>Solicitar nueva recolección</h2>

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

            <form method="POST" action="{{ route('recolecciones.store') }}"> <!-- Cambiado de 'collections.store' a 'recolecciones.store' -->
                @csrf

                <div class="form-group">
                    <label for="company_id">Empresa recolectora:</label>
                    <select name="company_id" id="company_id" required
                            class="{{ $errors->has('company_id') ? 'error' : '' }}">
                        <option value="">– Seleccione –</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                {{ $company->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('company_id'))
                        <span class="error-message">{{ $errors->first('company_id') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="waste_type_id">Tipo de residuo:</label>
                    <select name="waste_type_id" id="waste_type_id" required
                            class="{{ $errors->has('waste_type_id') ? 'error' : '' }}">
                        <option value="">– Seleccione –</option>
                        @foreach ($wasteTypes as $wasteType)
                            <option value="{{ $wasteType->id }}" {{ old('waste_type_id') == $wasteType->id ? 'selected' : '' }}>
                                {{ $wasteType->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('waste_type_id'))
                        <span class="error-message">{{ $errors->first('waste_type_id') }}</span>
                    @endif
                </div>

                <div class="grid">
                    <div class="form-group">
                        <label for="date">Fecha de recolección:</label>
                        <input type="date" name="date" id="date" required
                            value="{{ old('date') }}"
                            class="{{ $errors->has('date') ? 'error' : '' }}">
                        @if ($errors->has('date'))
                            <span class="error-message">{{ $errors->first('date') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="weight_kg">Peso (kg):</label>
                        <input type="number" name="weight_kg" id="weight_kg" step="0.01"
                            value="{{ old('weight_kg', '0.00') }}"
                            class="{{ $errors->has('weight_kg') ? 'error' : '' }}">
                        @if ($errors->has('weight_kg'))
                            <span class="error-message">{{ $errors->first('weight_kg') }}</span>
                        @endif
                    </div>
                </div>

                <button type="submit">Programar recolección</button>
            </form>
        </div>

        <!-- Histórico de recolecciones -->
        <div class="table-container">
            <h2>Histórico de recolecciones</h2>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo</th>
                        <th>Empresa</th>
                        <th>Peso (kg)</th>
                        <th>Turno</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($collections->isEmpty())
                        <tr>
                            <td colspan="5" class="empty">No tienes recolecciones registradas.</td>
                        </tr>
                    @else
                        @foreach ($collections as $collection)
                            <tr>
                                <td>{{ $collection->fecha }}</td>
                                <td>{{ $collection->wasteType->nombre }}</td>
                                <td>{{ $collection->company->nombre }}</td>
                                <td>{{ $collection->peso_kg ? $collection->peso_kg . ' kg' : '—' }}</td>
                                <td>{{ $collection->turno }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>