<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LineaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\TipoUsuarioController;
use App\Http\Middleware\EnsureUserHasRole;
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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::post('/imagenes',[ImagenController::class, 'store'])->name('imagen.store');
/* AUTH */
Route::get('/registrar', [RegisterController::class, 'index'])->name('registrar');
Route::post('/registrar', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

/* SUPER */
Route::get('/super/equipos-asignados', [EquipoController::class, 'equiposAsignados'])->name('super.equiposAsignados');
Route::get('/super/levantar-reporte', [ReporteController::class, 'levantarReporte'])->name('super.levantarReporte');
Route::post('/super/levantar-reporte', [ReporteController::class, 'guardarReporte'])->name('super.baseReportes.guardarReporte');
Route::get('/super/reportes-levantados', [ReporteController::class, 'reportesLevantados'])->name('super.reportesLevantados');
Route::get('/super/reportes-nuevos', [ReporteController::class, 'reportesNuevos'])->name('super.reportesNuevos');
Route::get('/super/incidencias-totales', [ReporteController::class, 'incidenciasTotales'])->name('super.incidenciasTotales');
Route::get('/super/mis-incidencias', [ReporteController::class, 'misIncidencias'])->name('super.misIncidencias');
Route::get('/super/mis-incidencias/{reporte}', [ReporteController::class, 'showAsignacion'])->name('super.misIncidencias.show');
Route::get('/super/base-datos', [IndexController::class, 'baseDatos'])->name('super.baseDatos');
Route::get('/super/reportes-levantados/{reporte}', [ReporteController::class, 'show'])->name('super.reportesLevantados.show');
Route::get('/super/reportes-nuevos/{reporte}', [ReporteController::class, 'revision'])->name('super.reportesLevantados.revision');
Route::put('/super/reportes-nuevos/{reporte}/revision', [ReporteController::class, 'editarRevision'])->name('super.reportesLevantados.editarRevision');
Route::put('/super/mis-incidencias/{reporte}/revision', [ReporteController::class, 'editarAsignacion'])->name('super.misIncidencias.editarAsignacion');
/* CARGOS */
Route::get('/super/base-datos/cargos', [CargoController::class, 'index'])->name('super.baseCargos');
Route::get('/super/base-datos/cargos/create', [CargoController::class, 'create'])->name('super.baseCargos.create');
Route::post('/super/base-datos/cargos', [CargoController::class, 'store'])->name('super.baseCargos.store');
Route::get('/super/base-datos/cargos/{cargo}/edit', [CargoController::class, 'edit'])->name('super.baseCargos.edit');
Route::put('/super/base-datos/cargos/{cargo}/edit', [CargoController::class, 'update'])->name('super.baseCargos.update');
Route::delete('/super/base-datos/cargos/{cargo}', [CargoController::class, 'destroy'])->name('super.baseCargos.destroy');
/* DISTRITOS */
Route::get('/super/base-datos/distritos', [DistritoController::class, 'index'])->name('super.baseDistritos');
Route::get('/super/base-datos/distritos/create', [DistritoController::class, 'create'])->name('super.baseDistritos.create');
Route::post('/super/base-datos/distritos', [DistritoController::class, 'store'])->name('super.baseDistritos.store');
Route::get('/super/base-datos/distritos/{distrito}/edit', [DistritoController::class, 'edit'])->name('super.baseDistritos.edit');
Route::put('/super/base-datos/distritos/{distrito}/edit', [DistritoController::class, 'update'])->name('super.baseDistritos.update');
Route::delete('/super/base-datos/distritos/{distrito}', [DistritoController::class, 'destroy'])->name('super.baseDistritos.destroy');
/* EQUIPOS */
Route::get('/super/base-datos/equipos', [EquipoController::class, 'index'])->name('super.baseEquipos');
Route::get('/super/base-datos/equipos/create', [EquipoController::class, 'create'])->name('super.baseEquipos.create');
Route::post('/super/base-datos/equipos', [EquipoController::class, 'store'])->name('super.baseEquipos.store');
Route::get('/super/base-datos/equipos/{equipo}/edit', [EquipoController::class, 'edit'])->name('super.baseEquipos.edit');
Route::put('/super/base-datos/equipos/{equipo}/edit', [EquipoController::class, 'update'])->name('super.baseEquipos.update');
Route::delete('/super/base-datos/equipos/{equipo}', [EquipoController::class, 'destroy'])->name('super.baseEquipos.destroy');
/* LINEAS */
Route::get('/super/base-datos/lineas', [LineaController::class, 'index'])->name('super.baseLineas');
Route::get('/super/base-datos/lineas/create', [LineaController::class, 'create'])->name('super.baseLineas.create');
Route::post('/super/base-datos/lineas', [LineaController::class, 'store'])->name('super.baseLineas.store');
Route::get('/super/base-datos/lineas/{linea}/edit', [LineaController::class, 'edit'])->name('super.baseLineas.edit');
Route::put('/super/base-datos/lineas/{linea}/edit', [LineaController::class, 'update'])->name('super.baseLineas.update');
Route::delete('/super/base-datos/lineas/{linea}', [LineasController::class, 'destroy'])->name('super.baseLineas.destroy');
/* REPORTES */
Route::get('/super/base-datos/reportes', [ReporteController::class, 'index'])->name('super.baseReportes');
Route::get('/super/base-datos/reportes/create', [ReporteController::class, 'create'])->name('super.baseReportes.create');
Route::post('/super/base-datos/reportes', [ReporteController::class, 'store'])->name('super.baseReportes.store');
Route::get('/super/base-datos/reportes/{reporte}/edit', [ReporteController::class, 'edit'])->name('super.baseReportes.edit');
Route::put('/super/base-datos/reportes/{reporte}/edit', [ReporteController::class, 'update'])->name('super.baseReportes.update');
Route::delete('/super/base-datos/reportes/{reporte}', [ReporteController::class, 'destroy'])->name('super.baseReportes.destroy');
/* TIPO DE USUARIOS */
Route::get('/super/base-datos/tipos-usuarios', [TipoUsuarioController::class, 'index'])->name('super.baseTiposUsuarios');
Route::get('/super/base-datos/tipos-usuarios/create', [TipoUsuarioController::class, 'create'])->name('super.baseTiposUsuarios.create');
Route::post('/super/base-datos/tipos-usuarios', [TipoUsuarioController::class, 'store'])->name('super.baseTiposUsuarios.store');
Route::get('/super/base-datos/tipos-usuarios/{tipoUsuario}/edit', [TipoUsuarioController::class, 'edit'])->name('super.baseTiposUsuarios.edit');
Route::put('/super/base-datos/tipos-usuarios/{tipoUsuario}/edit', [TipoUsuarioController::class, 'update'])->name('super.baseTiposUsuarios.update');
Route::delete('/super/base-datos/tipos-usuarios/{tipoUsuario}', [TipoUsuarioController::class, 'destroy'])->name('super.baseTiposUsuarios.destroy');
/* ADM */
Route::get('/adm/mis-incidencias', [ReporteController::class, 'misIncidencias'])->name('adm.misIncidencias');
Route::get('/adm/mis-incidencias/{reporte}', [ReporteController::class, 'showAsignacion'])->name('adm.misIncidencias.show');
Route::put('/adm/mis-incidencias/{reporte}/revision', [ReporteController::class, 'editarAsignacion'])->name('adm.misIncidencias.editarAsignacion');
Route::get('/adm/equipos-asignados', [EquipoController::class, 'equiposAsignados'])->name('adm.equiposAsignados');
Route::get('/adm/levantar-reporte', [ReporteController::class, 'levantarReporte'])->name('adm.levantarReporte');
Route::get('/adm/reportes-levantados', [ReporteController::class, 'reportesLevantados'])->name('adm.reportesLevantados');
Route::get('/adm/reportes-levantados/{reporte}', [ReporteController::class, 'show'])->name('adm.reportesLevantados.show');

/* GENERAL */
Route::get('/equipos-asignados', [EquipoController::class, 'equiposAsignados'])->name('general.equiposAsignados');
Route::get('/levantar-reporte', [ReporteController::class, 'levantarReporte'])->name('general.levantarReporte');
Route::get('/reportes-levantados', [ReporteController::class, 'reportesLevantados'])->name('general.reportesLevantados');
Route::get('/reportes-levantados/{reporte}', [ReporteController::class, 'show'])->name('general.reportesLevantados.show');

Route::get('/prueba', [PruebaController::class, 'index']);




