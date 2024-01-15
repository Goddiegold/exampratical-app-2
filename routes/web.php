<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/login", function(){
    if(session()->has('user-token')){
        return redirect("/dashboard");
    }else{
        return view("login");
}
})->name('login');

Route::get("/register",  function(){
    if(session()->has('user-token')){
        return redirect("/dashboard");
    }else{
        return view("register");
}
})->name('register');

Route::get("/profile",[UserController::class, "getUserProfile"])->name('dashboard');

Route::get("/dashboard",[TodoController::class, "1s"])->name('dashboard');

Route::post("/handle-login",[UserController::class, "handleLogin"]);

Route::post("/handle-register",[UserController::class, "handleRegister"]);

Route::get('/add-todo', function () {
    return view('add_todo');
});

Route::post('handle-add-todo',[TodoController::class,'handleAddTodo']);
Route::put('/handle-edit-todo/{todo}',[TodoController::class,'handleEditTodo']);

Route::get('/edit-todo/{todo}',[TodoController::class, 'editTodo']);

Route::get('/logout',function(){
    if(session()->has('user-token')){
        session()->pull('user-token');
        return redirect("/login");
    }
})->name('logout');


Route::get("/favour", function(){
    // echo "FAvour";s

// return "Favour";
return view("favour");
});

