<?php

use Atom\Installation\Http\Controllers\InstallationController;
use Illuminate\Support\Facades\Route;

Route::resource('installation', InstallationController::class)
    ->middleware('web')
    ->only(['index', 'store', 'show', 'edit', 'update', 'destroy']);
