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

Route::get('/' , function (){
    return redirect(app()->getLocale());
});

//    Route::group([
//    'prefix' => '{locale}',
//    'where' => ['locale' => '[a-zA-Z]{2}'],
//    'middleware' => 'setlocale',], function() {

//    Route::group(['middleware' => ['web']], function () {

 Route::get('setlocale/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        Session::put('locale', $locale);
        return redirect()->back();
    }
});
                Route::group(['middleware' => ['web']], function () {
        Route::get('/' , 'IndexController@index')->name('index');
        Route::get('/category/female', 'CategoryController@female')->name('category.female');
//    Route::post('/category/female/brand' , 'CategoryController@showBrandsFemale');
        Route::get('/category/male', 'CategoryController@male')->name('category.male');
//    Route::post('/filter/show_brands' , 'CategoryController@female')->name('filter.showBrand');
        Route::post('/show/products', 'FilterController@productsFilter')->name('filter.products');
//    Route::post('/show/products1' , 'FilterController@productsMale')->name('filter.productsMale');
        Route::get('/products/{product}', 'ProductController@show')->name('product.show');

        Route::post('/comments/store/', 'CommentController@store')->name('comment-store');
        Route::get('/cart/add/{id}', 'CartController@add')->name('add_cart');
        Route::get('/cart/show', 'CartController@show')->name('show_cart');
        Route::get('/cart/remove/{id}', 'CartController@remove')->name('cart.remove');
        Route::get('/view_cart', 'CartController@viewCart')->name('cart.view');
        Route::post('/store', 'OrderController@store')->name('new_order');
        Route::get('/brands/{brand}', 'ProductController@showProduct')->name('brand.show');
        Route::get('/stocks' , 'IndexController@stocks')->name('stocks');
        Route::get('/delivery' , 'IndexController@delivery')->name('delivery');
        Route::get('/contacts', 'IndexController@contacts')->name('contact');
        Route::get('/reviews' , 'IndexController@reviews')->name('review');
                });

        Route::group(['middleware' => ['web']], function (){
                    Auth::routes();
                    Route::get('admin/home', 'Admin\HomeController@index')->name('home');
                    Route::resource('admin/brands' , 'Admin\BrandController');
                    Route::resource('admin/products', 'Admin\ProductController');
                    Route::post('admin/products/{id}/photo/upload' , 'Admin\ProductImageController@upload')->name('addNewPhoto');
                    Route::delete('admin/productsImage/destroy/{id}' , 'Admin\ProductImageController@destroy')->name('deletePhoto');
                    Route::resource('admin/categories' , 'Admin\CategoryController');
                    Route::get('admin/navigations' , 'Admin\NavigationController@index')->name('admin.navigations');
                    Route::put('admin/navigations/{id}/update',  'Admin\NavigationController@update')->name('admin.navigation-update');
                    Route::put('admin/navigations/{id}/brand-update' , 'Admin\NavigationController@brandUpdate')->name('admin.navigation-brand-update');
                    Route::get('admin/navigationEns' , 'Admin\NavigationController@navigationEn')->name('admin.navigationEns');
                    Route::resource('admin/users' , 'Admin\UserController');
                    Route::get('admin/users-add-user' , 'Admin\UserController@createUser')->name('admin.create-user');
                    Route::resource('admin/orders', 'Admin\OrderController');

                    Route::get('/api' , 'Admin\ApiController@getWarehouse');
                    Route::get('/api/getCities' , 'Admin\ApiController@getCities');
                    Route::get('/api/getWarehouse' , 'Admin\ApiController@getWarehouse');
        });



