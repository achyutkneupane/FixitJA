<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\MainController::class, 'home'])->name('homePage');
Auth::routes([
    'verify' => true,
    'register' => false,
    ]);
Route::get('verify/{verification_code}/{email}', [App\Http\Controllers\Auth\VerificationController::class, 'verifyUser']);
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postEmail'])->name('forget-password');
Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword'])->name('resetPasswordWithToken');
Route::post('/reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword'])->name('updatePassword');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::put('/user/edit', [App\Http\Controllers\UserController::class, 'update']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Added by Achyut Neupane
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');
Route::get('/register', function () {
    if(isset($_GET['as']))
    $sessionType = $_GET['as'];
    else
    $sessionType = null;
    return view('auth.register',compact('sessionType'));
})->middleware('guest')->name('register');
Route::post('/register',[App\Http\Controllers\Auth\RegisterController::class, 'register'])->middleware('guest')->name('signup');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->middleware('guest')->name('authenticate');
Route::prefix('/category')->group(function () {
    Route::post('/add', [App\Http\Controllers\CategoryController::class, 'store'])->middleware('auth', 'checkIfAdmin');
    Route::put('/edit/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->middleware('auth', 'checkIfAdmin');
    Route::get('/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->middleware('auth', 'checkIfAdmin');
});

Route::prefix('/users')->group(function() {
    Route::get('/newUsers', [App\Http\Controllers\AdminController::class, 'newUser'])->middleware('auth', 'checkIfAdmin');
    Route::get('/applicantUsers', [App\Http\Controllers\AdminController::class, 'applicantUser'])->middleware('auth', 'checkIfAdmin')->name('applicantUsers');
    Route::get('/activeUsers', [App\Http\Controllers\AdminController::class, 'activeUser'])->middleware('auth', 'checkIfAdmin');
    Route::get('/rejectUsers', [App\Http\Controllers\AdminController::class, 'rejectedUser'])->middleware('auth', 'checkIfAdmin');
});
Route::prefix('/categories')->group(function () {
    Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])->middleware('auth', 'checkIfAdmin')->name('listCategory');
    Route::get('/all', [App\Http\Controllers\MainController::class, 'categories']);
    Route::get('/proposed', [App\Http\Controllers\CategoryController::class, 'proposed'])->middleware('auth', 'checkIfAdmin')->name('proposedCategory');
    Route::get('/approve', [App\Http\Controllers\CategoryController::class, 'approveCategory'])->middleware('auth', 'checkIfAdmin');
     Route::get('/reject', [App\Http\Controllers\CategoryController::class, 'reject'])->middleware('auth', 'checkIfAdmin');
    
});
Route::prefix('/sub_category')->group(function () {
    Route::post('/add', [App\Http\Controllers\SubCategoryController::class, 'store'])->middleware('auth', 'checkIfAdmin');
    Route::put('/edit/{id}', [App\Http\Controllers\SubCategoryController::class, 'update'])->middleware('auth', 'checkIfAdmin');
    Route::get('/delete/{id}', [App\Http\Controllers\SubCategoryController::class, 'destroy'])->middleware('auth', 'checkIfAdmin');
});
Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->middleware('auth')->name('listTask');
Route::prefix('/task')->group(function () {
    Route::get('/{id}', [App\Http\Controllers\TaskController::class, 'show'])->middleware('auth', 'relatedTaskOnly')->name('viewTask');
    Route::get('/{id}/timeline', [App\Http\Controllers\TaskController::class, 'taskTimeline'])->middleware('auth', 'relatedTaskOnly')->name('taskTimeline');
    Route::get('/{id}/discussions', [App\Http\Controllers\TaskController::class, 'taskDiscussion'])->middleware('auth', 'relatedTaskOnly')->name('taskDiscussion');
    Route::post('/{id}/discussions', [App\Http\Controllers\TaskController::class, 'postDiscussion'])->middleware('auth', 'relatedTaskOnly')->name('postDiscussion');
    Route::get('/{id}/reviews', [App\Http\Controllers\TaskController::class, 'taskReviews'])->middleware('auth', 'relatedTaskOnly')->name('taskReviews');
    Route::post('/{id}/reviews', [App\Http\Controllers\TaskController::class, 'postReviews'])->middleware('auth', 'relatedTaskOnly')->name('postReviews');
    Route::get('/{id}/working_hours', [App\Http\Controllers\TaskController::class, 'taskWorking'])->middleware('auth', 'relatedTaskOnly')->name('taskWorking');
    Route::post('/{id}/working_hours', [App\Http\Controllers\TaskController::class, 'postWorking'])->middleware('auth', 'relatedTaskOnly')->name('postWorking');
    Route::get('/{id}/edit', [App\Http\Controllers\TaskController::class, 'edit'])->middleware('auth', 'relatedTaskOnly')->name('editTask');
    Route::put('/{id}/edit/creator', [App\Http\Controllers\TaskController::class, 'editTaskCreator'])->middleware('auth', 'relatedTaskOnly')->name('editTaskCreator');
    Route::put('/{id}/edit/detail', [App\Http\Controllers\TaskController::class, 'editTaskDetails'])->middleware('auth', 'relatedTaskOnly')->name('editTaskDetails');
    Route::get('/{id}/assigned_by', [App\Http\Controllers\TaskController::class, 'assignedBy'])->middleware('auth', 'relatedTaskOnly')->name('taskAssignedBy');
    Route::get('/{id}/assigned_to', [App\Http\Controllers\TaskController::class, 'assignedTo'])->middleware('auth', 'relatedTaskOnly')->name('taskAssignedTo');
});
Route::prefix('/profile')->group(function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'profile'])->middleware('auth')->name('viewProfile');
    Route::get('/documents', [App\Http\Controllers\UserController::class, 'profileDocuments'])->middleware('auth')->name('viewDocuments');
    Route::get('/education', [App\Http\Controllers\UserController::class, 'profileEducations'])->middleware('auth')->name('viewEducations');
    Route::get('/review', [App\Http\Controllers\UserController::class, 'profileReview'])->middleware('auth')->name('viewReview');
    Route::get('/reference', [App\Http\Controllers\UserController::class, 'profileReferences'])->middleware('auth')->name('viewReferences');
    Route::get('/edit', [App\Http\Controllers\UserController::class, 'editProfile'])->middleware('auth')->name('editProfile');
    Route::put('/edit', [App\Http\Controllers\UserController::class, 'putEditProfile'])->middleware('auth')->name('putEditProfile');
    Route::put('/edit/social', [App\Http\Controllers\UserController::class, 'putEditSocial'])->middleware('auth')->name('putEditSocial');
    Route::get('/skills', [App\Http\Controllers\UserController::class, 'profileSkills'])->middleware('auth')->name('profileSkills');
});
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->middleware('auth', 'checkIfAdmin')->name('viewUsers');
Route::prefix('/user/{id}')->group(function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'show'])->middleware('auth')->name('viewUser');
    Route::get('/edit', [App\Http\Controllers\UserController::class, 'editUserProfile'])->middleware('auth')->name('editUserProfile');
    Route::put('/edit', [App\Http\Controllers\UserController::class, 'putEditUserProfile'])->middleware('auth')->name('putEditUserProfile');
    Route::get('/skills', [App\Http\Controllers\UserController::class, 'userSkills'])->middleware('auth')->name('userSkills');
    Route::get('/documents', [App\Http\Controllers\UserController::class, 'userDocuments'])->middleware('auth')->name('viewUserDocuments');
    Route::get('/education', [App\Http\Controllers\UserController::class, 'userEducations'])->middleware('auth')->name('viewUserEducations');
    Route::get('/review', [App\Http\Controllers\UserController::class, 'userReview'])->middleware('auth')->name('viewUserReview');
    Route::post('/review', [App\Http\Controllers\UserController::class, 'postUserReview'])->middleware('auth')->name('postUserReview');
    Route::get('/reference', [App\Http\Controllers\UserController::class, 'userReferences'])->middleware('auth')->name('viewUserReferences');
});
Route::prefix('/error_log')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'error_log'])->middleware('auth', 'checkIfAdmin')->name('viewErrorLog');
    Route::get('/{id}', [App\Http\Controllers\AdminController::class, 'error_detail'])->middleware('auth', 'checkIfAdmin')->name('viewErrorDetail');
    Route::put('/{id}/solved', [App\Http\Controllers\AdminController::class, 'error_solved'])->middleware('auth', 'checkIfAdmin')->name('errorSolved');
});
Route::prefix('/security')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'security'])->name('accountSecurity');
    Route::put('/', [App\Http\Controllers\UserController::class, 'changePassword'])->name('changePassword');
    Route::get('/primary/{email}', [App\Http\Controllers\UserController::class, 'makePrimary'])->name('makePrimary');
    Route::put('/change_status', [App\Http\Controllers\UserController::class, 'changeStatus'])->name('changeStatus');
    Route::put('/add_email', [App\Http\Controllers\UserController::class, 'addEmail'])->name('addEmail');
    Route::get('/deactivate', [App\Http\Controllers\UserController::class, 'deactivateUser'])->name('deactivateUser');
    Route::get('/delete', [App\Http\Controllers\UserController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/{id}', [App\Http\Controllers\UserController::class, 'viewSecurity'])->middleware('checkIfAdmin')->name('viewAccountSecurity');
});
Route::get('/edittask/{taskid}',[App\Http\Controllers\MainController::class, 'edittask']);
Route::prefix('/project/create')->group(function(){
    Route::get('/', [App\Http\Controllers\TaskController::class, 'create'])->name('createProject');
    Route::get('/categoryId/{catId}', [App\Http\Controllers\TaskController::class, 'createProjectwithCat'])->name('createProjectWithCat');
    Route::get('/subCategoryId/{subCatId}', [App\Http\Controllers\TaskController::class, 'createProjectwithSub'])->name('createProjectWithSub');
    Route::post('/', [App\Http\Controllers\TaskController::class, 'store'])->name('addProject');
    Route::post('/form', [App\Http\Controllers\TaskController::class, 'categoryRequest'])->name('categoryRequest');
});
Route::prefix('/referral')->group(function() {
    Route::get('/', [App\Http\Controllers\UserController::class, 'referGet'])->middleware('auth')->name('referGet');
    Route::post('/', [App\Http\Controllers\UserController::class, 'referPost'])->middleware('auth')->name('referPost');
});

Route::get('/review', function() {
    return redirect()->route('viewReview');
})->middleware('auth')->name('viewReviews');
Route::get('/subscription', [App\Http\Controllers\UserController::class, 'emptyPage'])->middleware('auth')->name('viewSubscriptions');
Route::get('/resend_email', [App\Http\Controllers\Auth\VerificationController::class, 'resendVerifyEmail'])->name('resendEmail');
Route::get('/resend_email/{email}', [App\Http\Controllers\Auth\VerificationController::class, 'verifyMultiEmail'])->name('verifyMultiEmail');
Route::get('/add_user', [App\Http\Controllers\UserController::class, 'adminAddUser'])->middleware('auth','checkIfAdmin')->name('adminAddUser');
Route::post('/add_user', [App\Http\Controllers\UserController::class, 'adminAddUserSubmit'])->middleware('auth','checkIfAdmin')->name('adminAddUserSubmit');
Route::get('/register/{token}', [App\Http\Controllers\UserController::class, 'registerWithToken'])->name('registerWithToken');
Route::get('/test', [App\Http\Controllers\MainController::class, 'test'])->name('test');


Route::prefix('/setting')->group(function() {
    Route::get('/statics', [App\Http\Controllers\AdminController::class, 'staticTexts'])->middleware('auth','checkIfAdmin')->name('staticTexts');
    Route::post('/statics/{id}', [App\Http\Controllers\AdminController::class, 'postStaticTexts'])->middleware('auth','checkIfAdmin')->name('postStaticTexts');
});

Route::get('/terms-and-conditions', [App\Http\Controllers\MainController::class, 'termsandconditions'])->name('termsandconditions');
Route::get('/privacy-policy', [App\Http\Controllers\MainController::class, 'privacypolicy'])->name('privacypolicy');
Route::get('/hiring-process', [App\Http\Controllers\MainController::class, 'hiringProcess'])->name('hiringProcess');
Route::get('/services', [App\Http\Controllers\MainController::class, 'services'])->name('services');
Route::get('/faq', [App\Http\Controllers\MainController::class, 'faqs'])->name('faq');
Route::get('/how-it-works', [App\Http\Controllers\MainController::class, 'howItWorks'])->name('howItWorks');
//End routes by Achyut Neupane



// Route for about page
Route::get('/about-us', [App\Http\Controllers\MainController::class, 'about'])->name('aboutUs');
//Route for contact us page
Route::get('/contact', [App\Http\Controllers\MainController::class, 'contact'])->name('contactUs');
Route::post('/contact', [App\Http\Controllers\MainController::class, 'submitContact'])->name('submitContact');


Route::get('/underconstruction', [App\Http\Controllers\MainController::class, 'underConstruction'])->name('under_construction');

//Route for profile wizard
Route::get('/profile/init', [App\Http\Controllers\UserController::class, 'updateprofile1'])->middleware('auth', 'checkIfSkillworker')->name('profileWizard');
//Route::get('/profile/init', [App\Http\Controllers\UserController::class,  'getprofileImage'])->name('profileWizard');
Route::post('/profile/init', [App\Http\Controllers\UserController::class, 'addprofiledetails']);
Route::get('/profile/init/subCategoryId/{subCatId}', [App\Http\Controllers\UserController::class, 'createProfilewithSub'])->name('createProfilewithSub');
Route::put('/profile/init', [App\Http\Controllers\UserController::class, 'updateprofiledetails']);



Route::get('/profile/{id}', [App\Http\Controllers\CategoryController::class, 'getSubCategory']);
Route::get('/category_data', [App\Http\Controllers\CategoryController::class, 'getCategory']);

//Route for the addding education qualification




// for skilled worker



Route::get('/addeducation', [App\Http\Controllers\UserController::class, 'addeducation']);

Route::get('download/{filename}', [App\Http\Controllers\UserController::class, 'downloadcertificate'])->name('getfile');


/* for approve and reject skilled worker application -- Ashish Pokhrel */
Route::get('/approve/{id}', [App\Http\Controllers\UserController::class, 'approveApplication']);
Route::put('/approve/{id}', [App\Http\Controllers\UserController::class, 'approveApplication']);
Route::get('/reject/{id}', [App\Http\Controllers\UserController::class, 'rejectApplication']);
Route::put('/reject/{id}', [App\Http\Controllers\UserController::class, 'rejectApplication']);

/* for approve and reject categories  -- Ashish Pokhrel */
Route::get('/approveCat/{catid}', [App\Http\Controllers\CategoryController::class, 'approveCategory']);
Route::put('/approveCat/{catid}', [App\Http\Controllers\CategoryController::class, 'approveCategory']);

Route::get('/rejectCat/{catid}', [App\Http\Controllers\CategoryController::class, 'rejectCategory']);
Route::put('/rejectCat/{catid}', [App\Http\Controllers\CategoryController::class, 'rejectCategory']);















//Metronics demo
Route::get('/metronics', [App\Http\Controllers\PagesController::class, 'index']);

// Demo routes
Route::get('/metronics/datatables', [App\Http\Controllers\PagesController::class, 'datatables']);
Route::get('/metronics/ktdatatables', [App\Http\Controllers\PagesController::class, 'ktDatatables']);
Route::get('/metronics/select2', [App\Http\Controllers\PagesController::class, 'select2']);
Route::get('/metronics/jquerymask', [App\Http\Controllers\PagesController::class, 'jQueryMask']);
Route::get('/metronics/icons/custom-icons', [App\Http\Controllers\PagesController::class, 'customIcons']);
Route::get('/metronics/icons/flaticon', [App\Http\Controllers\PagesController::class, 'flaticon']);
Route::get('/metronics/icons/fontawesome', [App\Http\Controllers\PagesController::class, 'fontawesome']);
Route::get('/metronics/icons/lineawesome', [App\Http\Controllers\PagesController::class, 'lineawesome']);
Route::get('/metronics/icons/socicons', [App\Http\Controllers\PagesController::class, 'socicons']);
Route::get('/metronics/icons/svg', [App\Http\Controllers\PagesController::class, 'svg']);
Route::get('/metronics/login1', [App\Http\Controllers\PagesController::class, 'login1']);
Route::get('/metronics/wizard1', [App\Http\Controllers\PagesController::class, 'wizard1']);
Route::get('/metronics/tagify', [App\Http\Controllers\PagesController::class, 'tagify']);

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', [App\Http\Controllers\PagesController::class, 'quickSearch'])->name('quick-search');
