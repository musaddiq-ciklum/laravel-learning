<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;

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

Route::get('/test', function () {
    echo getProductUrl(1);
});
Route::get('/', [MainController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*      Admin Routs     */
/*Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth'])->name('dashboard');*/

Route::get('/permissions/create', [\App\Http\Controllers\PermissionController::class, 'create'])->name('create_permission');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin/dashboard');
    })->name('dashboard');
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin_categories');
    Route::get('/category/add', [CategoryController::class, 'create'])->name('create_category');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('store_category');
    Route::get('/category/{category}', [CategoryController::class, 'show']);
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('edit_category');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('update_category');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('delete_category');

    Route::put('/products/change-status',[ProductController::class,'change_status'])->name('change_product_status');
    Route::resource('/products', ProductController::class)->name('*','products');
    Route::resource('/pages',PageController::class)->name('*','pages');

    Route::get('/posts',[PostController::class,'index'])->name('admin_posts');

    Route::middleware('role:admin|writer')->group(function(){
   // Route::middleware(['auth'])->group(function(){
        Route::get('/posts/create',[PostController::class,'create'])
            ->name('posts.create');
        Route::post('/posts/store',[PostController::class,'store'])
            ->name('posts.store');
        Route::post('/posts/{post}',[PostController::class,'update'])
            ->name('posts.update');
        Route::delete('/posts/{post}',[PostController::class,'destroy'])
            ->name('posts.destroy');
    });
    Route::get('/posts/{post}/edit',[PostController::class,'edit'])
        ->name('posts.edit')
        ->middleware('role:admin|writer|editor');
    Route::put('/posts/{post}/publish',[PostController::class,'publish'])
        ->name('posts.publish')
        ->middleware('role:admin|writer|editor|publisher');

    /*Route::get('/posts/create',[PostController::class,'create'])
        ->name('posts.create')
        ->middleware('role:admin|writer');*/
});

/*      Front Routs     */
Route::middleware('auth')->group(function (){
    Route::get('/profile',[UserController::class, 'profile'])
        ->middleware(['password.confirm'])
        ->name('profile');
});


require __DIR__.'/auth.php';
