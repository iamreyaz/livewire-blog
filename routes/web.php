<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Admins;
use App\Livewire\Post;
use App\Livewire\Category;
use App\Livewire\Blogpost;
use App\Livewire\PermissionList;
use App\Livewire\BlogDetail;

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

Route::group(['prefix' => 'admin', 'middleware'=>['web', 'isAdmin']], function(){
    Route::get('/dashboard', function () {
        return view('adminView');
    });
    Route::view('/blog', 'blogPost')->name('blog');
    Route::view('/admin', 'permissionList')->name('admin');
});



Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin', function () {
//     return view('adminView');
// });
// Route::get('/dashboard', function () {
//     return view('adminView');
// });
Route::view('/addadmin', 'adminForm')->name('addadmin');
Route::view('/addcategory', 'addCategory')->name('addcategory');
Route::view('/admin', 'permissionList')->name('admin');
Route::view('/bloglist', 'blogList')->name('bloglist');
Route::view('/blog', 'blogPost')->name('blog');
Route::get('/blogdetail/{id}', BlogDetail::class)->name('blogdetail');
Route::view('/login', 'loginform')->name('login');
// Route::view('/logout', 'logout');
Route::get('/logout', 'LoginAuthentic@logout');

Route::get('/home', Home::class);
// Route::get('/adminss', Admins::class);