<?php

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::get('/', function () {
            return view('welcome');
            })->name('welcome');

        Route::get('/index', function () {
            return view('front.index');
            })->name('index');

        Route::get('/about', function () {
                return view('front.about');
                })->name('about');


        Route::get('/contact', function () {
            return view('front.contact');
            })->name('contact');

        Route::get('/browseOpportunity', function () {
            return view('front.browseOpportunity');
            })->name('browseOpportunity');

        Route::get('/serviceRequestForm', function () {
            return view('front.serviceRequestForm');
            })->name('serviceRequestForm');

            Route::get('/freelancers', function () {
                return view('front.freelancers');
                })->name('freelancers');


        Route::group(
            [
                'middleware' => ['auth:sanctum'],
            ], function()
            {
                Route::get('/home', 'HomeController@index')->name('home');



Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'middleware' => [ 'admin'],
    ], function()
    {

        Route::get('/dashboard', function () {
        return view('admin.dashboard');
        })->name('dashboard');
/*
        Route::get('/req', function () {
        return view('admin.requestServiceDetail');
       })->name('req');
*/
        Route::resource('mclient', 'ClientController');
        Route::get('/mclient/activate/{client}', 'ClientController@activate');

        Route::resource('mfreelancer', 'FreelancerController');
        Route::get('/mfreelancer/activate/{client}', 'FreelancerController@activate');
        Route::get('/mfreelancer/accept/{freelancer}', 'FreelancerController@accept');

        Route::resource('mcategory', 'CategoryController');
        Route::resource('msubcategory', 'SubCategoryController');

        Route::resource('mfeedback', 'FeedbackController');
        Route::resource('mrequestservice', 'RequestServiceController');

        Route::resource('cmsPages', 'CmsController');

 
});

});

});


///////////////// admin ////////////////////////
