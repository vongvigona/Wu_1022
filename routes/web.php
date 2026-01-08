<?php




use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SettingController;






Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('about' , function () {
    return view('about');
})->name('about');
Route::get('contact' , function () {
    return view('contact');
})->name('contact');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// rout management for Role
Route::get('role-index',[RoleController::class,'index'])->name('role.index');
Route::get('role-create',[RoleController::class,'create'])->name('role.create');
Route::post('role-store',[RoleController::class,'store'])->name('role.store');
Route::get('role-edit/{id}',[RoleController::class,'edit'])->name('role.edit');
Route::put('role-update/{id}',[RoleController::class,'update'])->name('role.update');
Route::get('role-Delete/{id}',[RoleController::class,'Delete'])->name('role.Delete');
Route::resource('role', RoleController::class);
// rout management for User
Route::resource('user', UserController::class);
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
// rout management for Banner
Route::resource('banners', BannerController::class);
Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create');
// rout management for Menu
Route::resource('menus', MenuController::class);
Route::get('/menus/create', [MenuController::class, 'create'])->name('menus.create');
// rout management for Article
Route::resource('articles', ArticleController::class);
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])
    ->name('articles.edit');

Route::put('/articles/{id}', [ArticleController::class, 'update'])
    ->name('articles.update');
    // rout management for Setting
Route::get('/settings/edit', [SettingController::class, 'edit'])->name('settings.edit');
Route::put('/settings/{id}', [SettingController::class, 'update'])->name('settings.update');









