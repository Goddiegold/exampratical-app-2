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

Route::get("/dashboard",[TodoController::class, "getTodos"])->name('dashboard');

Route::post("/handle-login",[UserController::class, "handleLogin"]);

Route::post("/handle-register",[UserController::class, "handleRegister"]);

Route::get('/add-todo', function () {
    if(session()->has('user-token')){
    return view('add_todo');
    }else{
        return redirect("/login");
    }
});

Route::post('handle-add-todo',[TodoController::class,'handleAddTodo']);
Route::put('/handle-edit-todo/{todo}',[TodoController::class,'handleEditTodo']);

Route::get('/delete-todo/{todo}',[TodoController::class,'deleteTodo']);


Route::get('/edit-todo/{todo}',[TodoController::class, 'editTodo']);

Route::get('/view-todo/{todo}',[TodoController::class, 'viewTodo']);

Route::get('/logout',function(){
    if(session()->has('user-token')){
        session()->pull('user-token');
        return redirect("/login");
    }
})->name('logout');

