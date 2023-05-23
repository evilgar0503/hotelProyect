<?php

use App\Http\Controllers\AdministrarController;
use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');


// Route::get('/dashboard', function () {
//     return redirect()->route('usuarios');
// })->middleware(['auth','admin'])->name('dashboard');


Route::resource('galeria', ImagenesController::class);

/*
Mis Reservas
*/
Route::get('/myreservas', [ReservasController::class, 'reservasByUser'])->middleware(['auth', 'verified'])->name('misReservas');


/*
Disponibilidad fechas
*/
Route::get('/busqueda', function () {
    return view('busqueda');
})->middleware(['auth', 'verified'])->name('busqueda');

/*
Crear Reserva
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/delete', [ReservasController::class, 'destroy'])->name('reservar.delete');
    Route::post('/reservas', [ReservasController::class, 'store'])->name('reservar.store');
    Route::get('/finalizar', [ReservasController::class, 'index'])->name('finalizar.index');
    Route::get('/busqueda2', [ReservasController::class, 'comprobarFechas'])->name('busqueda.comprobar');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','verified', 'admin'])->group(function () {
    Route::get('/usuarios', [AdministrarController::class, 'index'])->name('usuarios');
    Route::get('/reservas', [ReservasController::class, 'show'])->name('reservas.show');
    Route::get('/createuser', [AdministrarController::class, 'createUser'])->name('create.user');
    Route::post('/createuser', [AdministrarController::class, 'storeUser'])->name('admin.create.user');
    Route::get('/edituser', [AdministrarController::class, 'update'])->name('edit.user');
    Route::patch('/edituser', [AdministrarController::class, 'updateUser'])->name('update.user');
});

Route::get('/generate-pdf-user', [PDFController::class, 'generatePDFUser'])->middleware(['admin', 'auth', 'verified'])->name('pdfUsuarios');
Route::get('/pdf-compra', [PDFController::class, 'generatePDFCompra'])->middleware(['auth', 'verified'])->name('pdfCompra');


require __DIR__.'/auth.php';
