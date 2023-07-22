<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Auth\LogoutController;

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ComentController;
use App\Http\Controllers\UserNameController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserControllers\AdvertisementController;
use App\Http\Controllers\AdvertisementController2;
use App\Http\Controllers\CrafttController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\OtherUserProfileController;
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




Route::get('/whoWE',[PublicController::class,'index'])->name('who-are-we')->middleware('auth');

Route::get('/admin',[AdminController::class,'show'])->name('welcome')->middleware('auth');



Route::get('/addAdv',[AdvertisementController::class,'index'])->name('user.addAdv');
Route::post('/addAdv/store',[AdvertisementController::class,'store'])->name('userPage.store');
Route::get('/address',[AddressController::class,'index'])->name('address');

Route::prefix('/crafts')->group(function(){
    Route::get('/list',[CrafttController::class,'index'])->name('crafts.list')->middleware('auth');
    Route::get('/add',[CrafttController::class,'add'])->name('crafts.add')->middleware('auth');
    Route::post('/add',[CrafttController::class,'store'])->middleware('auth');
    Route::get('/edit/{id}', [CrafttController::class, 'edit'])->name('crafts.edit')->middleware('auth');

    Route::patch('/update/{id}', [CrafttController::class, 'update'])->name('crafts.update')->middleware('auth');
    Route::post('/destroy',[CrafttController::class,'destroy'])->name('crafts.destroy')->middleware('auth'); });

   Route::get('/advertisiment2',[AdvertisementController2::class,'show'])->name('advertisiment2')->middleware('auth');
   Route::get('/advertisiment',[HomeController::class,'index'])->name('worker.advertisiment')->middleware('auth');
   Route::post('/advertisiment/store',[HomeController::class,'store'])->name('workerPage.store')->middleware('auth');
   Route::get('/showAdvertisements', [AddvertisimentController::class, 'show'])->name('userPage.advertisements');
   Route::get('/adSectionInHome', [AddvertisimentController::class, 'adsInHome'])->name('userPage.adsInHome');

   Route::get('/worker',[CommentController::class,'index'])->name('user_comment.addComment');
   Route::post('/worker/store/{id}',[CommentController::class,'store'])->name('user_comment.store');
   Route::post('/user/{id}/become-worker', [UserProfileController::class, 'becomeWorker'])->name('userPage.becomeWorker');
   Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
        
   Route::get('/edit1/{id}',[CommentController::class,'edit'])->name('user_comment.editComment');

   Route::patch('/update2/{id}', [CommentController::class, 'update'])->name('user_comment.update');

   

   Route::post('/user/{id}/become-worker', [UserProfileController::class, 'becomeWorker'])->name('userPage.becomeWorker')->middleware('auth');
   
   Route::get('/list2',[ComentController::class,'index'])->name('user_comment.list2');
   Route::post('/destroy',[ComentController::class,'destroy'])->name('user_comment.destroy');

   Route::get('/get-villages', [PublicController::class, 'getVillages'])->name('get-villages');
  Route::get('/otherUserProfile2/{id}',[WorkerPageController::class,'show'])->name('userPage.otherUserProfile2');
   //Route::get('/filter',[PublicController::class,'filterNav'])->name('userPage.mysearch');
  // Route::get('/search/{profession?}', [PublicController::class, 'openCraft'])->name('userPage.getAllUser');
   Route::get('/showWorker/{id}',[PublicController::class,'showWorker'])->name('userPage.showWorker');
   Route::get('/filter',[PublicController::class,'filterNav'])->name('userPage.mysearch')->middleware('auth');
   Route::get('/search/{profession?}', [PublicController::class, 'openCraft'])->name('userPage.getAllUser')->middleware('auth');
   Route::get('/users/search',[PublicController::class,'nameSearch'])->name('users.search');

   Route::get('/worker/{id}', [WorkerPageController::class, 'show'])->name('workerPage.showWorker');
   Route::get('/users/search',[PublicController::class,'nameSearch'])->name('users.search');
   Route::get('/searchSuggestions', [PublicController::class , 'searchSuggestions'])->name('search.suggestions');


   Route::get('/name-search', [PublicController::class, 'nameSearch'])->name('name.search');


  

   Route::post('/changepassword', [UserProfileController::class, 'changePassword'])->name('userPage.changePassword')->middleware('auth');;
   Route::get('/changepass', [UserProfileController::class, 'showPassChange'])->name('changepass')->middleware('auth');
  
  
  
   Route::get('/list',[UserNameController::class,'index'])->name('users.list');




   Route::get('/profile',[AdminController::class,'index'])->name('layouts.adminProfile');
   Route::get('admin/logout',[AdminController::class,'logout'])->name('userPage.logout');



//    Route::post('/logout',[LogoutController::class,'destroy'])->name('logout');

  

   Route::get('userprofile',[UserProfileController::class, 'show'])->name('userPage.userProfile')->middleware('auth');
   Route::get('otheruserprofile',[OtherUserProfileController::class, 'show'])->name('userPage.otherUserProfile')->middleware('auth');


   Route::patch('/update1', [UserProfileController::class, 'update'])->name('userPage.update')->middleware('auth');;

   Route::post('uploadimg',[UserProfileController::class,'changeImg'])->name('uploadimg')->middleware('auth');;

   Route::post('/delete-craft', [UserProfileController::class, 'deleteCraft'])->name('craft.delete');
   Route::post('/delete-all-crafts', [UserProfileController::class, 'deleteAllCrafts'])->name('craft.deleteAll');



   Route::post('/delete-craft', [WorkeProfilerController::class, 'deleteCraft'])->name('craft.delete');
   Route::post('/delete-all-crafts', [WorkeProfilerController::class, 'deleteAllCrafts'])->name('craft.deleteAll');
   
   Auth::routes();
   Route::get('/',[HomeController::class, 'index'])->name('home');
   Route::post('sendrate',[WorkerPageController::class , 'rate']);
