<?php

use App\Http\Controllers\Body1Controller;
use App\Http\Controllers\Body2Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PossibleController;
use App\Http\Controllers\HomeController;
use App\Models\OurCoreValue;
use App\Http\Controllers\OurCoreValueController;
use App\Http\Controllers\ContactController;
use App\Models\WhyChooseUs;
use App\Http\Controllers\WhyChooseUsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* amit project */


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    Route::get('/hero', [HeroController::class, 'show']);
    Route::post('/hero', [HeroController::class, 'storeOrUpdate']);
});
Route::middleware('auth:api')->group(function () {
    Route::get('/body1', [Body1Controller::class, 'show']);
    Route::post('/body1', [Body1Controller::class, 'storeOrUpdate']);
});
Route::middleware('auth:api')->group(function () {
    Route::get('/body2', [Body2Controller::class, 'show']);
    Route::post('/body2', [Body2Controller::class, 'storeOrUpdate']);
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('me', [AuthController::class, 'me'])->middleware('auth:api');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');


// Dynamic Menu Design
Route::middleware('auth:api')->group(function () {
    Route::get('/menu', [MenuController::class, 'show']);
    Route::post('/menu', [MenuController::class, 'storeOrUpdate']);
});

// Dynamic About us Design
Route::middleware('auth:api')->group(function () {
    Route::get('/aboutus', [AboutController::class, 'show']);
    Route::post('/aboutus', [AboutController::class, 'storeOrUpdate']);
});

// Dynamic Possible Design
Route::middleware('auth:api')->group(function () {
    Route::get('/possible', [PossibleController::class, 'show']);
    Route::post('/possible', [PossibleController::class, 'storeOrUpdate']);
});


// Home Design
Route::middleware('auth:api')->group(function () {
    Route::get('/home', [HomeController::class, 'show']);
    Route::post('/home', [HomeController::class, 'storeOrUpdate']);
});


// Dynamic Possible Design
Route::middleware('auth:api')->group(function () {
    Route::get('/ourcorevalue', [OurCoreValueController::class, 'show']);
    Route::post('/ourcorevalue', [OurCoreValueController::class, 'storeOrUpdate']);
});

// Dynamic Contact Design
Route::middleware('auth:api')->group(function () {
    Route::get('/contact', [ContactController::class, 'show']);
    Route::post('/contact', [ContactController::class, 'storeOrUpdate']);
});


// Dynamic why choose us Design
Route::middleware('auth:api')->group(function () {
    Route::get('/whychooseus', [WhyChooseUsController::class, 'show']);
    Route::post('/whychooseus', [WhyChooseUsController::class, 'storeOrUpdate']);
});

// Dynamic why choose us Design
Route::middleware('auth:api')->group(function () {
    Route::get('/service', [ServiceController::class, 'show']);
    Route::post('/service', [ServiceController::class, 'storeOrUpdate']);
});


Route::middleware('auth:api')->group(function () {
    Route::post('/service', [ServiceController::class, 'storeOrUpdate']);
});

Route::middleware('auth:api')->group(function () {
   
    Route::get('/contactMessage', [ContactMessageController::class, 'show']);
});




Route::get('/frontend-data', [FrontendController::class, 'getAllData']);
Route::post('/contactMessage', [ContactMessageController::class, 'store']);
// Route::post('/Message', [ContactMessageController::class, 'store']);