<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RoutesubserviceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Front
Route::get('/', 'HomeController@index')->name('index');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/whyus', 'HomeController@whyus')->name('whyus');

Route::get('/faq', 'HomeController@faq')->name('faq');


Route::post('/contact/submit', 'HomeController@contactsubmit')->name('contactsubmit');

Route::get('/customerlogin', 'HomeController@login')->name('customerlogin');
Route::get('/customerlogout', 'HomeController@customerlogout')->name('customerlogout');

Route::post('/loginsubmit', 'HomeController@loginsubmit')->name('loginsubmit');
Route::post('/registersubmit', 'HomeController@registersubmit')->name('registersubmit');

Route::group(['middleware' => ['customer'], 'prefix' => 'customer'], function () {
    Route::get('/profile', 'HomeController@profile')->name('customer_profile');
    Route::get('/dashboard', 'HomeController@dashboard')->name('customer_dashboard');

    Route::post('/profile/submit', 'HomeController@profile_submit')->name('profile_submit');
});

// Admin Panel

Route::get('/login', 'DashboardController@login')->name('login');
Route::post('/submitlogin', 'DashboardController@submitLogin')->name('submtlogin');

Route::group(['middleware' => ['admin'], 'prefix' => 'adminpanel'], function () {
    Route::get('/logout', 'DashboardController@Adminlogout')->name('logout');
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

    // admin
    Route::get('admin/', array('as' => 'adminview', 'uses' => 'AdminController@index'));
    Route::get('admin/edit/{id}', array('as' => 'adminedit', 'uses' => 'AdminController@edit'));
    Route::get('admin/add', array('as' => 'adminadd', 'uses' => 'AdminController@add'));
    Route::get('admin/delete/{id}', array('as' => 'admindelete', 'uses' => 'AdminController@delete'));

    Route::post('admin/create', array('as' => 'admincreate', 'uses' => 'AdminController@create'));
    Route::post('admin/update', array('as' => 'adminupdate', 'uses' => 'AdminController@update'));

    // Company
    Route::get('company/', array('as' => 'companyview', 'uses' => 'CompanyController@index'));
    Route::post('company/update', array('as' => 'companyupdate', 'uses' => 'CompanyController@update'));
    Route::get('about/', array('as' => 'aboutview', 'uses' => 'CompanyController@about'));
    Route::get('banner/', array('as' => 'bannerview', 'uses' => 'CompanyController@banner'));
    Route::get('why_us/', array('as' => 'why_us', 'uses' => 'CompanyController@why_us'));

    // testimonial
    Route::get('testimonial/', array('as' => 'testimonialview', 'uses' => 'TestimonialController@index'));
    Route::get('testimonial/edit/{id}', array('as' => 'testimonialedit', 'uses' => 'TestimonialController@edit'));
    Route::get('testimonial/add', array('as' => 'testimonialadd', 'uses' => 'TestimonialController@add'));
    Route::get('testimonial/delete/{id}', array('as' => 'testimonialdelete', 'uses' => 'TestimonialController@delete'));

    Route::post('testimonial/create', array('as' => 'testimonialcreate', 'uses' => 'TestimonialController@create'));
    Route::post('testimonial/update', array('as' => 'testimonialupdate', 'uses' => 'TestimonialController@update'));

    // slider
    Route::get('slider/', array('as' => 'sliderview', 'uses' => 'SliderController@index'));
    Route::get('slider/edit/{id}', array('as' => 'slideredit', 'uses' => 'SliderController@edit'));
    Route::get('slider/add', array('as' => 'slideradd', 'uses' => 'SliderController@add'));
    Route::get('slider/delete/{id}', array('as' => 'sliderdelete', 'uses' => 'SliderController@delete'));

    Route::post('slider/create', array('as' => 'slidercreate', 'uses' => 'SliderController@create'));
    Route::post('slider/update', array('as' => 'sliderupdate', 'uses' => 'SliderController@update'));

    Route::get('report/abuse', array('as' => 'reportabuseview', 'uses' => 'ReportAbuseController@index'));

    // faq
    Route::get('faq/', array('as' => 'faqview', 'uses' => 'FaqController@index'));
    Route::get('faq/edit/{id}', array('as' => 'faqedit', 'uses' => 'FaqController@edit'));
    Route::get('faq/add', array('as' => 'faqadd', 'uses' => 'FaqController@add'));
    Route::get('faq/delete/{id}', array('as' => 'faqdelete', 'uses' => 'FaqController@delete'));

    Route::post('faq/create', array('as' => 'faqcreate', 'uses' => 'FaqController@create'));
    Route::post('faq/update', array('as' => 'faqupdate', 'uses' => 'FaqController@update'));

    // customer
    Route::get('customer/view/{type}', array('as' => 'customerview', 'uses' => 'CustomerController@index'));
    Route::get('customer/edit/{id}', array('as' => 'customeredit', 'uses' => 'CustomerController@edit'));
    Route::get('customer/add', array('as' => 'customeradd', 'uses' => 'CustomerController@add'));
    Route::get('customer/delete/{id}', array('as' => 'customerdelete', 'uses' => 'CustomerController@delete'));
    Route::get('customer/status/{id}/{status}', array('as' => 'userstatus', 'uses' => 'CustomerController@status'));

    Route::post('customer/create', array('as' => 'customercreate', 'uses' => 'CustomerController@create'));
    Route::post('customer/update', array('as' => 'customerupdate', 'uses' => 'CustomerController@update'));
});
