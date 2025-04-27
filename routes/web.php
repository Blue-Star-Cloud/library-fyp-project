<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AssignmentQuestionsController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClassNoteController;
use App\Http\Controllers\FormClassController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

use Illuminate\Support\Facades\Mail;

Route::get('/test-email', function () {
    Mail::raw('This is a test email', function ($message) {
        $message->to('test@example.com')->subject('Test Email');
    });

    return 'Email Sent!';
});

Auth::routes();

//Route::get('/home', action: [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/dashboard', action: [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/chart-data',  [App\Http\Controllers\DashboardController::class, 'getChartData'])->name('chart.data');
Route::get('/chart-data-book', [App\Http\Controllers\DashboardController::class, 'getBookCategoryData']);

Route::controller(StudentController::class)->group(function () {
    Route::get('/studentslist', 'index',)->name('users');
    Route::get('/formclasslist/{teacher_id}', 'formclassindex',)->name('formclassstudents');
    Route::get('/studentregister', 'studentCreate')->name('form');
    Route::get('/teacherregister', 'teacherCreate')->name('tform');
    Route::get('/teacherslist', 'teacherindex',)->name('teacherusers');
    Route::get('/profile/{id}', 'profile',)->name('profile-student');

    Route::post('/store', 'store')->name('store');
    Route::post('/tstore', 'teacherstore')->name('tstore');
    Route::get('/delete/{id}', 'delete')->name('delete');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::get('/tedit/{id}', 'tedit')->name('tedit');
    Route::post('/update', 'update')->name('update');
    Route::get('/assign/{id}', 'assign',)->name('assign');
    Route::post('/update-password', 'updatePassword')->name('update.password');
});

Route::controller(NoteController::class)->group(function () {
    Route::get('/noteslist', 'index',)->name('notes');
    Route::get('/viewstudentnotes/{id}', 'viewstudentnotes',)->name('viewstudentnotes');
    Route::get('/createnote', 'notecreate')->name('nform');
    Route::post('/notestore', 'notestore')->name('notestore');
    Route::get('/deletenote/{id}', 'deletenote')->name('deletenote');
    Route::get('/editnote/{id}', 'editnote')->name('editnote');
    Route::post('/updatenote', 'updatenote')->name('updatenote');
    Route::get('/notes/{classId}', 'getNotes');
    Route::get('/assignments/{studentId}', 'getAssignments');
    Route::get('/note-detail/{noteId}', 'getNoteDetails');
    Route::get('/assignment-detail/{assignmentId}', 'getAssignmentDetails');
});

Route::controller(ClassNoteController::class)->group(function () {
    Route::get('/classnotesindex/{user_id}', 'classnotesindex',)->name('classnotesindex');
    Route::get('/classnotecreate/{user_id}', 'classnotecreate')->name('classnotecreate');
    Route::post('/classnotestore', 'classnotestore')->name('classnotestore');
    Route::get('/classnotedelete/{id}/{user_id}', 'classnotedelete')->name('classnotedelete');
    Route::get('/classnoteedit/{id}', 'classnoteedit')->name('classnoteedit');
    Route::post('/classnoteupdate', 'classnoteupdate')->name('classnoteupdate');
});

Route::controller(BookController::class)->group(function () {
    Route::get('/bookslist', 'index',)->name('books');
    Route::get('/assignedBook', 'assignedBook',)->name('assignedBook');
    Route::get('/tempbookslist', 'tindex',)->name('tbooks');
    //Route::get('/viewstudentnotes/{id}','viewstudentnotes',)->name('viewstudentnotes');
    Route::get('/createbook', 'createbook')->name('createbook');
    Route::post('/bookstore', 'bookstore')->name('bookstore');
    Route::get('/deletebook/{id}', 'deletebook')->name('deletebook');
    Route::get('/editbook/{id}', 'editbook')->name('editbook');
    Route::post('/updatebook', 'updatebook')->name('updatebook');
});

Route::controller(GenreController::class)->group(function () {
    Route::get('/genrelist', 'index',)->name('genres');
    Route::get('/creategenre', 'creategenre')->name('genreform');
    Route::post('/genrestore', 'genrestore')->name('genrestore');
    Route::get('/deletegenre/{id}', 'deletegenre')->name('deletegenre');
    Route::get('/editgenre/{id}', 'editgenre')->name('editgenre');
    Route::post('/updategenre', 'updategenre')->name('updategenre');
});

Route::controller(QuestionController::class)->group(function () {
    Route::get('/questionslist', 'viewquestions',)->name('questions');
    //Route::get('/questionslist/{id}','viewquestion',)->name('questionslist');
    Route::get('/createquestion', 'createquestion')->name('questionform');
    Route::post('/questionstore', 'questionstore')->name('questionstore');
    Route::get('/deletequestion/{id}', 'deletequestion')->name('deletequestion');
    Route::get('/editquestion/{id}', 'editquestion')->name('editquestion');
    Route::post('/updatequestion', 'updatequestion')->name('updatequestion');
});

Route::controller(AssignmentController::class)->group(function () {
    Route::get('/assignmentslist', 'index',)->name('assignments');
    Route::get('/studentassignment/{id}', 'studentassignment',)->name('studentassignment');
    Route::get('/createassignment', 'createassignment')->name('assignmentform');
    Route::get('/selectbook', 'selectbook')->name('selectbook');
    Route::post('/storeassignment', 'storeassignment')->name('assignmentstore');
    Route::get('/deleteassignment/{id}', 'deleteassignment')->name('deleteassignment');
    //Route::get('/editquestion/{id}','editquestion')->name('editquestion');
    //Route::post('/updatequestion','updatequestion')->name('updatequestion');
});

Route::controller(AssignmentQuestionsController::class)->group(function () {
    Route::get('/createassignmentquestions/{book_id}', 'createassignmentquestions')->name('createassignmentquestions');
    //Route::get('/assignmentslist','index',)->name('assignments');
    Route::get('/viewassignmentquestions/{id}', 'viewassignmentquestions',)->name('viewassignmentquestions');
    //Route::get('/selectbook','selectbook')->name('selectbook');
    Route::post('/storeassignmentquestions/{questionslist}/{assignmentid}', 'storeassignmentquestions')->name('storeassignmentquestions');
    //Route::get('/deleteassignment/{id}','deleteassignment')->name('deleteassignment');
    //Route::get('/editquestion/{id}','editquestion')->name('editquestion');
    Route::post('/updateanswerquestions', 'updateanswerquestions')->name('updateanswerquestions');
    Route::post('/updatefeedback', 'updatefeedback')->name('updatefeedback');
});

Route::controller(ReviewController::class)->group(function () {
    Route::get('/reviewslist', 'reviewlist',)->name('reviews');
    Route::get('/showBookReview/{id}', 'showBookReview',)->name('showBookReview');
    //Route::get('/studentassignment/{id}','studentassignment',)->name('studentassignment');
    Route::get('/createreview/{student_id}', 'createreview')->name('reviewform');
    //Route::get('/selectbook','selectbook')->name('selectbook');
    Route::post('/storereview', 'storereview')->name('reviewstore');
    Route::get('/deletereview/{id}', 'deletereview')->name('deletereview');
    Route::get('/editreview/{id}','editreview')->name('editreview');
    Route::post('/updatereview','updatereview')->name('updatereview');
});

Route::controller(FormClassController::class)->group(function () {
    Route::get('/formclassteacherlist', 'formclassteacherlist',)->name('formclassteacher');
    //Route::get('/studentassignment/{id}','studentassignment',)->name('studentassignment');
    Route::get('/createformclass', 'createformclass')->name('formclasscreation');
    Route::post('/storeformclass', 'storeformclass')->name('storeformclass');
    Route::get('/editformclass/{id}','editformclass')->name('editformclass');
    Route::get('/deleteformclass/{id}','deleteformclass')->name('deleteformclass');
    Route::post('/updateformclass', 'updateformclass')->name('updateformclass');
    Route::post('/assign-students', 'assignStudents')->name('assignStudents');
    Route::post('/assign-students-book', 'assignStudentsBook')->name('assignStudentsBook');
    

    //Route::post('/storereview','storereview')->name('reviewstore');
    //Route::get('/deletereview/{id}','deletereview')->name('deletereview');
    //Route::get('/editquestion/{id}','editquestion')->name('editquestion');
    //Route::post('/updatequestion','updatequestion')->name('updatequestion');
});

