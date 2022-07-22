<?php
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\ShowProducts;

// Para entrar a estas rutas, debemos de estar autenticados. y con el prefijo admin
// asi: http://ecom.lndo.site/admin/
// Tal como lo definimos en app/Providers/RouteServiceProvider.php
route::get('/', ShowProducts::class)->name('admin.index');

route::get('products/{product}/edit', function(){

})->name('admin.products.edit');
