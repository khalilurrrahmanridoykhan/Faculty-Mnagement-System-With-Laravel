<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Pages\CourseController;
use App\Http\Controllers\Admin\Pages\CourseFacultyAssignment;
use App\Http\Controllers\Admin\Pages\DashbordConoller;
use App\Http\Controllers\Admin\Pages\FacultyController;
use App\Http\Controllers\Admin\Pages\ParalalCourseController;
use App\Http\Controllers\Admin\Pages\SectionCOntoller;
use App\Http\Controllers\Admin\Pages\TimeSlotContoller;
use App\Http\Controllers\Admin\Pages\UniOtherInforContoller;
use App\Http\Controllers\fontend\HomeController as FontendHomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TempImageFacultyContoller;
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

Route::get('/', function () {
    return view('welcome');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login')->middleware('guest:admin');

Route::post('/admin/login/store', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');

Route::group(['middleware' => 'admin'], function() {

    Route::get('/admin/main', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');


    //Faculty backend pages:

    Route::get('/admin/faculty/create',[FacultyController::class, 'create'])->name('admin.faculty.create');
    Route::post('/admin/faculty/temp',[TempImageFacultyContoller::class, 'upload'])->name('admin.faculty.temp');
    Route::post('/admin/faculty/save',[FacultyController::class, 'save'])->name('admin.faculty.save');
    Route::get('/admin/faculty/list', [FacultyController::class, 'index'])->name('admin.faculty.index');
    Route::get('/admin/faculty/edit/{id}', [FacultyController::class, 'edit'])->name('admin.faculty.edit');
    Route::get('/admin/faculty/delete/{id}', [FacultyController::class, 'delete'])->name('admin.faculty.delete');
    Route::post('/admin/faculty/update/{id}', [FacultyController::class, 'update'])->name('admin.faculty.update');


    //Paralal Courses Backend Pages:

    Route::get('/admin/paralacourse/create',[ParalalCourseController::class, 'create'])->name('admin.paralacourse.create');
    Route::post('/admin/paralacourse/save',[ParalalCourseController::class, 'save'])->name('admin.paralacourse.save');
    Route::get('/admin/paralacourse/list', [ParalalCourseController::class, 'index'])->name('admin.paralacourse.index');
    Route::get('/admin/paralacourse/edit/{id}', [ParalalCourseController::class, 'edit'])->name('admin.paralacourse.edit');
    Route::get('/admin/paralacourse/delete/{id}', [ParalalCourseController::class, 'delete'])->name('admin.paralacourse.delete');
    Route::post('/admin/paralacourse/update/{id}', [ParalalCourseController::class, 'update'])->name('admin.paralacourse.update');


    //Courses Backend Pages:

    Route::get('/admin/course/create',[CourseController::class, 'create'])->name('admin.course.create');
    Route::post('/admin/course/save',[CourseController::class, 'save'])->name('admin.course.save');
    Route::get('/admin/course/list', [CourseController::class, 'index'])->name('admin.course.index');
    Route::get('/admin/course/edit/{id}', [CourseController::class, 'edit'])->name('admin.course.edit');
    Route::get('/admin/course/delete/{id}', [CourseController::class, 'delete'])->name('admin.course.delete');
    Route::post('/admin/course/update/{id}', [CourseController::class, 'update'])->name('admin.course.update');


    //Section Backend Pages:

    Route::get('/admin/section/create',[SectionCOntoller::class, 'create'])->name('admin.section.create');
    Route::post('/admin/section/save',[SectionCOntoller::class, 'save'])->name('admin.section.save');
    Route::get('/admin/section/list', [SectionCOntoller::class, 'index'])->name('admin.section.index');
    Route::get('/admin/section/edit/{id}', [SectionCOntoller::class, 'edit'])->name('admin.section.edit');
    Route::get('/admin/section/delete/{id}', [SectionCOntoller::class, 'delete'])->name('admin.section.delete');
    Route::post('/admin/section/update/{id}', [SectionCOntoller::class, 'update'])->name('admin.section.update');


    //TimeSlot Backend Pages:

    Route::get('/admin/timeslot/create',[TimeSlotContoller::class, 'create'])->name('admin.timeslot.create');
    Route::post('/admin/timeslot/save',[TimeSlotContoller::class, 'save'])->name('admin.timeslot.save');
    Route::get('/admin/timeslot/list', [TimeSlotContoller::class, 'index'])->name('admin.timeslot.index');
    Route::get('/admin/timeslot/edit/{id}', [TimeSlotContoller::class, 'edit'])->name('admin.timeslot.edit');
    Route::get('/admin/timeslot/delete/{id}', [TimeSlotContoller::class, 'delete'])->name('admin.timeslot.delete');
    Route::post('/admin/timeslot/update/{id}', [TimeSlotContoller::class, 'update'])->name('admin.timeslot.update');

    Route::get('/admin/timeslot/gettimedlotdata',[TimeSlotContoller::class, 'gettimedlotdata'])->name('admin.timeslot.gettimedlotdata');


    //University Other Page Backend Pages:

    Route::get('/admin/uniotherinfo/create',[UniOtherInforContoller::class, 'create'])->name('admin.uniotherinfo.create');
    Route::post('/admin/uniotherinfo/save',[UniOtherInforContoller::class, 'save'])->name('admin.uniotherinfo.save');
    Route::get('/admin/uniotherinfo/list', [UniOtherInforContoller::class, 'index'])->name('admin.uniotherinfo.index');
    Route::get('/admin/uniotherinfo/edit/{id}', [UniOtherInforContoller::class, 'edit'])->name('admin.uniotherinfo.edit');
    Route::get('/admin/uniotherinfo/delete/{id}', [UniOtherInforContoller::class, 'delete'])->name('admin.uniotherinfo.delete');
    Route::post('/admin/uniotherinfo/update/{id}', [UniOtherInforContoller::class, 'update'])->name('admin.uniotherinfo.update');



    //Assignment Backend Pages:

    Route::get('/admin/assignment/create',[CourseFacultyAssignment::class, 'create'])->name('admin.assignment.create');
    Route::post('/admin/assignment/save',[CourseFacultyAssignment::class, 'save'])->name('admin.assignment.save');
    Route::post('/admin/assignment/savefaculrysection',[CourseFacultyAssignment::class, 'savefaculrysection'])->name('admin.assignment.savefaculrysection');
    Route::get('/admin/assignment/list', [CourseFacultyAssignment::class, 'index'])->name('admin.assignment.index');
    Route::get('/admin/assignment/edit/{id}', [CourseFacultyAssignment::class, 'edit'])->name('admin.assignment.edit');
    Route::get('/admin/assignment/delete/{id}', [CourseFacultyAssignment::class, 'delete'])->name('admin.assignment.delete');
    Route::post('/admin/assignment/update/{id}', [CourseFacultyAssignment::class, 'update'])->name('admin.assignment.update');


    Route::get('/admin/assignment/getsectionfacluty', [CourseFacultyAssignment::class, 'getsectionfacluty'])->name('admin.assignment.getsectionfacluty');

    Route::post('/timslot-get-all-deta', [CourseFacultyAssignment::class, 'timeslotdataget']);

    Route::post('/checkthecriditlessthe11', [CourseFacultyAssignment::class, 'checkthecriditlessthe11']);


    //Dashbord Backend pages:

    Route::get('/admin/dashbord',[DashbordConoller::class, 'dashbord'])->name('admin.dashbord.index');


});





//Fontend pages

Route::get('/', [FontendHomeController::class, 'index'])->name('fontend.home');
Route::get('/faculty/detail/{id}',[FontendHomeController::class, 'detail'])->name('fontend.faculty.detail');

Route::get('/contact',[ContactController::class, 'index'])->name('fontend.contact');

// Service pages fontend.

Route::get('/service',[ServicesController::class, 'index'])->name('fontend.service');


// Blog pages fontend.

Route::get('/blog',[BlogsController::class, 'index'])->name('fontend.blog');
Route::get('/blog/detail/{id}',[BlogsController::class, 'detail'])->name('fontend.blog.detail');
Route::post('/blog/savecomment', [BlogsController::class, 'savecomment'])->name('fontend.blog.commentsave');
Route::get('/blog/comment/show', [BlogsController::class, 'showcomment']);


// Faq pages fontend.

Route::get('/faq',[FaqController::class, 'index'])->name('fontend.faq');

// Manage Pages fontend.
// Route::get('/about',[AboutController::class, 'index'])->name('fontend.about');
Route::get('/about',[ManagePageContorller::class, 'about'])->name('fontend.about');
Route::get('/privacy',[ManagePageContorller::class, 'privacy'])->name('fontend.privacy');
Route::get('/terms',[ManagePageContorller::class, 'terms'])->name('fontend.terms');

// ..............End fontend...........//
