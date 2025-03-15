<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\User\TestimonialController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SetController;
use App\Http\Controllers\Admin\DayController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ExerciseController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\Admin\PracticeCategoryController;
use App\Http\Controllers\Admin\PracticeExerciseController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\User\EvaluatedExercisesController;

Route::get('/', [TestimonialController::class, 'testimonial']);
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
            return redirect()->action([UserDashboardController::class, 'index']); // Use controller for user dashboard
    }
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('user.dashboard');

    Route::get('user/evaluated-exercises', [EvaluatedExercisesController::class, 'index'])->name('evaluated.exercises');

Route::middleware(['auth', RoleMiddleware::class . ':professional'])->group(function () {
    Route::get('/professional/dashboard', [ProfessionalController::class, 'dashboardIndex'])->name('professional.dashboard');
});

Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::resource('users', UserController::class)->names([
        'index' => 'admin.users',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);
});
// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/user/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::post('/user/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::get('/user', [HomeController::class, 'index'])->name('user.home');

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


// Show all categories (this is the first page users will see)
Route::get('/practices', [\App\Http\Controllers\User\PracticeExerciseController::class, 'index'])->name('user.practices.index');

// Show all exercises for a specific category
Route::get('/practices/category/{categoryId}', [\App\Http\Controllers\User\PracticeExerciseController::class, 'showExercisesByCategory'])->name('user.practices.exercises');

// Show specific exercise media
Route::get('/practices/exercise/{exerciseId}', [\App\Http\Controllers\User\PracticeExerciseController::class, 'show'])->name('user.practices.show');


// Schedule Controls
Route::resource('schedule', ScheduleController::class);
Route::post('/schedule/reserved-dates', [ScheduleController::class, 'fetchReservedDates'])->name('schedule.reservedDates');
Route::post('/schedule/fetchReservedDatesForLoggedInUser', [ScheduleController::class, 'fetchReservedDatesForLoggedInUser'])->name('schedule.fetchReservedDatesForLoggedInUser');
Route::post('/schedules/{schedule}/appointments', [ScheduleController::class, 'storeAppointment'])->name('schedules.appointments.store');
Route::get('/schedule/getScheduleData/{id}', [ScheduleController::class, 'getScheduleData']);

Route::get('/auth/google', function () {
    return Socialite::driver('google')
        ->scopes(['https://www.googleapis.com/auth/calendar'])
        ->with(['access_type' => 'offline', 'prompt' => 'consent']) // 👈 Forces refresh token
        ->redirect();
});

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();

    $user = User::updateOrCreate([
        'email' => $googleUser->getEmail(),
    ], [
        'name' => $googleUser->getName(),
        'google_access_token' => $googleUser->token,
    ]);

    // Only update refresh token if it's provided
    if ($googleUser->refreshToken) {
        $user->update([
            'google_refresh_token' => $googleUser->refreshToken,
        ]);
    }

    Auth::login($user);

    return redirect('/dashboard')->with('success', 'Google Calendar linked!');
});
Route::post('/auth/google/logout', function () {
    $user = Auth::user();

    if (!$user->google_access_token) {
        return redirect()->back()->with('error', 'No Google account linked.');
    }

    try {
        // Revoke token from Google
        $client = new Google_Client();
        $client->revokeToken($user->google_access_token);
    } catch (\Exception $e) {
        Log::error("Failed to revoke Google token: " . $e->getMessage());
    }

    // Remove tokens from database
    $user->update([
        'google_access_token' => null,
        'google_refresh_token' => null,
    ]);

    return redirect()->back()->with('success', 'Google account unlinked successfully.');
})->middleware('auth')->name('google.logout');
