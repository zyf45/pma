<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

// 首页 [实习岗位列表]
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// 雇主注册页面路由
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
// 雇主注册提交路由
Route::post('/register', [AuthController::class, 'register']);
// 雇主登录页面
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// 处理雇主登录请求
Route::post('/login', [AuthController::class, 'login']);
// 雇主退出登录
Route::get('/logout', [AuthController::class, 'logout']);


// 雇主创建实习岗位页面
Route::get('/add', [DashboardController::class, 'showAdd'])->name('add');
// 雇主创建实习岗位
Route::post('/add', [DashboardController::class, 'add']);
// 雇主编辑实习岗位页面
Route::get('/edit/{id}', [DashboardController::class, 'showEdit'])->name('edit');
// 雇主编辑实习岗位
Route::post('/edit/{id}', [DashboardController::class, 'edit']);

// 首页筛选
Route::get('/dashboard/filter', [DashboardController::class, 'filter'])->name('filter');
// 获取所有雇主
Route::get('/getEmployers', [DashboardController::class, 'getEmployers']);
// 最新发布
Route::get('/sortLatest', [DashboardController::class, 'sortLatest']);
