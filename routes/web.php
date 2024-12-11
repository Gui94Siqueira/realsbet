<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AffiliateCommissionController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\HomeController;

// Rota inicial, redirecionando para a rota home que usa o layout principal
Route::get('/', function () {
    return redirect()->route('home'); // Redireciona para a página inicial
});

// Rota para a página inicial (home) usando o controlador HomeController
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rota para desativar um afiliado
Route::get('affiliates/{id}/destroy', [AffiliateController::class, 'deactivate'])->name('affiliates.deactivate');

// Rotas de recursos para 'users', 'affiliates', e 'affiliate_commissions'
Route::resource('users', UserController::class);
Route::resource('affiliates', AffiliateController::class);
Route::resource('affiliate_commissions', AffiliateCommissionController::class);

// Criar comissão para afiliado
Route::get('/affiliates/{affiliateId}/commissions/create', [AffiliateCommissionController::class, 'create'])->name('affiliate_commissions.create');

// Armazenar comissão para afiliado
Route::post('/affiliates/{affiliateId}/commissions', [AffiliateCommissionController::class, 'store'])->name('affiliate_commissions.store');

// Mostrar comissão para afiliado
Route::get('/affiliates/{affiliateId}/commissions', [AffiliateCommissionController::class, 'show'])->name('affiliate_commissions.show');

// Deletar comissão
Route::delete('/commissions/{id}', [AffiliateCommissionController::class, 'destroy'])->name('affiliate_commissions.destroy');

// Editar e atualizar afiliado
Route::get('affiliates/{id}/edit', [AffiliateController::class, 'edit'])->name('affiliates.edit');
Route::put('affiliates/{id}', [AffiliateController::class, 'update'])->name('affiliates.update');
