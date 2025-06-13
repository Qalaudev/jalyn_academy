<?php

use App\Http\Controllers\Admin\TestQuestionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\AdminSectionController;
use App\Http\Controllers\AdminTopicController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Models\AdminNotification;
use App\Models\CourseAdminPanel;
use App\Models\SectionAdminPanel;
use App\Models\TopicAdminPanel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProgressController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CompilerController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('index');
});

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/navbar',[HomeController::class,'navbar'])->name('navbar');
Route::get('/about_us',[HomeController::class,'about_us'])->name('about_us');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');

Route::middleware('auth')->get('/auth-user', [UserController::class, 'authUser']);

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'authenticate'])->name('authenticate');

Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/register',[UserController::class,'authorization'])->name('authorization');

Route::post('/logout',[UserController::class,'logout'])->name('logout');

Route::prefix('role')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('role_index');
    Route::get('/create', [RoleController::class, 'createRoleForm'])->name('role_create_form');
    Route::post('/create', [RoleController::class, 'createRole'])->name('role_create');
    Route::get('/edit/{id}', [RoleController::class, 'editRole'])->name('role_edit');
    Route::post('/edit/{id}', [RoleController::class, 'updateRole'])->name('role_update');
    Route::delete('/delete/{id}', [RoleController::class, 'destroyRole'])->name('role_delete');
});
    Route::get('/role/show/{id}', [RoleController::class, 'showRole'])->name('role_show');

Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('course_index');
    Route::get('/create', [CourseController::class, 'createCourseForm'])->name('course_create_form');
    Route::post('/create', [CourseController::class, 'createCourse'])->name('course_create');
    Route::get('/courses', [CourseController::class, 'getCourses'])->name('course_list');
    Route::get('/edit/{id}', [CourseController::class, 'editCourse'])->name('course_edit');
    Route::put('/edit/{id}', [CourseController::class, 'updateCourse'])->name('course_update');
    Route::delete('/delete/{id}', [CourseController::class, 'destroyCourse'])->name('course_delete');
    Route::get('/show/{id}', [CourseController::class, 'showCourse'])->name('course_show');
    Route::get('/{id}/certificate', [CourseController::class, 'downloadCertificate'])->name('course.certificate');

});

Route::get('/verify-certificate/{certificateNumber}', [CertificateController::class, 'verify'])->name('certificates.verify');

Route::middleware('auth')->group(function () {
    Route::get('/admin',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/users',[AdminController::class,'users'])->name('admin.users');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.new_dashboard');
    Route::get('/admin/courses',[AdminController::class,'courses'])->name('admin.courses');
    Route::get('/admin/courses/show/{id}',[AdminController::class,'coursesShow'])->name('admin.coursesShow');
    Route::post('/admin/course/{course}/training-program',[AdminController::class,'courseTrainingProgram'])->name('admin.courseTrainingProgram');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('admin/courses/{course}/edit', [AdminController::class, 'edit'])->name('admin.trainingPrograms.edit');
    Route::post('admin/courses/{course}/update', [AdminController::class, 'update'])->name('admin.trainingPrograms.update');

    Route::get('/admin/users/{user}/courses', [AdminController::class, 'userCourses'])->name('admin.users.userCourses');
    Route::get('/admin/users/{user}/edit-courses', [AdminController::class, 'editCourses'])->name('admin.users.editCourses');
    Route::post('/admin/users/{user}/update-courses', [AdminController::class, 'updateCourses'])->name('admin.users.updateCourses');

    Route::get('/profile/change-password', [UserController::class, 'changePasswordForm'])->name('profile.change_password');
    Route::post('/profile/change-password', [UserController::class, 'changePassword'])->name('profile.update_password');

    Route::post('/progress/mark-lesson-completed', [UserProgressController::class, 'markLessonCompleted'])->name('progress.markLessonCompleted');
    Route::get('/progress', [UserProgressController::class, 'index'])->name('progress.index');
    Route::get('/progress/{course}', [UserProgressController::class, 'show'])->name('progress.show');
    Route::post('/progress/{course}', [UserProgressController::class, 'update'])->name('progress.update');

    // Маршруты для сертификатов
    Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
    Route::get('/certificates/{certificate}', [CertificateController::class, 'show'])->name('certificates.show');
    Route::get('/certificates/{certificate}/download', [CertificateController::class, 'download'])->name('certificates.download');

    // Маршрут для компилятора
    Route::post('/run-code', [CompilerController::class, 'runCode'])->name('compiler.runCode');

    // Notifications
    Route::get('/admin/notification',function(){
        $notifications = AdminNotification::latest()->get();
        return view('admin.notifications.listNotifications',compact('notifications'));
    })->name('admin.notifications');

});

    Route::get('/course/{id}/learn',[CourseController::class,'courseLearn'])->name('course.learn');

    Route::get('/admin/create-menu',[MenuController::class,'index'])->name('create.menu');
    Route::post('/admin/create-menu',[MenuController::class,'store'])->name('store.menu');

    // compiler course
    Route::post('/execute-php', [CodeController::class, 'executePHP']);
    Route::post('/execute-python', [CodeController::class, 'executePython']);

    Route::get('/test/{trainingProgram}', [TestController::class, 'show'])->name('test.show');
    Route::post('/test/{trainingProgram}/submit', [TestController::class, 'submit'])->name('test.submit');

    // Админка (можно через resource)
    Route::resource('admin/questions', TestQuestionController::class);



    Route::post('/ai-message', function (Request $request) {
    $userMessage = $request->input('message');
    $apiKey = env('GEMINI_API_KEY');

    $systemPrompt = "Сен — веб-чаттағы қазақ тілінде сөйлейтін көмекші.
    Сен қысқа әрі нақты жауап бересің.
    Бірінші жазған кезде оған курс туралы ақпарат беру керек.
    Біздің онлайн платформа Jalyn Academy. Ол Питон және Php Laravel бойынша курстар өткізеді.
    Өзіңді Jalyn Academy - дің ассистенті ретінде таныстыр.Курстардың бағасын сұраса ғана бағасын айт, ал сұрамаса айтпа
    40 000 тг мен 60 000 тг арасында деп айту керек. Ал курстарды өту барысында кодтан түсінбеген жерлері болса,
     мен көмектесе аламын дейсің.Қазақ тілде және орыс тілінде ғана көмек көрсетесің.
     Артық сұрақтар қойса білмеймін деп жауап бер.";

    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
    ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}", [
        'contents' => [
            [
                'parts' => [
                    ['text' => $systemPrompt],
                    ['text' => $userMessage],
                ]
            ]
        ]
    ]);

    if ($response->successful()) {
        $text = $response->json()['candidates'][0]['content']['parts'][0]['text'];
        return response()->json(['reply' => $text]);
    }

    \Log::error('Gemini API error', ['response' => $response->body()]);
    return response()->json(['reply' => 'Қате болды. AI жауап берген жоқ.'], 500);
});

    Route::post('/admin-notification',[ContactController::class,'send'])->name('contact.send');


//Route::get('/{any}', function () {
//    return view('index');
//})->where('any', '.*');
