<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
use App\Http\Controllers\WorkerPageController;
use App\Http\Controllers\WorkerControllers\AwController;
use Symfony\Component\Routing\RequestContext;
use Illuminate\Support\Facades\Auth;
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
Route::get('/admin',[AdminController::class,'show'])->name('welcome');



Route::get('/whoWE',[PublicController::class,'index'])->name('who-are-we');
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

   Route::get('/advertisiment',[AddvertisimentController::class,'index'])->name('worker.advertisiment')->middleware('auth');
   Route::post('/advertisiment/store',[AddvertisimentController::class,'store'])->name('workerPage.store')->middleware('auth');
   Route::get('/showAdvertisements', [AddvertisimentController::class, 'show'])->name('userPage.advertisements');
   
   Route::get('/worker',[CommentController::class,'index'])->name('user_comment.addComment');
   Route::post('/worker/store',[CommentController::class,'store'])->name('user_comment.store');

        
   Route::get('/edit1/{id}',[CommentController::class,'edit'])->name('user_comment.editComment');

   Route::patch('/update2/{id}', [CommentController::class, 'update'])->name('user_comment.update');

   

   
   Route::get('/list2',[ComentController::class,'index'])->name('user_comment.list2');
   Route::post('/destroy',[ComentController::class,'destroy'])->name('user_comment.destroy');

   Route::get('/get-villages', [PublicController::class, 'getVillages'])->name('get-villages');
   Route::get('/showWorker/{id}',[PublicController::class,'showWorker'])->name('userPage.showWorker');
   Route::get('/filter',[PublicController::class,'filterNav'])->name('userPage.mysearch');
   Route::get('/search/{profession?}', [PublicController::class, 'openCraft'])->name('userPage.getAllUser');


   Route::get('/worker/{id}', [WorkerPageController::class, 'show'])->name('workerPage.showWorker');




  
   Route::post('/changepassword', [UserProfileController::class, 'changePassword'])->name('userPage.changePassword');
   Route::get('/changepass', [UserProfileController::class, 'showPassChange'])->name('changepass')->middleware('auth');
  
  
  
   Route::get('/list',[UserNameController::class,'index'])->name('users.list');




   Route::get('/profile',[AdminController::class,'index'])->name('layouts.adminProfile');
   Route::get('admin/logout',[AdminController::class,'logout'])->name('userPage.logout');



  


   Route::get('userprofile',[UserProfileController::class, 'show'])->name('userPage.userProfile')->middleware('auth');

   Route::patch('/update1', [UserProfileController::class, 'update'])->name('userPage.update');

   Route::post('uploadimg',[UserProfileController::class,'changeImg'])->name('uploadimg');
   
   Route::get('workerprofile/{id}',[WorkeProfilerController::class, 'show'])->name('workerPage.workerProfile');
  
   Route::patch('/update/{id}', [WorkeProfilerController::class, 'update'])->name('workerPage.update');


   Auth::routes();
   Route::get('/',[HomeController::class, 'index'])->name('home');
