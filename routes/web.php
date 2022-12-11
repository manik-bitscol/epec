<?php

use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SisterConcernController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProjectController;
use Illuminate\Support\Facades\Route;

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
Route::get('/clear',function(){
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    echo "Clear All Cache";
    
});
Route::get('/make',function(){
    Artisan::call('make:mail ContactMail');
    echo "Created";
    
});
// Route::get('/migrate',function(){
//     Artisan::call('migrate');
//     echo "migrated";
    
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');
Route::get('/sister-concern/{slug}', [SisterConcernController::class, 'show'])->name('concern.show');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/projects', [ProjectController::class, 'index'])->name('frontend.projects');
Route::post('/project/search', [ProjectController::class, 'search'])->name('frontend.search');
Route::get('/category/{id}', [ProjectController::class, 'showByCategory'])->name('frontend.project.category');
Route::get('/location/{id}', [ProjectController::class, 'showByLocation'])->name('frontend.project.location');
Route::get('/projeect-phase/{id}', [ProjectController::class, 'showByPhase'])->name('frontend.project.phase');
Route::get('/project-type/{id}', [ProjectController::class, 'showByType'])->name('frontend.project.type');
Route::get('/project-detail/{id}', [ProjectController::class, 'show'])->name('frontend.project.show');
Route::get('/sitemap',[App\Http\Controllers\Frontend\SeoController::class,'sitemap'])->name('sitemap');
Route::get('/sitemap.xml',[App\Http\Controllers\Frontend\SeoController::class,'sitemap'])->name('sitemap.xml');
require __DIR__ . '/auth.php';