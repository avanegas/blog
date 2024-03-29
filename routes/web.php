<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\EquiposIndex;
use App\Http\Livewire\MaterialsIndex;
use App\Http\Livewire\ObrerosIndex;
use App\Http\Livewire\ServiciosIndex;
use App\Http\Livewire\OfertasIndex;
use App\Http\Livewire\ProjectsIndex;
use App\Http\Livewire\PreciosIndex;
use App\Http\Livewire\TransportesIndex;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PrecioController;
use App\Http\Controllers\ProjectController;

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');
Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');

Route::get('precios/{precio}', [PrecioController::class, 'show'])->name('precios.show');
Route::get('projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('equipos',EquiposIndex::class)->name('equipos');
Route::get('materials',MaterialsIndex::class)->name('materials');
Route::get('obreros',ObrerosIndex::class)->name('obreros');
Route::get('transportes',TransportesIndex::class)->name('transportes');

Route::get('precios', PreciosIndex::class)->name('precios');
Route::get('projects', ProjectsIndex::class)->name('projects');
Route::get('ofertas', OfertasIndex::class)->name('ofertas');
Route::get('servicios', ServiciosIndex::class)->name('servicios');

Route::get('file-import-export', [PrecioController::class, 'fileImportExport']);
Route::post('file-import', [PrecioController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [PrecioController::class, 'fileExport'])->name('file-export');


//Prueba
Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');