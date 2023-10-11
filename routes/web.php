<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
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




Route::post('/create',[WebsiteController::class,'create'])->name('create');
Route::get('/login',[WebsiteController::class,'login'])->name('login-form');
Route::post('/login',[WebsiteController::class,'login'])->name('login-check');




// Admin Panel Routes
Route::get('/join',[WebsiteController::class,'join'])->name('login');
Route::get('/create',[WebsiteController::class,'create'])->name('create');
// Route::get('/login-page',[AuthController::class,'index'])->name('login-page');
Route::post('/login-check',[AuthController::class,'login'])->name('login-check');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::group(['prefix'=>'/','middleware'=>'auth'],function(){
    Route::get('/',[WebsiteController::class,'index'])->name('home');
    Route::get('/about-us',[WebsiteController::class,'aboutUs'])->name('about-us');
    Route::get('/courses',[WebsiteController::class,'courses'])->name('courses');
    Route::get('/trainers',[WebsiteController::class,'trainers'])->name('trainers');
    Route::get('/course-details/{id}',[WebsiteController::class,'courseDetails'])->name('course-details');
    Route::get('/category/course',[WebsiteController::class,'categoryCourse'])->name('category-courses');
});


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    

    Route::group(['prefix'=>'category'],function(){
        Route::get('add',[CategoryController::class,'add'])->name('category.add');
        Route::post('store',[CategoryController::class,'store'])->name('category.store');
        Route::get('/',[CategoryController::class,'index'])->name('category');
        Route::get('edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('update',[CategoryController::class,'update'])->name('category.update');
        Route::get('delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
    });
    
    Route::group(['prefix'=>'course'],function(){
        Route::get('add',[CourseController::class,'add'])->name('course.add');
        Route::post('store',[CourseController::class,'store'])->name('course.store');
        Route::get('/',[CourseController::class,'index'])->name('course');
        Route::get('edit/{id}',[CourseController::class,'edit'])->name('course.edit');
        Route::post('update',[CourseController::class,'update'])->name('course.update');
        Route::get('delete/{id}',[CourseController::class,'delete'])->name('course.delete');
    });
     
    Route::group(['prefix'=>'lecture'],function(){
        Route::get('add',[LectureController::class,'add'])->name('lecture.add');
        Route::post('store',[LectureController::class,'store'])->name('lecture.store');
        Route::get('/',[LectureController::class,'index'])->name('lecture');
        Route::get('edit/{id}',[LectureController::class,'edit'])->name('lecture.edit');
        Route::post('update',[LectureController::class,'update'])->name('lecture.update');
        Route::get('delete/{id}',[LectureController::class,'delete'])->name('lecture.delete');
    });
    Route::group(['prefix'=>'trainer'],function(){
        Route::get('add',[TrainerController::class,'add'])->name('trainer.add');
        Route::post('store',[TrainerController::class,'store'])->name('trainer.store');
        Route::get('/',[TrainerController::class,'index'])->name('trainer');
        Route::get('edit/{id}',[TrainerController::class,'edit'])->name('trainer.edit');
        Route::post('update',[TrainerController::class,'update'])->name('trainer.update');
        Route::get('delete/{id}',[TrainerController::class,'delete'])->name('trainer.delete');
    });
    
    Route::group(['prefix'=>'user'],function(){
        Route::get('add',[UserController::class,'add'])->name('user.add');
        Route::post('store',[UserController::class,'store'])->name('user.store');
        Route::get('/',[UserController::class,'index'])->name('user');
        Route::get('edit/{id}',[UserController::class,'edit'])->name('user.edit');
        Route::post('update',[UserController::class,'update'])->name('user.update');
        Route::get('delete/{id}',[UserController::class,'delete'])->name('user.delete');
    });
    Route::group(['prefix'=>'announcement'],function(){
        Route::get('add',[AnnouncementController::class,'add'])->name('announcement.add');
        Route::post('store',[AnnouncementController::class,'store'])->name('announcement.store');
        Route::get('/',[AnnouncementController::class,'index'])->name('announcement');
        Route::get('edit/{id}',[AnnouncementController::class,'edit'])->name('announcement.edit');
        Route::post('update',[AnnouncementController::class,'update'])->name('announcement.update');
        Route::get('delete/{id}',[AnnouncementController::class,'delete'])->name('announcement.delete');
    });
    Route::group(['prefix'=>'quiz'],function(){
        Route::get('add',[QuizController::class,'add'])->name('quiz.add');
        Route::post('store',[QuizController::class,'store'])->name('quiz.store');
        Route::get('/',[QuizController::class,'index'])->name('quiz');
        Route::get('edit/{id}',[QuizController::class,'edit'])->name('quiz.edit');
        Route::post('update',[QuizController::class,'update'])->name('quiz.update');
        Route::get('delete/{id}',[QuizController::class,'delete'])->name('quiz.delete');
    });
    Route::get('/',function(){
        return redirect()->route('category.add');
    });
});

