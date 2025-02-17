<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Models\Schedule;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\UserContentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\SetController;
use App\Http\Controllers\Admin\DayController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ExerciseController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\Admin\PracticeCategoryController;
use App\Http\Controllers\Admin\PracticeExerciseController;
Route::get('/', function () {
    return view('welcome');
});

// Shared dashboard route
Route::get('/dashboard', function () {
    $user = Auth::user();

    // Redirect based on the user's role
    switch ($user->role) {
        case 'professional':
            return redirect()->route('professional.dashboard');
        case 'admin':
            return redirect()->route('admin.dashboard');
        default:
            return redirect()->route('user.dashboard'); // Default to user dashboard
    }
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth', RoleMiddleware::class . ':user'])->group(function () {
    Route::view('/user/dashboard', 'user.dashboard')->name('user.dashboard');
});

Route::middleware(['auth', RoleMiddleware::class . ':professional'])->group(function () {
    Route::view('/professional/dashboard', 'professional.dashboard')->name('professional.dashboard');
});

Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
});
// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/content', [UserContentController::class, 'index'])->name('user.content.index');
    Route::get('/content/{category}', [UserContentController::class, 'showCategory'])->name('user.content.category');
    Route::post('/user/content/{category}/level/{level}/submit-recording', [UserContentController::class, 'submitRecording'])
    ->name('user.content.submitRecording');
});






Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('sets', SetController::class);
    Route::resource('days', DayController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('exercises', ExerciseController::class);
        // Practice Category Routes
        Route::resource('practiceCategories', PracticeCategoryController::class);

        // Practice Exercise Routes
        Route::resource('practiceExercises', PracticeExerciseController::class);
});
require __DIR__.'/auth.php';

Route::get('/admin/days/create/{set}', [DayController::class, 'create'])->name('admin.days.create');
Route::post('/admin/days/store/{set}', [DayController::class, 'store'])->name('admin.days.store');

Route::get('/admin/sets/{set}/days', [DayController::class, 'index'])->name('admin.sets.days.index');

Route::get('/admin/days/categories/{day}', [CategoryController::class, 'index'])->name('admin.days.categories.index');
Route::get('/admin/days/categories/create/{day}', [CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/days/categories/store/{day}', [CategoryController::class, 'store'])->name('admin.categories.store');

Route::get('/admin/categories/exercises/{category}', [ExerciseController::class, 'index'])->name('admin.categories.exercises.index');
Route::get('/admin/categories/exercises/create/{category}', [ExerciseController::class, 'create'])->name('admin.exercises.create');
Route::post('/admin/categories/exercises/store/{category}', [ExerciseController::class, 'store'])->name('admin.exercises.store');


Route::prefix('user')->name('user.')->group(function () {
    Route::get('/activityExercise', [\App\Http\Controllers\User\ExerciseController::class, 'index'])->name('exercises.index');
    Route::get('/set/{set}/days', [\App\Http\Controllers\User\ExerciseController::class, 'showDays'])->name('exercises.days');
    Route::get('/day/{day}/categories', [\App\Http\Controllers\User\ExerciseController::class, 'showCategories'])->name('exercises.categories');
    Route::get('/category/{category}/exercises', [\App\Http\Controllers\User\ExerciseController::class, 'showExercises'])->name('exercises.exercises');
    Route::get('/exercise/{exercise}/record', [\App\Http\Controllers\User\ExerciseController::class, 'record'])->name('exercises.record');
    Route::post('/exercise/{exercise}/submit', [\App\Http\Controllers\User\ExerciseController::class, 'submit'])->name('exercises.submit');
});


// Route to show the user list (index page)
Route::get('/professional/userExercises', [ProfessionalController::class, 'index'])->name('professional.userExercises');

// Route to show a specific user's exercises (exercises page)
Route::get('/professional/user-exercises/{userId}', [ProfessionalController::class, 'showUserExercises'])->name('professional.userExercises.show');

// Route to show the exercise details (show page)
Route::get('/professional/exercise/{activityId}', [ProfessionalController::class, 'showExercise'])->name('professional.exercise.show');

// Route to handle the evaluation form submission
Route::post('/professional/evaluate-exercise/{activityId}', [ProfessionalController::class, 'evaluateExercise'])->name('professional.evaluateExercise');


// Schedule Controls
Route::resource('schedule', ScheduleController::class);
Route::post('/schedule/reserved-dates', [ScheduleController::class, 'fetchReservedDates'])->name('schedule.reservedDates');
Route::post('/schedule/fetchReservedDatesForLoggedInUser', [ScheduleController::class, 'fetchReservedDatesForLoggedInUser'])->name('schedule.fetchReservedDatesForLoggedInUser');
Route::post('/schedules/{schedule}/appointments', [ScheduleController::class, 'storeAppointment'])->name('schedules.appointments.store');
Route::get('/schedule/getScheduleData/{id}', [ScheduleController::class, 'getScheduleData']);
