<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ComentController;
use App\Http\Controllers\UserNameController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserControllers\AdvertisementController;
use App\Http\Controllers\CrafttController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\WorkeProfilerController;
use App\Http\Controllers\WorkerControllers\AddvertisimentController;
use App\Http\Controllers\WorkerControllers\AwController;
use Symfony\Component\Routing\RequestContext;

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

Route::get('/', function () { return view('welcome');});


Route::get('/whoWE',[PublicController::class,'index'])->name('userPage.who-are-we');
Route::get('/addAdv',[AdvertisementController::class,'index'])->name('user.addAdv');
Route::post('/addAdv/store',[AdvertisementController::class,'store'])->name('userPage.store');
Route::get('/address',[AddressController::class,'index'])->name('address');

Route::prefix('/crafts')->group(function(){
    Route::get('/list',[CrafttController::class,'index'])->name('crafts.list');
    Route::get('/add',[CrafttController::class,'add'])->name('crafts.add');
    Route::post('/add',[CrafttController::class,'store']);
    Route::get('/edit/{id}', [CrafttController::class, 'edit'])->name('crafts.edit');
    Route::patch('/update/{id}', [CrafttController::class, 'update'])->name('crafts.update');
    Route::post('/destroy',[CrafttController::class,'destroy'])->name('crafts.destroy'); });

   Route::get('/advertisiment',[AddvertisimentController::class,'index'])->name('worker.advertisiment');
   Route::post('/advertisiment/store',[AddvertisimentController::class,'store'])->name('workerPage.store');
   
   
   Route::get('/worker',[CommentController::class,'index'])->name('user_comment.addComment');
   Route::post('/worker/store',[CommentController::class,'store'])->name('user_comment.store');


   Route::get('/edit1/{id}',[CommentController::class,'edit'])->name('user_comment.editComment');

   Route::patch('/update2/{id}', [CommentController::class, 'update'])->name('user_comment.update');

   

   
   Route::get('/list2',[ComentController::class,'index'])->name('user_comment.list2');
   Route::post('/destroy',[ComentController::class,'destroy'])->name('user_comment.destroy');





  
  
  
  
  
   Route::get('/list',[UserNameController::class,'index'])->name('users.list');




   Route::get('/profile',[AdminController::class,'index'])->name('layouts.adminProfile');
   Route::get('admin/logout',[AdminController::class,'logout'])->name('userPage.logout');



  


   Route::get('userprofile/{id}',[UserProfileController::class, 'show'])->name('userPage.userProfile');
   Route::patch('/update1/{id}', [UserProfileController::class, 'update'])->name('userPage.update');


   Route::get('workerprofile/{id}',[WorkeProfilerController::class, 'show'])->name('workerPage.workerProfile');
  
   Route::patch('/update/{id}', [WorkeProfilerController::class, 'update'])->name('workerPage.update');
   