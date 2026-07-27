<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Smt\Masterweb\Http\Controllers'], function () {
  // Route::get('/sm-master', 'AdmHomeController@index')->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
         \UniSharp\LaravelFilemanager\Lfm::routes();
     });
  // administrator route
  Route::group(['middleware' => ['web']], function () {
    Auth::routes(['verify' => true]);
    Route::get('/sm-master', 'Auth\LoginController@showLoginForm')->name('sm-master');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    //forget password
    Route::post('/send-reset-password-email','Auth\ResetPasswordController@ResetPasswordEmail')->name('password.email');
    Route::get('/reset-password/{token}', 'Auth\ResetPasswordController@ShowResetPasswordEmail')->name('password.email.token');
    Route::post('/reset-password-custome', 'Auth\ResetPasswordController@ResetPasswordCustome')->name('password.reset');

    Route::get('/home', 'AdmHomeController@index')->name('home');
    Route::resource('biodata', 'AdmBiodataController');

    // Layout
    Route::get('adm-layout/type/{id}', 'AdmLayoutController@index');
    Route::post('adm-layout/store', 'AdmLayoutController@store');
    Route::get('adm-layout/getColumn', 'AdmLayoutController@columnData');
    Route::get('adm-layout/get_option_view', 'AdmLayoutController@getOption');

    //Module Layout
    Route::resource('module-layout', 'AdmModuleLayoutController');

    // Users
    Route::resource('adm-users', 'UserController');
    Route::get('publish-users/{param}', 'UserController@publish');
    Route::get('reset-users/{param}', 'UserController@reset_password');
    Route::get('adm-password','AdmPasswordController@edit');
    Route::put('adm-password', 'AdmPasswordController@update')
      ->name('user.adm-password.update');

    // Layout
    Route::get('adm-layout/type/{id}', 'AdmLayoutController@index');
    Route::post('adm-layout/store', 'AdmLayoutController@store');
    Route::get('adm-layout/getColumn', 'AdmLayoutController@columnData');
    Route::get('adm-layout/get_option_view', 'AdmLayoutController@getOption');

    // Privileges
    Route::resource('adm-privileges', 'AdmPrivilegesController');

    // Client
    Route::resource('adm-client', 'AdmClientController');
    Route::get('adm-client/publish/{id}', 'AdmClientController@publish');

    //Testimoni
    Route::resource('adm-testimoni', 'AdmTestimoniController');
    Route::get('adm-testimoni/publish/{id}', 'AdmTestimoniController@publish');

    //Album
    Route::resource('adm-album', 'AdmAlbumController');

    //Gallery
    Route::resource('adm-gallery', 'AdmGalleryController');
    Route::get('adm-gallery/publish/{id}', 'AdmGalleryController@publish');
    Route::get('adm-gallery/list/{id}', 'AdmGalleryController@list')->name('adm-gallery.list');

    //Category Portofolio
    Route::resource('adm-categoryportofolio', 'AdmCategoryPortofolioController');

    //Portofolio
    Route::resource('adm-portofolio', 'AdmPortofolioController');
    Route::get('adm-portofolio/publish/{id}', 'AdmPortofolioController@publish');



    //Route Admin Menu
    Route::resource('menuadm', 'AdmMenuController');
    Route::get('menuadm/index', 'AdmMenuController@index');
    Route::post('menuadm/sort', 'AdmMenuController@sort');
    Route::post('menuadm/store', 'AdmMenuController@store');
    Route::post('menuadm/data', 'AdmMenuController@data');
    Route::post('menuadm/update', 'AdmMenuController@update');
    Route::get('menuadm/change', 'AdmMenuController@change');
    Route::delete('menuadm/destroy/{id}', 'AdmMenuController@destroy');

    //ROUTE MENU PUBLIC
    Route::resource('menu', 'AdmMenuPublicController');
    Route::get('menu/index', 'AdmMenuPublicController@index');
    Route::post('menu/sort', 'AdmMenuPublicController@sort');
    Route::post('menu/store', 'AdmMenuPublicController@store');
    Route::post('menu/data', 'AdmMenuPublicController@data');
    Route::post('menu/update', 'AdmMenuPublicController@update');
    Route::get('menu/change', 'AdmMenuPublicController@change');
    Route::delete('menu/destroy/{id}', 'AdmMenuPublicController@destroy');

    Route::resource('logo', 'AdmOptionsController');
    Route::get('favicon', 'AdmOptionsController@index_favicon');
    Route::put('favicon/{id}', 'AdmOptionsController@update_favicon');
    Route::get('metadata', 'AdmOptionsController@index_metadata');
    Route::put('metadata/{id}', 'AdmOptionsController@update_metadata');

    Route::get('adm-maps', 'AdmOptionsController@index_maps');
    Route::put('adm-maps/{id}', 'AdmOptionsController@update_maps');

    Route::resource('admsosmed', 'AdmSosmedController');

    // Admin
    Route::resource('admslideshow', 'AdmSlideshowController');
    Route::get('admslideshow/publish/{id}', 'AdmSlideshowController@publish');

    //ADMIN CONTENT
    Route::resource('admcontent', 'AdmContentController');

    //ADMIN ARTIKEL
    Route::resource('admarticle', 'AdmArticleController');

    //Admin Contact
    Route::resource('admcontact', 'AdmContactController');

    //Admin Contact
    Route::resource('admfeedback', 'AdmFeedbackController');

    //Admin Offer (Penawaran)
    Route::resource('admoffer', 'AdmOfferController');
    Route::get('admoffer/publish/{id}', 'AdmOfferController@publish');

    //Admin Contact
    Route::resource('adm-faq', 'AdmFaqController');
    Route::get('adm-faq/publish/{id}', 'AdmFaqController@publish');

    //Admin Layanan
    Route::resource('admlayanan', 'AdmLayananController');
    Route::resource('adm-categorylayanan', 'AdmCategoryLayananController');

    //generator
    // ubah
    Route::get('master/slideshow/{action?}/{id?}', 'MasterController@slideshow');
    Route::get('master/type/{action?}/{id?}', 'MasterController@type');
    Route::get('master/module/{action?}/{id?}', 'MasterController@modul');
    //dilarang
    Route::post('master/SMStore', 'CrudController@store');
    Route::post('master/SMUpdate/{id}', 'CrudController@update');
    Route::get('master/SMDelete/{id}/{table}', 'CrudController@destroy');
    //end generator

    //Admin
  });

  Route::resource('api/article', 'Api\ArticleController');

  //filemanager
    
     
    //proses contact us
    Route::post('create_contact', 'ProcessController@contact');

    //proses penawaran
    Route::post('create_offer', 'ProcessController@offer');
    //dinamic
    // Home page
    Route::get('/', [
        'as'      => 'home',
        'uses'    => 'PageController@index'
    ]);

    

    // Catch all page controller (place at the very bottom)
    Route::get('{slug}', [
        'uses' => 'PageController@getPage' 
    ])->where('slug', '([A-Za-z0-9\-\/]+)');
    Route::get('{slug}/view/{link}', [
        'uses' => 'PageController@getPage' 
    ])->where('slug', '([A-Za-z0-9\-\/]+)');
    //if have category in page
    Route::get('{slug}/cat/{link}', [
        'uses' => 'PageController@getPage' 
    ])->where('slug', '([A-Za-z0-9\-\/]+)');
});