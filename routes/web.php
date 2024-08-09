<?php

use App\Http\Controllers\Admin\ActivitylogsController;
use App\Http\Controllers\FirestoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Staff\StaffweathershowController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StaffManagementController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\Staff\StaffDashboardController;
use App\Http\Controllers\Staff\ViewportsController;
use App\Http\Controllers\Staff\AddCasualtiesController;
use App\Http\Controllers\Admin\ResidentManagementController;
use App\Services\SmsService;
use Illuminate\Support\Facades\Log;


Route::get('/', function () {
    return Redirect::to('/login');
})->middleware('redirect.if.auth');
// Route::get("/", function () {
//     return view("cloning.report");
// });
Route::get('/water-levels', [FirestoreController::class, 'getWaterLevels']);
require __DIR__.'/auth.php';

Route::group(['middleware' => 'admin'], function (){
    //dashboard Route
    //view Route
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/send-sms', [SMSController::class, 'sendsms'])->name('send-sms');

    //staff Management Route
    //view Route
    Route::get('/admin/staffMaanagent', [StaffManagementController::class, 'index'])->name('admin.staffmanagement');

    //action Routes
    Route::post('/admin/addstaff', [StaffManagementController::class, 'store'])->name('admin.addstaff');
    Route::get('/user/toggle-status/{id}', [StaffManagementController::class, 'toggleStatus'])->name('user.toggleStatus');
    Route::post('/user/update/{id}', [StaffManagementController::class, 'update'])->name('user.update'); 
    Route::delete('/admin/staffManagement/{id}', [StaffManagementController::class, 'destroy'])->name('staffManagement.destroy');  

    Route::get('/admin/reports', [ReportsController::class, 'index'])->name('admin.reports');
    Route::get('/admin/weatherforecast', [WeatherController::class, 'show'])->name('admin.weatherforecast');
    Route::get('/admin/activitylogs', [ActivitylogsController::class,'index'])->name('admin.act');
    Route::get('/admin/residentmanagement', [ResidentManagementController::class, 'index'])->name('contacts.index');
    Route::post('/admin/residentmanagement', [ResidentManagementController::class, 'store'])->name('contacts.store');
  

    Route::get('/admin/allreports', [ReportsController::class,'allReport'])->name('allreports.view');
    Route::get('/admin/casualtiesreport', [ReportsController::class,'casualtiesReports'])->name('casualties.view');
    Route::get('/admin/damagedproperties', [ReportsController::class,'damagedpropertiesReports'])->name('damagedproperties.view');
    Route::get('/admin/historicaldata', [ReportsController::class,'historicalDataReports'])->name('historicaldata.view');

   
    Route::get('/admin/allreports/{id}', [ReportsController::class,'showAllReports'])->name('mallreports.view');


});

Route::group(['middleware' => 'user'], function () {
  //dashboard Route
  Route::get('/staff/dashboard', [StaffDashboardController::class,'index'])->name('WLa');

  //weather Route
  Route::get('/staff/weatherforecast', [StaffweathershowController::class, 'show'])->name('staff.weatherforecast');

  //Add report Route
  //Add reports Views Route
  Route::get('/staff/addcasualties', [AddCasualtiesController::class, 'index'])->name('staff.addreport');
  //actions Route
  Route::post('/staff/addcasualties', [AddCasualtiesController::class, 'store'])->name('report.store');

  //My reports Route
  //view Route
  Route::get('/staff/historicaldata', [ViewportsController::class,'index'])->name('historical.view');
  Route::get('/staff/casualtiesReport', [ViewportsController::class,'casualtiesReport'])->name('casualtiesReport.view');
  Route::get('/staff/myreports', [ViewportsController::class,'myReports'])->name('myreports.view');
  Route::get('/staff/damageproperties', [ViewportsController::class,'damagePropertiesReport'])->name('damagedpropeties.view');
  //modals
  Route::get('/staff/myreports/{id}', [ViewportsController::class,'showReports'])->name('reports.view');

  //actions route
  //multiple delete
  Route::post('/staff/delete/record',[ViewportsController::class,'multipleDelete'])->name('multiple.delete');

});



