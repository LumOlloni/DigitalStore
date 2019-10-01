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
Route::group(['middleware' => ['guest']] , function ()
{
    Route::get('/', function () {
        return view('template.index');
    })->name('index');

    Route::post('contactForm' ,'ControllerContact@email');


    Route::get('/contact', function () {
        return view('template.contact');
    });

    Route::get('/signUp' ,function ()
    {
        return view('template.signUp'); 
    })->name('signUp');

    Route::get('/about', function () {
        return view('template.about');
    })->name('about');

});

Route::get('/error', 'ControllerContact@error')->name('error');


Auth::routes();

// Route::resource();
Route::group(['middleware' => ['auth.admin']] , function ()
{
    Route::get('/menage', function(){
        return view('adminTemplate.menage');
    }); 

   

    Route::prefix('menage')->group(function () {

        Route::get('/error', 'ControllerContact@error')->name('error');

        Route::group(['middleware' => 'superAdmin.access:superadmin'], function () {
            
            Route::get('/roleUsers' , 'UserController@index');
            Route::get('/roleUsers/storeAdmin' , 'UserController@addAdmin');
            Route::get('/edit/{id}' , 'UserController@edit')->name('editAdmin');
            Route::put('/update/{id}' , 'UserController@update')->name('updateAdmin');
            Route::post('/storeUsers' , 'UserController@store');

            Route::get('/blockUsers' , 'BlockUsersController@index');
            Route::post('/blockUsers/{id}', 'BlockUsersController@blockUser' );
            Route::post('/unBlockUser/{id}', 'BlockUsersController@unBlockUser' );
        });


         Route::group(['middleware' => 'superAdmin.access:admin'], function () {
            Route::resource('product' , "ProductController");
            Route::get('/statProduct' , "AdminCotroller@statistics");
         });

         Route::group(['middleware' => 'superAdmin.access:Editor'], function () {

           Route::resource('category' , "CategoryController"); 
           Route::get('/allUser', 'AdminCotroller@allUser' );
           Route::get('/order/{userid}', 'AdminCotroller@order');
         });

            // Route::get('/statProduct' , "AdminCotroller@statistics");
        // Route::get('/blockUsers' , 'BlockUsersController@index');
        // Route::post('/blockUsers/{id}', 'BlockUsersController@blockUser' );
        // Route::post('/unBlockUser/{id}', 'BlockUsersController@unBlockUser' );
        // Route::get('/allUser', 'AdminCotroller@allUser' );
        // Route::get('/order/{userid}', 'AdminCotroller@order' );
       
    });

});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Google Social Root
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');


// 


Route::group(['middleware' => ['auth' , 'userMiddleware']] , function ()
{
    Route::get('/payment' , 'CheckOutController@downloadPDF')->name('pdfDowload');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/profile', 'ProfileController@index')->name('profile');    
    Route::post('/profile/{id}', 'ProfileController@updateProfile')->name('profileUpdate');  
   
    Route::prefix('home')->group(function () {
        Route::get('showProduct/{id}' , 'HomeController@show');
        Route::post('/search', 'HomeController@searchProduct');
        Route::get('/search/{cat}','HomeController@categorySearch');
        Route::get('/cart' , 'CartController@index')->name('shoppingCart');
        Route::post('/cart' , 'CartController@store')->name('cart.store');
        Route::delete('/cart/{id}' , 'CartController@destroy')->name('cart.destroy');
        Route::post('/cart/{id}' , 'CartController@update')->name('cart.update');
        Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
        Route::get('/payment' , 'CheckOutController@index')->name('paymentPage');
        Route::post('/payment' , 'CheckOutController@store')->name('paymentStore');
        Route::get('/thankYou' , 'CheckOutController@thankYou')->name('thankYouPage');

    });
  
});
















