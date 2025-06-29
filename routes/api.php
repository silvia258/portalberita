<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::apiResource('/posts', PostController::class);
});
