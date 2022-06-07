<?php

use App\Http\Controllers\admincontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\comitteeC;
use App\Http\Controllers\supervisorC;
use App\Http\Controllers\studentC;

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

Route::get('/index', function () {  // Route for login page
    return view('index');
});

Route::post('login',[userController::class,'login'])->name('user.login');  //Route for Login
Route::get('logout',[usercontroller::class,'logout'])->name('user.logout');


Route::group(['middleware'=>['authcheck']], function(){
    Route::get('feed',[usercontroller::class,'feed']);  //Route for feed page
    Route::post('suppost',[usercontroller::class,'postupload'])->name('sup.post'); //Route uploading post

    //Admin's Related Routes
    Route::get('create',[admincontroller::class,'create']); //Route to get to create comiittee interface
    Route::post('cratec',[admincontroller::class,'createcomiittee'])->name('admin.create'); //Route to upload commiittee  data into database
    Route::get('detail',[admincontroller::class,'detail']); //Route to get to comiittee detail interface

    //Committee Routes
    Route::get('upload',[comitteeC::class,'upload']); //Route to get to upload interface
    Route::post('uploadsup',[comitteeC::class,'supupload'])->name('upload.supervisor'); //Route to upload commiittee  data into database
    Route::post('uploadstd',[comitteeC::class,'stdupload'])->name('upload.student'); //Route to upload commiittee  data into database
    Route::get('pending',[comitteeC::class,'pending']); //ROUTE TO CHECK PENDING REQUESTS BY SUPS
    Route::get('aprove/{id}',[comitteeC::class,'aprove']); //ROUTE TO APPROVE SUP REQUEST
    Route::get('decline/{id}',[comitteeC::class,'decline']); //ROUTE TO DECLINE SUP REQUEST
    Route::get('rejected',[comitteeC::class,'rejected']);  //ROUTE TO GOT TO REQUEST'S REJECT'S REASONS BY SUP

    //Supervisor Routes
    Route::get('suprequest',[supervisorC::class,'request']); //ROUTE TO GO TO RECEIVED REQUESTS BY STDS
    Route::get('acceptreq/{id}',[supervisorC::class,'accept']); //ROUTE FOR ACCEPTING STDS REQUEST
    Route::get('rejectreq/{id}',[supervisorC::class,'reject']); //ROUTE FOR REJECTING STDS REQUEST
    Route::get('reasonpage',[supervisorC::class,'reasonpage']); //ROUTE FOR REASON INTERFACE
    Route::post('rejectreason',[supervisorC::class,'reason']); //FOR REJECTING GROUP REQUEST 


    //Student Routes
    Route::get('sendreqi',[studentC::class,'sendreqi']); //Route to get to send request interface
    Route::get('send/{id}',[studentC::class,'send']); //Route to send request to student
    Route::get('sendreq_to_sup/{id}',[studentC::class,'sendsupreq']); //Route to send request to supervisor
    Route::get('receivedstdreq',[studentC::class,'receivedreq']); 
    Route::get('reject/{id}',[studentC::class,'reject']); //Student Reject Request Route
    Route::get('accept/{id}',[studentC::class,'accept']); //Student Accept Request Route

    //Group route for both students and supervisors
    Route::get('groups',[studentC::class,'groups']); 
    




});

