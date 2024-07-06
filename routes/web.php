<?php

use Atom\Installation\Http\Controllers\InstallationController;
use Illuminate\Support\Facades\Route;

Route::resource('installation', InstallationController::class)
    ->middleware('web')
    ->only(['index', 'store', 'show', 'edit', 'update', 'destroy']);

// // Installation routes
// Route::prefix('installation')->controller(InstallationController::class)->group(function () {
//     Route::get('/', 'index')->name('installation.index');
//     Route::get('/step/{step}', 'showStep')->name('installation.show-step');

//     Route::post('/start-installation', 'storeInstallationKey')->name('installation.start-installation');
//     Route::post('/restart-installation', 'restartInstallation')->name('installation.restart');
//     Route::post('/previous-step', 'previousStep')->name('installation.previous-step');
//     Route::post('/save-step', 'saveStepSettings')->name('installation.save-step');
//     Route::post('/complete', 'completeInstallation')->name('installation.complete');
// });
