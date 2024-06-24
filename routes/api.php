<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// use App\Http\Requests\Auth\IssueTokenRequest;

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


// auth routes =================================================================

// Route::group([
//     'prefix' => 'auth',
//     // 'namespace' => '\App\Http\Controllers\JWT'
// ], function () {
//     // register new user
//     // Route::post('/register', [AuthController::class, 'register']);
//     // get token
//     // Route::post('/refresh', );
// });

Route::group([
    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers'
], function () {
    Route::controller('AuthController')->group(function() {
        Route::post('/register', 'register');
        Route::post('/login', 'login');
        Route::post('/refresh', 'refresh');
        Route::post('/logout', 'logout');
        Route::middleware('auth:sanctum')->group(function() {
            // Route::post('/me', 'userinfo');
            // Route::post('/')
        });
    });
});


// Route::group([
//     'prefix' => 'auth0',
//     'middleware' => 'auth:sanctum'
// ], function () {
//     // logout
//     Route::post('/auth/logout', function (Request $request) {
//         $request->user()->currentAccessToken()->delete();
//         return response()->json(['message' => 'Logged out']);
//     });
//     // user profile
//     Route::post('/me', function (Request $request) {
//         return $request->user();
//     });
// });


// =============================================================================
/* 
Route::group([
    'prefix' => 'profile',
    'namespace' => 'App\Http\Controllers',
    'middleware' => ['auth:sanctum']
], function () {
    Route::controller('ProfileController')->group(function() {
        Route::get('/', 'info');
        // Route::get('/edit', 'info');
    });
});

Route::group([
    'prefix' => 'forecast',
    // 'middleware' => ['auth:sanctum']
], function() {
    Route::controller('ForecastController')->group(function() {

    });
});


Route::group([
    'prefix' => 'spots',
    'namespace' => '\App\Http\Controllers\Spot'
    // 'middleware' => ['auth:sanctum']
], function() {
    Route::controller('SpotController')->group(function() {
        Route::get('/', 'index');
        Route::post('/create', 'store');
});
});
 */


Route::group([
    'prefix' => 'spots',
    'namespace' => '\App\Http\Controllers\Spot'
    // 'middleware' => ['auth:sanctum']
], function() {
    // Route::controller('SpotController')->group(function() {
        Route::get('/', 'IndexController');
        // geocoding 
        Route::get('/geocode_reverse', "SpotController@gReverse");
        Route::get('/geocode_direct', "SpotController@gDirect");
        Route::post('/create', 'SpotController@store');
        Route::get('/my', "DashboardController");

        // last 
        // Route::get('/{id}/latest', "");
    // });
});