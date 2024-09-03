<?php

use App\Http\Controllers\AdminStudentFomrController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReaserchController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(FrontEndController::class)->group(function (){
    route::get('/','index')->name('index');
    route::get('/about','about')->name('about');
    route::get('/contact','contact')->name('contact');
    route::get('/getCategory','getCategory')->name('getCategory');
    route::get('/setCategory/{cat}','setCategory')->name('setCategory');
    route::get('/setType/{type}','setType')->name('setType');
    route::post('/setSubjects','setSubject')->name('setSubjects');
    route::post('/storeSchedule','storeSchedule')->name('storeSchedule');
    route::get('/selectShedule','selectShedule')->name('selectShedule');
    route::get('/showCheckout','showCheckout')->name('showCheckout');
    route::get('/selectGrade','selectGrade')->name('selectGrade');
    route::post('/setGrade','setGrade')->name('setGrade');
    route::get('/checkout','checkout')->name('checkout');
    route::post('/set_persenal_info','setStudentTutorila')->name('setStudentTutorila');
    route::get('/formStudy','formStudy')->name('formStudy');
    route::post('setStudy','setStudy')->name('setStudy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
Route::controller(CourseController::class)->prefix('/course')->group(function (){
    route::get('/','index')->name('course');
    route::post('/store','store')->name('storeCourse');
    route::post('/update','update')->name('updateCourse');
    route::get('/delete/{id}','delete')->name('deleteCourse');
});

Route::controller(AdminStudentFomrController::class)->prefix('forms')->group(function (){
    route::get('/','index')->name('forms');
    route::get('detail/{id}','detail')->name('formDetail');
});

Route::controller(ReaserchController::class)->prefix('/research')->group(function (){
    route::get('/','index')->name('research');
    route::post('/store','store')->name('storeresearch');
    route::post('/update','update')->name('updateresearch');
    route::get('/delete/{id}','delete')->name('deleteresearch');
});

Route::controller(SubjectController::class)->prefix('/subjects')->group(function (){
    route::get('/','index')->name('subjects');
    route::post('/store','store')->name('storeSubjects');
    route::post('/update','update')->name('updateSubjects');
});

Route::controller(UserController::class)->prefix('users/')->group(function (){
    route::get('/{type}','index')->name('usersFilter');
    route::get('/create','create')->name('createUser');
    route::post('/store','store')->name('storeUser');
    route::post('/update/{id}','update')->name('updateUser');
    route::get('/edit/{id}','edit')->name('userEdit');
    route::get('/profile/{id}','profile')->name('userProfile');
    route::get('/downloadTeacherCv/{id}','downloadTeacherCv')->name('downloadTeacherCv');
    route::post('/updateTeacher/{id}','updateTeacher')->name('updateTeacher');
    route::post('/updateProfilePhoto/{id}','updateProfilePhoto')->name('updateProfilePhoto');

});

Route::controller(ConfigController::class)->prefix('/config')->group(function (){
    route::get('/','index')->name('confgis');
    route::post('update/{slug}','update')->name('updateConfig');
});

});

Route::controller(TeacherController::class)->group(function(){
    route::get('signup-instructor','signup')->name('signupInstructor');
    route::post('instructor-store','store')->name('storInstructor');
});

Route::controller(StudentController::class)->group(function(){
    route::get('signup-student','signup')->name('signupStudent');
    route::post('student-store','store')->name('storeStudent');
});



require __DIR__.'/auth.php';
