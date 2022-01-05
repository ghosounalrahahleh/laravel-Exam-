<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UanswerController;
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

Route::get('/', function () {
    return view('public-site.index');
});
Route::resource('categories', CategoryController::class);
Route::resource('exams', ExamController::class);
Route::resource('questions', QuestionController::class);
Route::resource('uanswers', UanswerController::class);
Route::resource('results', ResultController::class);
Route::resource('users', UserController::class);
//
Route::get('/search', [ExamController::class, 'search'])->name('search');

//Admin dashboard Roles CRUD
Route::get('/admin/displayusers', [UserController::class, "backendindex"])->name('user.index');
Route::post('/admin/addusers', [UserController::class, "backendstore"])->name('user.add');
Route::get('/admin/editusers/{id}', [UserController::class, "backendedit"])->name('user.edit');
Route::get('/admin/deleteusers/{id}', [UserController::class, "backenddestroy"])->name('user.delete');
Route::post('/admin/updateusers/{id}', [UserController::class, "backendupdate"])->name('user.update');

//Admin dashboard Roles CRUD
Route::get('/admin/displayRoles', [RoleController::class, "backendindex"])->name('roles.index');
Route::post('/admin/addRoles', [RoleController::class, "backendstore"])->name('role.add');
Route::get('/admin/editRoles/{id}', [RoleController::class, "backendedit"])->name('role.edit');
Route::get('/admin/deleteRoles/{id}', [RoleController::class, "backenddestroy"])->name('role.delete');
Route::post('/admin/updateRoles/{id}', [RoleController::class, "backendupdate"])->name('role.update');

//Admin dashboard Categories CRUD
Route::get('/admin/displayCategories', [CategoryController::class, "backendindex"])->name('category.index');
Route::post('/admin/addCategories', [CategoryController::class, "backendstore"])->name('category.add');
Route::get('/admin/editCategories/{id}', [CategoryController::class, "backendedit"])->name('category.edit');
Route::get('/admin/deleteCategories/{id}', [CategoryController::class, "backenddestroy"])->name('category.delete');
Route::post('/admin/updateCategories/{id}', [CategoryController::class, "backendupdate"])->name('category.update');

//Admin dashboard exams CRUD
Route::get('/admin/displayExams', [ExamController::class, "backendindex"])->name('exams.index');
Route::post('/admin/addExams', [ExamController::class, "backendstore"])->name('exam.add');
Route::get('/admin/editExams/{id}', [ExamController::class, "backendedit"])->name('exam.edit');
Route::get('/admin/deleteExams/{id}', [ExamController::class, "backenddestroy"])->name('exam.delete');
Route::post('/admin/updateExams/{id}', [ExamController::class, "backendupdate"])->name('exam.update');

//Admin dashboard Questions CRUD
Route::get('/admin/displayQuestions', [QuestionController::class, "backendindex"])->name('questions.index');
Route::post('/admin/addQuestions', [QuestionController::class, "backendstore"])->name('question.add');
Route::get('/admin/editQuestions/{id}', [QuestionController::class, "backendedit"])->name('question.edit');
Route::get('/admin/deleteQuestions/{id}', [QuestionController::class, "backenddestroy"])->name('question.delete');
Route::post('/admin/updateQuestions/{id}', [QuestionController::class, "backendupdate"])->name('question.update');

//Admin dashboard Questions CRUD
Route::get('/admin/displayAnswers', [AnswerController::class, "backendindex"])->name('answers.index');
Route::post('/admin/addAnswers', [AnswerController::class, "backendstore"])->name('answer.add');
Route::get('/admin/editAnswers/{id}', [AnswerController::class, "backendedit"])->name('answer.edit');
Route::get('/admin/deleteAnswers/{id}', [AnswerController::class, "backenddestroy"])->name('answer.delete');
Route::post('/admin/updateAnswers/{id}', [AnswerController::class, "backendupdate"])->name('answer.update');

//Admin dashboard Result CRUD
Route::get('/admin/displayResults', [ResultController::class, "backendindex"])->name('result.index');
Route::post('/admin/addResults', [ResultController::class, "backendstore"])->name('result.add');
Route::get('/admin/editResults/{id}', [ResultController::class, "backendedit"])->name('result.edit');
Route::get('/admin/deleteResults/{id}', [ResultController::class, "backenddestroy"])->name('result.delete');
Route::post('/admin/updateResults/{id}', [ResultController::class, "backendupdate"])->name('result.update');

//Admin dashboard Roles CRUD
Route::get('/admin/displayRoles', [RoleController::class, "backendindex"])->name('roles.index');
Route::post('/admin/addRoles', [RoleController::class, "backendstore"])->name('role.add');
Route::get('/admin/editRoles/{id}', [RoleController::class, "backendedit"])->name('role.edit');
Route::get('/admin/deleteRoles/{id}', [RoleController::class, "backenddestroy"])->name('role.delete');
Route::post('/admin/updateRoles/{id}', [RoleController::class, "backendupdate"])->name('role.update');

//auth routs
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('role_id');
