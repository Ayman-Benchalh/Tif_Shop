<?php
namespace App\Http\Controllers\GlobalController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\MailController;
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

Route::get('/', [GlobalController::class,'firstPage'])->name('firstPage');
Route::get('/login', [GlobalController::class,'login'])->name('login.page');
Route::post('/loginSend', [GlobalController::class,'loginPost'])->name('loginPost.page');
Route::get('/CreateAccount', [GlobalController::class,'CreateAccount'])->name('CreateAccount.page');
Route::post('/CreateAccountSend', [GlobalController::class,'CreateAccountPost'])->name('CreateAccountPost.page');

Route::get('/Shop',[GlobalController::class,'shop'])->name('shope.page');
Route::get('/About',[GlobalController::class,'About'])->name('About.page');
Route::get('/Contact',[GlobalController::class,'Contact'])->name('Contact.page');

Route::post('/Inserdata',[GlobalController::class,'Inserdataprod'])->name('Inserdataprod.page');
Route::get('/InserdataView',[GlobalController::class,'InserdataView'])->name('InserdataView.page');

Route::post('/sendUser', [GlobalController::class,'sendUser'])->name('sendUser');
Route::get('/PrintUser', [GlobalController::class,'PrintUser'])->name('PrintUser');


Route::get('/logOUt',[GlobalController::class,'logOUt'])->name('logOUt');

Route::get('/VerfiMail',[GlobalController::class,'VerfiMail'])->name('VerfiMail');
Route::get('/verficACCoutn/{token}/{email}',[GlobalController::class,'goToPageVerf'])->name('verficACCoutn.page');


Route::get('/shopSingle/idProduct={idProd}',[GlobalController::class,'shopSingle'])->name('shopSingle.page');


Route::get('/CartPage',[GlobalController::class,'CartPage'])->name('Cart.page');
Route::post('/bUy',[GlobalController::class,'bUy'])->name('bUy.page');

Route::delete('/deleteOne',[GlobalController::class,'deleteOneprod'])->name('deleteOneprod');

Route::get('/Profile',[GlobalController::class,'Profile'])->name('Profile.page');

Route::put('/EditeProfile',[GlobalController::class,'EditeProfile'])->name('EditeProfile.page');
Route::delete('/DeletProfile',[GlobalController::class,'DeleteProfle'])->name('DeletProfile.page');