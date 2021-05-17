/* 
<?php

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\DetailsProyectController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProyectController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\UserPictureController;
use Illuminate\Support\Facades\Route;
use App\Mail\ContactanosMailable;
use App\Mail\SendContactForm;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', PortfolioController::class, 'index');

Auth::routes();

Route::get('/curriculum', [CurriculumController::class,'downloadCV'])->name('curriculum.downloadCV'); 
Route::post('/curriculum', [CurriculumController::class,'uploadCV'])->name('curriculum.uploadCV'); 
Route::resource('/technologies', TechnologyController::class);
Route::resource('/proyects', ProyectController::class);
Route::resource('/detailsProyect', DetailsProyectController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactFormController::class,'index'])->name('contact.index');
Route::post('/contact', [ContactFormController::class,'contactForm'])->name('send.contactForm');
Route::post('/picture', [UserPictureController::class,'update'])->name('picture.update');

