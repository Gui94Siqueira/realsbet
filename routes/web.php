<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AffiliateCommissionController;
use App\Http\Controllers\AffiliateController;

Route::get('affiliates/{id}/destroy', [AffiliateController::class, 'deactivate'])->name('affiliates.deactivate');


Route::resource('users', UserController::class);
Route::resource('affiliates', AffiliateController::class);
Route::resource('affiliate_commissions', AffiliateCommissionController::class);

Route::resource('affiliates', AffiliateController::class);
Route::resource('affiliate_commissions', AffiliateCommissionController::class);

Route::get('affiliate_commissions/{affiliateId}/show', [AffiliateCommissionController::class, 'show'])->name('affiliate_commissions.show');

Route::get('affiliates/{id}/edit', [AffiliateController::class, 'edit'])->name('affiliates.edit');
Route::put('affiliates/{id}', [AffiliateController::class, 'update'])->name('affiliates.update');
