<?php

use App\Http\Controllers\Admin\Application\AdminApplicationController;
use App\Http\Controllers\Admin\Course\AdminCourseController;
use App\Http\Controllers\Admin\Course\AdminCourseResourceController;
use App\Http\Controllers\Admin\Dashboard\AdminDashboardController;
use App\Http\Controllers\Admin\DiagnosticTool\AdminDiagnosticToolController;
use App\Http\Controllers\Admin\Module\AdminModuleAssessmentController;
use App\Http\Controllers\Admin\Module\AdminModuleAssessmentQuestionController;
use App\Http\Controllers\Admin\Module\AdminModuleAssignmentController;
use App\Http\Controllers\Admin\Module\AdminModuleController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Auth\Admin\AdminLoginController;
use App\Http\Controllers\Auth\Learning\LearningLoginController;
use App\Http\Controllers\Auth\Learning\LearningRegisterController;
use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Learning\Assessment\LearningModuleAssessmentController;
use App\Http\Controllers\Learning\Course\LearningCourseController;
use App\Http\Controllers\Learning\Course\LearningCourseDiscussionController;
use App\Http\Controllers\Learning\LearningAccountController;
use App\Http\Controllers\Learning\LearningDashboardController;
use App\Http\Controllers\Learning\Module\LearningModuleAssignmentController;
use App\Http\Controllers\Learning\Module\LearningModuleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Brace\BraceApplicationController;
use App\Http\Controllers\Learning\DiagnosticToolsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Admin
Route::post('/admin/login', [AdminLoginController::class, 'login']);
// Authenticate Admin
Route::get('/admin/authenticate', [AdminLoginController::class, 'authenticate']);

// Custom sanctum admin guard authentication for Learning Portal
Route::middleware('auth:admin-api')->group(static function (){
// Admin Dashboard
    Route::get('/admin/dashboard/stats', [AdminDashboardController::class, 'getStats']);

// Admin Application
    Route::get('/admin/applications', [AdminApplicationController::class, 'index']);
    Route::get('/admin/applications/selected', [AdminApplicationController::class, 'selectedApplicants']);
    Route::post('/admin/applications/search', [AdminApplicationController::class, 'search']);
    Route::get('/admin/applications/select', [AdminApplicationController::class, 'select']);

// Admin Selected Users Assessments
    Route::get('/admin/users/selected/assessments', [AdminUserController::class, 'index']);

// Admin Module
    Route::get('/admin/modules', [AdminModuleController::class, 'index']);
    Route::post('/admin/modules/search', [AdminModuleController::class, 'search']);
    Route::post('/admin/modules/store', [AdminModuleController::class, 'store']);
    Route::post('/admin/modules/update', [AdminModuleController::class, 'update']);
    Route::delete('/admin/modules/delete', [AdminModuleController::class, 'destroy']);

// Admin Module Assignment
    Route::get('/admin/module/assignments', [AdminModuleAssignmentController::class, 'index']);
    Route::post('/admin/module/assignments/store', [AdminModuleAssignmentController::class, 'store']);
    Route::post('/admin/module/assignments/update', [AdminModuleAssignmentController::class, 'update']);
    Route::delete('/admin/module/assignments/delete', [AdminModuleAssignmentController::class, 'destroy']);

// Admin Module Assessment Question
    Route::get('/admin/module/assessment/questions', [AdminModuleAssessmentQuestionController::class, 'index']);
    Route::post('/admin/module/assessment/questions/store', [AdminModuleAssessmentQuestionController::class, 'store']);
    Route::post('/admin/module/assessment/questions/update', [AdminModuleAssessmentQuestionController::class, 'update']);
    Route::delete('/admin/module/assessment/questions/delete', [AdminModuleAssessmentQuestionController::class, 'destroy']);

// Admin Assessment
    Route::get('/admin/module/assessment', [AdminModuleAssessmentController::class, 'index']);

// Admin Course
    Route::get('/admin/courses', [AdminCourseController::class, 'index']);
    Route::get('/admin/module/courses', [AdminCourseController::class, 'moduleCourses']);
    Route::post('/admin/courses/search', [AdminCourseController::class, 'search']);
    Route::post('/admin/courses/store', [AdminCourseController::class, 'store']);
    Route::post('/admin/courses/update', [AdminCourseController::class, 'update']);
    Route::delete('/admin/courses/delete', [AdminCourseController::class, 'destroy']);

// Admin Course Resources
    Route::get('/admin/course/resources', [AdminCourseResourceController::class, 'index']);
    Route::post('/admin/course/resources/store', [AdminCourseResourceController::class, 'store']);
    Route::post('/admin/course/resources/update', [AdminCourseResourceController::class, 'update']);
    Route::delete('/admin/course/resources/delete', [AdminCourseResourceController::class, 'destroy']);

// Admin Diagnostic Tool
//    Route::get('/admin/diagnostic-tool/results', [AdminDiagnosticToolController::class, 'results']);
//    Route::post('/admin/diagnostic-tool/results/search', [AdminDiagnosticToolController::class, 'search']);
//    Route::get('/user-answer_byid/{id}', [DiagnosticToolsController::class, 'fetchUserAnswersById']);
//    Route::get('/user-answer_byemail/{email}', [DiagnosticToolsController::class, 'fetchUserAnswersByEmail']);
//    Route::get('/learning/diagnostic-tool', [DiagnosticToolsController::class, 'index']);
//
//    Route::post('/create_question', [DiagnosticToolsController::class, 'store']);
//    Route::get('/diagnostic-question/{id}', [DiagnosticToolsController::class, 'getOneQuestion']);
//    Route::put('/diagnostic-question/{id}', [DiagnosticToolsController::class, 'editOneQuestion']);
//    Route::delete('/diagnostic-question/{id}', [DiagnosticToolsController::class, 'deleteOneQuestion']);

// Admin Logout
    Route::get('/admin/logout', [AdminLoginController::class, 'logout']);
});


// Learning Login
Route::post('/learning/register', [LearningRegisterController::class, 'register']);
Route::post('/learning/login', [LearningLoginController::class, 'login']);
Route::post('/learning/password/reset', [LearningLoginController::class, 'submitPasswordReset']);
Route::post('/learning/password/update', [LearningLoginController::class, 'updatePasswordReset']);

// Learning Authenticate User
Route::get('/learning/authenticate', [LearningLoginController::class, 'authenticate']);

// Custom sanctum admin guard authentication for Learning Portal
Route::middleware('auth:api')->group(static function (){
    // Learning Dashboard
    Route::get('/learning/dashboard/summary', [LearningDashboardController::class, 'dashboardSummary']);

    // Learning Module
    Route::get('/learning/modules', [LearningModuleController::class, 'index']);
    Route::get('/learning/module', [LearningModuleController::class, 'show']);

    // Module Assignment
    Route::get('/learning/module/assignment', [LearningModuleAssignmentController::class, 'show']);
    Route::post('/learning/module/assignment/store', [LearningModuleAssignmentController::class, 'store']);

    // Module Assessment
    Route::get('/learning/module/assessment/questions', [LearningModuleAssessmentController::class, 'questions']);
    Route::get('/learning/module/assessment/status', [LearningModuleAssessmentController::class, 'userStatus']);
    Route::post('/learning/module/assessment/store', [LearningModuleAssessmentController::class, 'submitAssessment']);
    Route::get('/learning/module/assessment', [LearningModuleAssessmentController::class, 'index']);
    Route::get('/learning/module/assessment/history', [LearningModuleAssessmentController::class, 'moduleAssessmentHistory']);

    // Learning Course
    Route::get('/learning/courses', [LearningCourseController::class, 'index']);
    Route::get('/learning/course', [LearningCourseController::class, 'show']);
    Route::get('/learning/course/user-activity/store', [LearningCourseController::class, 'storeUserActivity']);
    Route::get('/learning/course/user-activity', [LearningCourseController::class, 'getUserActivity']);

    // Learning Course Discussion
    Route::get('/learning/course/discussion', [LearningCourseDiscussionController::class, 'index']);
    Route::post('/learning/course/discussion/comment', [LearningCourseDiscussionController::class, 'store']);
    Route::get('/learning/course/discussion/comment/delete', [LearningCourseDiscussionController::class, 'destroy']);
    Route::post('/learning/course/discussion/like', [LearningCourseDiscussionController::class, 'likeComment']);
    Route::get('/learning/course/discussion/liked', [LearningCourseDiscussionController::class, 'liked']);

    // Diagnostic tool
    Route::get('/learning/diagnostic-tool/completed', [DiagnosticToolsController::class, 'diagnosticCompleted']);
    Route::get('/user-details', [DiagnosticToolsController::class, 'userDetails']);
    Route::group(['prefix' => 'diagnostic-tool'], function () {
        Route::post('/add_answer', [DiagnosticToolsController::class, 'addUserAnswers']);
        Route::get('/fetch_answer', [DiagnosticToolsController::class, 'fetchUserAnswers']);
        Route::get('/fetch_answer_status', [DiagnosticToolsController::class, 'getAnswerStatus']);
        Route::post('/create_or_update_answer_status', [DiagnosticToolsController::class, 'createOrUpdateAnswerStatus']);
    });

    // Learning Account Settings
    Route::post('/learning/account/update/account', [LearningAccountController::class, 'updateAccount']);

    // Learning Logout
    Route::get('/learning/logout', [LearningLoginController::class, 'logout']);

});
