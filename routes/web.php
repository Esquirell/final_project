<?php

use Barryvdh\DomPDF\Facade as PDF;
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

Route::get('/', 'MainController@index')->name('main');
Route::post('record/success', 'RecordController@save')->name('new-record');
Route::post('/record/query', 'RecordController@queryDays')->name('record-query-days');
Route::post('/record/query-time', 'RecordController@queryTime')->name('record-query-time');

Auth::routes();

Route::middleware('check_guest')->group(function() {
    Route::get('/personal-cabinet', 'PersonalCabinetController@index')->name('personal-cabinet');
    Route::get('/personal-cabinet/generate', 'PersonalCabinetController@generateSchedule')->name('personal-cabinet.generateSchedule');
    Route::post('/personal-cabinet/update-info-doctor', 'PersonalCabinetController@updateInfoAboutDoctor')->name('personal-cabinet.updateInfoAboutDoctor');
    Route::post('/personal-cabinet/update-info-user', 'PersonalCabinetController@updateInfoAboutUser')->name('personal-cabinet.updateInfoAboutUser');
    Route::post('/personal-cabinet/update-avatar-user', 'PersonalCabinetController@updateAvatar')->name('personal-cabinet.updateAvatar');
    Route::get('/personal-cabinet/records', 'PersonalCabinetController@indexRecords')->name('personal-cabinet.indexRecords');
    Route::get('/record', 'RecordController@index')->name('record');
    Route::get('/personal-cabinet/records/{record}', 'PersonalCabinetController@showRecord')->name('personal-cabinet.showRecord');
    Route::get('/personal-cabinet/record/{id}', 'PersonalCabinetController@pdf')->name('pdf');

    Route::get('/personal-cabinet/schedule', 'PersonalCabinetController@indexSchedule')->name('personal-cabinet.indexSchedule');

});

Route::middleware('check_admin')->group(function() {
    Route::get('/admin-panel', 'AdminController@index')->name('admin-panel');
    Route::get('/admin-panel/generate', 'AdminController@generateSchedule')->name('admin-panel.generateSchedule');
    Route::get('/admin-panel/delete', 'AdminController@deleteTime')->name('admin-panel.deleteTime');
    Route::post('/admin-panel/add-doctor', 'AdminController@addDoctor')->name('admin-panel.addDoctor');
    Route::post('/admin-panel/delete-doctor', 'AdminController@deleteDoctor')->name('admin-panel.deleteDoctor');
    Route::post('/admin-panel/query-user', 'AdminController@queryUser')->name('admin-panel.queryUser');
    Route::get('admin-panel/records', 'AdminController@indexRecords')->name('admin-panel.indexRecords');
    Route::delete('admin-panel/records/{record}', 'AdminController@deleteRecord')->name('admin-panel.deleteRecord');
});

