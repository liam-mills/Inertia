<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return Inertia::render('Home');
    });
    
    Route::get('/users', function () {
        return Inertia::render('Users/Index', [
            'users' => User::query()
                ->select(['name', 'id'])
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'can' => [
                        'edit' => Auth::user()->can('update', $user),
                        'delete' => Auth::user()->can('delete', $user)
                    ],
                ]),
            
            'filters' => Request::only(['search']),

            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ]
        ]);
    });
    
    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    })->can('create', 'App\Models\User');
    
    // Create users form submit.
    Route::post('/users', function () {
        $data = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);
    
        User::create($data);
    
        return redirect('/users');
    });
    
    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });

});