<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\CheckRoleTecnico;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\FormController;


//Rutas para los formularios
Route::post('/fill-form', [PersonasController::class, 'store']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/', function () {
    return view('welcome');
});



Route::get('/api/departamentos', [DepartamentoController::class, 'index']);
Route::get('/api/departamentos/{departamento}/municipios', [MunicipioController::class, 'index']);
Route::get('/api/personas', [PersonasController::class, 'index']);
Route::get('/api/personas/{id}', [PersonasController::class, 'show']);
Route::get('/api/personas/pdf/{filename}', [PDFController::class, 'downloadPDF']);
Route::post('/form/{id}/accept', [FormController::class, 'accept']);
Route::post('/form/{id}/reject', [FormController::class, 'reject']);


Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/fill-form', function () {
    return view('fill-form');
});

Route::get('/accept-form', function () {
    return view('accept-form');
});

Route::middleware([CheckRoleTecnico::class])->group(function () {
Route::get('/accepted-forms', function () {
    return view('accepted-forms');
})->middleware(AuthCheck::class);
});

Route::middleware([CheckRoleTecnico::class])->group(function () {
Route::get('/denied-forms', function () {
    return view('denied-forms');
})->middleware(AuthCheck::class);
});


// Ruta para cerrar sesión
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/fill-form', function () {
    return view('fill-form');
})->middleware(AuthCheck::class);

Route::middleware([CheckRole::class])->group(function () {
    Route::get('/fill-form', function () {
        return view('fill-form');
    });
});


Route::get('/accept-form', function () {
    return view('accept-form');
})->middleware(AuthCheck::class);

Route::middleware([CheckRoleTecnico::class])->group(function () {
    Route::get('/accept-form', function () {
        return view('accept-form');
    })->middleware(AuthCheck::class);
});

Route::middleware([CheckRoleTecnico::class])->group(function () {
    Route::get('/form-view/{id}', function ($id) {
        return view('form-view', ['id' => $id]); 
    })->middleware(AuthCheck::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
