<?php

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
use App\Video;

Auth::routes();

Route::get('/iframe/test', function () {
    $v = Video::all();
    return view('home')->with('v' , $v);
});

Route::get('/loginsiswa', function () {
    return view('pagesiswa.login');
})->name('loginsiswa');

Route::get('/chat', function () {
    return view('chatting.index');
})->name('chatting.index');

Route::get('/test/sertif',function (){
    return view('pagesiswa.course.certificate');
});





Route::group(['middleware' => 'auth'], function (){

    Route::get('/', 'HomeController@index')->name('home');


    Route::resource('discussion' , 'DiscussionController');
    Route::get('/discussion/user/search' , 'HomeController@cari')->name('diskusi.home.cari');
    Route::get('/discussions/create' , 'DiscussionController@create')->name('discussions.create');
    Route::post('/discussions/store' , 'DiscussionController@store')->name('discussions.store');
    Route::get('/discussions/show/{id}' , 'DiscussionController@show')->name('discussions.show');
    Route::post('/discussions/reply/{id}' , 'DiscussionController@reply')->name('discussions.reply');
    Route::post('/discussions/replythereply/{iddiscussion}/{idreply}' , 'DiscussionController@replythereply')->name('discussions.replythereply');
    Route::get('/discussion/replies/like/{id}' , 'DiscussionController@like')->name('reply.like');
    Route::get('/discussion/replies/unlike/{id}' , 'DiscussionController@unlike')->name('reply.unlike');
    Route::get('discussion/replies/upvote/{id}' , 'UpvoteController@upvote')->name('reply.upvote');
    Route::get('discussion/replies/downvote/{id}' , 'UpvoteController@downvote')->name('reply.downvote');

    Route::get('/discussions/report/page/{id}' , 'ReportController@report_page_discuss')->name('report.page');
    Route::post('/discussions/report/{id}' , 'ReportController@store_report_discuss')->name('report.discuss');

    Route::get('/discussions/channel/{id}/show' , 'DiscussionController@sort_by_channel')->name('discuss.channel.sort');
    Route::get('/discussions/categories/{id}/show' , 'CategoriesController@show')->name('categories');
    Route::get('/discussions/users/show' , 'HomeController@sortbyuser')->name('sortbyuser');
    Route::get('/discussions/users/alltopic' , 'HomeController@allmytopic')->name('all.user.topic');
    Route::get('/discussions/reply/{id}/mark/best/answer' , 'DiscussionController@best_answer')->name('reply.bestanswer');
    Route::get('/discussions/reply/{id}/remove/best/answer' , 'DiscussionController@remove_best_answer')->name('remove.reply.bestanswer');

    Route::get('/discussions/user/delete/{id}/' , 'DiscussionController@destroy')->middleware('userdiscuss')->name('discuss.user.delete');
    Route::get('/discussions/user/edit/page/{id}/' , 'DiscussionController@edit')->middleware('userdiscuss')->name('discuss.user.edit');
    Route::get('/discussions/user/update/{id}/' , 'DiscussionController@update')->middleware('userdiscuss')->name('discuss.user.update');

    route::resource('user' , 'UserController');

    // route course
    Route::get('users/my_course/{id}' , 'UsersCourseController@my_course')->name('mycourse');
    Route::get('users/allcourse' , 'UsersCourseController@see_all')->name('see.all.course');
    Route::get('users/showcourse/{id}' , 'UsersCourseController@show')->name('show.course');
    Route::post('users/showcourse/prepay/{id}' , 'UsersCourseController@prepay')->name('prepay.course');
    Route::get('users/see/course/{id}' , 'UserWatchCourseController@showlist')->middleware('paymentstatus')->name('watch.course');
    Route::group(['middleware' => ['videochecker','cekquizuser']] , function (){
        Route::get('users/see/video/{id}/{idUc}' , 'UserWatchCourseController@showvideo')->name('show.video');
    });


    Route::get('users/certificate/{iduc}' , 'CertificateController@getcertif')->middleware('cetaksertif')->name('users.certif');
    Route::get('users/report/video/{id}','ReportController@report_page_videos')->name('user.report.video');
    Route::get('users/report/video/store/{id}','ReportController@store_report_videos')->name('user.store.report.video');


    Route::get('users/search/allcourse' , 'UsersCourseController@search_allcourse')->name('kursus.cari');
    Route::get('users/search/channel/course/{id}', 'UsersCourseController@search_coursebychannel')->name('channel.kursus.cari');
    Route::get('users/search/mycourse' , 'UsersCourseController@search_mycourse')->name('saya.kursus.cari');
    Route::get('users/mycoure/delete/{id}' , 'UsersCourseController@destroy')->middleware('paymentstatus')->name('mycourse.delete');

    Route::resource('task' , 'TaskController');
    Route::post('task/custom/store/{id}' , 'TaskController@custom_store')->name('finaltask.custom.store');
    Route::get('task/custom/delete/{id}' , 'TaskController@customdelete')->name('finaltask.custom.delete');

    Route::post('othertask/custom/store/{id}' , 'UserQuizController@custom_store')->name('othertask.custom.store');
    Route::get('othertask/show/{id}' , 'UserQuizController@show_custom')->name('othertask.show.test');
    Route::get('othertask/custom/delete/{id}' , 'UserQuizController@customdelete')->name('othertask.custom.delete');

});



Route::group(['middleware' => ['admin' && 'superadmin']] , function (){

    Route::resource('channels' , 'ChannelsController');
    Route::resource('category' , 'CategoryController');
    Route::resource('packagecourse' , 'PackageCourseController');
    Route::resource('video' , 'VideoController');
    Route::resource('taskuser' , 'TaskUserController');
    Route::resource('othertask' , 'QuizController');

    Route::get('tasklolos' , 'TaskUserController@filter_lolos')->name('taskuser.index2');
    Route::get('taskbelumlolos' , 'TaskUserController@filter_belumlolos')->name('taskuser.index3');
    Route::get('search/user/lolos' , 'TaskUserController@search_lolos')->name('taskuser.index2.search');
    Route::get('search/user/belumlolos' , 'TaskUserController@search_belumlolos')->name('taskuser.index3.search');
    Route::get('task/user/download/file/{id}' , 'TaskUserController@download')->name('download.file.task');
    Route::get('task/user/status/change/{id}' , 'TaskUserController@statuschange')->name('status.change');
    Route::get('task/user/create/package/{id}' , 'TaskUserController@create_custom')->name('task.custom.create');
    Route::get('task/user/store/package/{id}' , 'TaskUserController@custom_store')->name('task.custom.store');
    Route::get('task/user/show/package/{id}' , 'TaskUserController@show_the_descript')->name('task.custom.show');
    Route::get('task/user/destroy/package/{id}' , 'TaskUserController@custom_destroy')->name('task.custom.destroy');

    Route::get('othertasklolos' , 'QuizController@filter_lolos')->name('othertaskuser.index2');
    Route::get('othertasklolos/search/lolos' , 'QuizController@search_lolos')->name('othertaskuser.index2.search');
    Route::get('othertaskbelumlolos' , 'QuizController@filter_belumlolos')->name('othertaskuser.index3');
    Route::get('othertaskbelumlolos/search/belumlolos' , 'QuizController@search_belum_lolos')->name('othertaskuser.index3.search');
    Route::get('othertask/admin/create/{idvideo}' , 'QuizController@create_custom')->name('othertask.createcustom');
    Route::get('othertask/admin/delete/{id}/{idvideo}' , 'QuizController@destroy_custom')->name('othertask.destroycustom');
    Route::get('othertask/admin/show/{id}/user_quiz' , 'QuizController@show_userquiz')->name('othertask.showcustom.userquiz');
    Route::get('othertask/user/download/file/{id}' , 'QuizController@download')->name('download.file.othertask');
    Route::get('othertask/user/status/change/{id}' , 'QuizController@statuschange')->name('othertask.status.change');


    Route::get('video/filter/page','VideoController@filtervideo')->name('video.filter.page');
    Route::get('video/page2/{id}' , 'VideoController@index2')->name('video.index2');

    Route::get('/admin/home', 'AdminController@index')->name('admin.index');
    Route::get('/admin/user/list', 'AdminController@viewuserlist')->name('page2.admin.userlist');
    Route::get('/superadmin/user/list', 'SuperAdminController@viewuserlist')->name('page.superadmin.userlist');
    Route::get('/admin/user/search', 'AdminController@searchuser')->name('page.search.user.admin');

    Route::get('/superadmin/home', 'SuperAdminController@index')->name('superadmin.index');
    Route::get('/superadmin/user/list', 'SuperAdminController@viewuserlist')->name('page.superadmin.userlist');
    Route::get('/superadmin/detail/user/{id}' , 'SuperAdminController@detail_user')->name('superadmin.user.detail');
    Route::get('/superadmin/user/search', 'SuperAdminController@searchuser')->name('page.search.user.superadmin');
    Route::get('/superadmin/channels/search', 'ChannelsController@searchchannels')->name('page.search.channels.superadmin');
    Route::get('/superadmin/category/search', 'CategoryController@searchcategory')->name('page.search.category.superadmin');
    Route::get('/superadmin/coursepackage/search', 'PackageCourseController@searchpackage')->name('page.search.coursepackage.superadmin');
    Route::get('/superadmin/paymentsreport/search', 'CoursePaymentsReportController@search_report')->name('page.search.reportpayments.superadmin');
    Route::get('/superadmin/paymentsreport/pdf', 'PaymentReportPdfController@get_pdf')->name('pdf.search.reportpayments.superadmin');


    Route::get('/admin/edit/user/{id}', 'AdminController@editpageuser')->name('page.edit.user');
    Route::get('/admin/add/edit/user/{id}', 'AdminController@storeeditpageuser')->name('store.edit.user');
    Route::get('admin/detail/user/{id}' , 'AdminController@detail_user')->name('admin.user.detail');
    Route::delete('/admin/user/delete/{id}', 'AdminController@destroy_user')->name('page.user.delete');
//----------------------------------------------




//--------------------REPORT--------------------------
    Route::get('/admin/view/discuss', 'AdminController@viewdiscusslistreport')->name('page.viewdiscuss');
    Route::get('/admin/search/report_discuss' , 'AdminController@searchreport_discuss')->name('search.report.discuss');
    Route::get('/admin/discuss/view/report/{id}' , 'AdminController@deleteallreportdiscuss')->name('delete.all.report.list');
    Route::get('/admin/discuss/view/report/delete/{id}' , 'AdminController@destroy_report')->name('report.discuss.delete');
    Route::get('/admin/report/detail/{discussId}/{reportId}' , 'AdminController@report_discussdetail')->name('report.discuss.detail');
    Route::get('/admin/report/delete/{discussId}/{reportId}' , 'AdminController@delete_discussion')->name('report.diskusi.delete');


    Route::get('/admin/report/video/page/list' , 'AdminController@viewvideoslistreport')->name('page.report.video.index');
    Route::get('/admin/report/{id}/video/page/detail' , 'AdminController@reportvideodetail')->name('page.report.video.detail');
    Route::get('/admin/report/{id}/delete/page' , 'AdminController@deletereportvideo')->name('page.report.video.delete');
    Route::get('/admin/report/{id}/all/delete/page' , 'AdminController@deleteasllreportvideo')->name('page.report.video.delete.all');
    Route::get('/admin/report/serach/video' , 'AdminController@searchreportvideo')->name('page.report.video.search.all');
//  ------------------------------------------------




//  ------------------------------------------------
    Route::get('/viewadminpage', 'SuperAdminController@viewadminpage')->name('superadmin.viewadmin');
    Route::get('/search/admin/superadmin', 'SuperAdminController@searchadminpage')->name('superadmin.search.admin');
    Route::get('/viewadminpage/addadmin', 'SuperAdminController@add_admin_page')->name('superadmin.addadmin');
    Route::get('/viewadminpage/addadmin/store/{id}', 'SuperAdminController@store_admin_data')->name('admin.store.admin');
    Route::get('/viewadminpage/addsuperadmin/store/{id}', 'SuperAdminController@store_superadmin_data')->name('superadmin.store.admin');
    Route::get('/viewadminpage/edit/{id}', 'SuperAdminController@editadminpage')->name('superadmin.editadmin');
    Route::get('/viewadminpage/edit/store/{id}', 'SuperAdminController@store_data_edit_admin')->name('store.edit.admin');
    Route::delete('/viewadminpage/delete/{id}', 'SuperAdminController@destroyadmin')->name('store.destroy.admin');
//----------------------------------------------


//----------------------------------------------
    Route::get('/not/payed' , 'PayCourseController@notpayed_index')->name('notpayment.index');
    Route::get('/have/payed' , 'PayCourseController@havepayed_index')->name('havepayment.index');
    Route::get('/user/payed/{id}' , 'PayCourseController@havepayed')->name('payed');
    Route::get('/user/notpayed/{id}' , 'PayCourseController@deletepayed')->name('delete.payed');
    Route::get('/user/notpayed/delete/{id}' , 'PayCourseController@deletenotpayed')->name('delete.notpayed');
    Route::get('/user/search/havepayed' , 'PayCourseController@search_havepayed')->name('search.havepayed');
    Route::get('/user/search/notpayed' , 'PayCourseController@search_notpayed')->name('search.notpayed');
//----------------------------------------------

//----------------------------------------------
    Route::get('/user/course/paymentsreport' , 'CoursePaymentsReportController@index')->name('course.reports.payments');
//----------------------------------------------



});

