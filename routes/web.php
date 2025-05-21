<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Company;
use App\Models\WasteType;
use App\Models\Collection;
use App\Models\Recompensa;
use App\Models\Canje;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return redirect('/login');
});

// Mostrar el formulario de login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Manejar el inicio de sesión
Route::post('/login', function (Request $request) {
    \Log::info('Intento de inicio de sesión con datos:', $request->all());

    try {
        $request->validate([
            'correo' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('web')->attempt(['correo' => $request->correo, 'password' => $request->password])) {
            \Log::info('Autenticación exitosa para: ' . $request->correo);
            $request->session()->regenerate();
            return redirect('/dashboard')->with('success', '¡Bienvenido!');
        }

        $user = \App\Models\Usuario::where('correo', $request->correo)->first();
        if (!$user) {
            \Log::warning('Usuario no encontrado con correo: ' . $request->correo);
            return back()->with('error', 'Correo no registrado.');
        }

        \Log::warning('Contraseña incorrecta para el correo: ' . $request->correo);
        return back()->with('error', 'Contraseña incorrecta.');
    } catch (\Exception $e) {
        \Log::error('Error al iniciar sesión: ' . $e->getMessage());
        return back()->with('error', 'Error al iniciar sesión: ' . $e->getMessage());
    }
})->name('login.store');

// Mostrar el formulario de registro
Route::get('/register', function () {
    return view('register');
})->name('register');

// Manejar el registro de usuarios
Route::post('/register', function (Request $request) {
    \Log::info('Solicitud recibida en POST /register');
    \Log::info('Datos recibidos:', $request->all());

    try {
        $request->validate([
            'nombre' => 'required|string|max:30',
            'apellidos' => 'required|string|max:30',
            'correo' => 'required|email|max:100|unique:usuarios,correo',
            'telefono' => 'required|string|max:10',
            'password' => 'required|string|min:6',
            'departamento' => 'required|string|max:50',
            'municipio' => 'required|string|max:50',
            'direccion' => 'required|string|max:70',
            'rol' => 'required|in:admin,user,collector',
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        \Log::error('Error de validación: ' . $e->getMessage());
        return back()->withErrors($e->validator)->withInput();
    }

    try {
        $count = DB::table('usuarios')->count();
        \Log::info('Conteo de usuarios en la tabla usuarios: ' . $count);
    } catch (\Exception $e) {
        \Log::error('Error al contar usuarios: ' . $e->getMessage());
        return back()->with('error', 'Error al acceder a la base de datos: ' . $e->getMessage());
    }

    try {
        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->correo = $request->correo;
        $usuario->telefono = $request->telefono;
        $usuario->password = Hash::make($request->password);
        $usuario->departamento = $request->departamento;
        $usuario->municipio = $request->municipio;
        $usuario->direccion = $request->direccion;
        $usuario->rol = $request->rol;
        $usuario->puntos = 0;
        $usuario->save();

        \Log::info('Usuario guardado exitosamente:', $usuario->toArray());
        return redirect('/login')->with('success', '¡Registro exitoso! Por favor inicia sesión.');
    } catch (\Exception $e) {
        \Log::error('Error al registrar: ' . $e->getMessage());
        return back()->with('error', 'Error al registrar: ' . $e->getMessage());
    }
})->name('register.store');

// Dashboard (menú principal)
Route::get('/dashboard', function () {
    if (!Auth::guard('web')->check()) {
        return redirect('/login')->with('error', 'Por favor inicia sesión para acceder al dashboard.');
    }

    $user = Auth::guard('web')->user();
    \Log::info('Usuario autenticado:', $user->toArray());

    if (!in_array($user->rol, ['admin', 'user', 'collector'])) {
        Auth::guard('web')->logout();
        return redirect('/login')->with('error', 'No tienes permisos para acceder al dashboard.');
    }

    return view('menu', ['user' => $user]);
})->name('dashboard');

// Mostrar el formulario de recolecciones y el historial
Route::get('/collections', function () {
    if (!Auth::guard('web')->check()) {
        return redirect('/login')->with('error', 'Please log in to access collections.');
    }

    $user = Auth::guard('web')->user();

    // Obtener empresas, tipos de residuos y recolecciones del usuario
    $companies = Company::all();
    $wasteTypes = WasteType::all();
    $collections = Collection::where('user_id', $user->id)
        ->with('company', 'wasteType')
        ->orderBy('fecha', 'desc')
        ->get();

    return view('collections', [
        'user' => $user,
        'companies' => $companies,
        'wasteTypes' => $wasteTypes,
        'collections' => $collections,
    ]);
})->name('recolecciones');

// Guardar una nueva recolección
Route::post('/collections', function (Request $request) {
    if (!Auth::guard('web')->check()) {
        return redirect('/login')->with('error', 'Please log in to schedule a collection.');
    }

    $user = Auth::guard('web')->user();

    try {
        $validatedData = $request->validate([
            'company_id' => 'required|exists:empresa_recolectora,id',
            'waste_type_id' => 'required|exists:tipo_residuo,id',
            'date' => 'required|date|after_or_equal:today',
            'weight_kg' => 'nullable|numeric|min:0',
        ]);

        // Mapear los datos a los nombres de las columnas de la tabla
        $data = [
            'user_id' => $user->id,
            'empresa_id' => $validatedData['company_id'],
            'tipo_residuo_id' => $validatedData['waste_type_id'],
            'fecha' => $validatedData['date'],
            'turno' => rand(1, 8),
            'programada' => 1,
            'peso_kg' => $validatedData['weight_kg'],
        ];

        Collection::create($data);

        // Sumar 10 puntos al usuario por cada recolección
        $user->puntos += 10;
        $user->save();

        return redirect('/collections')->with('success', '¡Recolección programada con éxito!');
    } catch (\Exception $e) {
        \Log::error('Error scheduling collection: ' . $e->getMessage());
        return back()->with('error', 'Error al programar la recolección: ' . $e->getMessage());
    }
})->name('recolecciones.store');

// Mostrar la página de puntos
Route::get('/puntos', function () {
    if (!Auth::guard('web')->check()) {
        return redirect('/login')->with('error', 'Por favor inicia sesión para acceder a tus puntos.');
    }

    $user = Auth::guard('web')->user();

    // Obtener las recolecciones del usuario
    $collections = Collection::where('user_id', $user->id)
        ->with('company', 'wasteType')
        ->orderBy('fecha', 'desc')
        ->get();

    // Obtener los canjes del usuario
    $canjes = Canje::where('user_id', $user->id)
        ->with('recompensa')
        ->orderBy('created_at', 'desc')
        ->get();

    // Combinar recolecciones y canjes en una lista de transacciones
    $transacciones = [];

    // Agregar recolecciones al historial
    foreach ($collections as $collection) {
        $transacciones[] = [
            'fecha' => $collection->fecha,
            'descripcion' => "Recolección de {$collection->wasteType->nombre} con {$collection->company->nombre}",
            'puntos' => '+10',
        ];
    }

    // Agregar canjes al historial
    foreach ($canjes as $canje) {
        $transacciones[] = [
            'fecha' => $canje->created_at->toDateString(),
            'descripcion' => "Canje de recompensa: {$canje->recompensa->nombre}",
            'puntos' => "-{$canje->puntos_usados}",
        ];
    }

    // Ordenar las transacciones por fecha (descendente)
    usort($transacciones, function ($a, $b) {
        return strtotime($b['fecha']) - strtotime($a['fecha']);
    });

    // Obtener las recompensas disponibles
    $recompensas = Recompensa::all();

    return view('puntos', [
        'user' => $user,
        'recompensas' => $recompensas,
        'transacciones' => $transacciones,
    ]);
})->name('puntos');

// Canjear una recompensa
Route::post('/puntos/redeem/{recompensa}', function (Request $request, Recompensa $recompensa) {
    if (!Auth::guard('web')->check()) {
        return redirect('/login')->with('error', 'Por favor inicia sesión para canjear una recompensa.');
    }

    $user = Auth::guard('web')->user();

    try {
        // Verificar si el usuario tiene suficientes puntos
        if ($user->puntos < $recompensa->puntos_requeridos) {
            return redirect('/puntos')->with('error', 'No tienes suficientes puntos para canjear esta recompensa.');
        }

        // Restar los puntos al usuario
        $user->puntos -= $recompensa->puntos_requeridos;
        $user->save();

        // Registrar el canje
        Canje::create([
            'user_id' => $user->id,
            'recompensa_id' => $recompensa->id,
            'puntos_usados' => $recompensa->puntos_requeridos,
        ]);

        return redirect('/puntos')->with('success', "¡Recompensa canjeada con éxito! Has canjeado: {$recompensa->nombre}.");
    } catch (\Exception $e) {
        \Log::error('Error al canjear recompensa: ' . $e->getMessage());
        return redirect('/puntos')->with('error', 'Error al canjear la recompensa: ' . $e->getMessage());
    }
})->name('puntos.redeem');

// Cerrar sesión
Route::get('/logout', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login')->with('success', '¡Sesión cerrada con éxito!');
})->name('logout');

// Probar la conexión a la base de datos
Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return "Conexión a la base de datos exitosa.";
    } catch (\Exception $e) {
        return "Error al conectar a la base de datos: " . $e->getMessage();
    }
})->name('test-db');