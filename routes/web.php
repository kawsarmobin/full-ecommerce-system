<?php

Route::get('/', function () {
    return view('pages.index');
});
//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password/change', 'HomeController@changePassword')->name('password.change');
Route::post('/password/update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');

// Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password', 'AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update', 'AdminController@Update_pass')->name('admin.password.update');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

//admin panel
//category
Route::resource('categories', 'Admin\Category\CategoriesController')->except(['destroy']);
Route::get('category/destroy/{category}', 'Admin\Category\CategoriesController@destroy')->name('categories.destroy');
//brand
Route::resource('brands', 'Admin\Category\BrandsController')->except(['destroy']);
Route::get('brand/destroy/{brand}', 'Admin\Category\BrandsController@destroy')->name('brands.destroy');
//sub-category
Route::resource('sub-category', 'Admin\Category\SubCategoriesController')->except(['destroy']);
Route::get('sub-category/destroy/{sub_category}', 'Admin\Category\SubCategoriesController@destroy')->name('sub-category.destroy');
//coupon
Route::resource('coupons', 'Admin\CouponController')->except(['destroy']);
Route::get('coupons/destroy/{id}', 'Admin\CouponController@destroy')->name('coupons.destroy');
//newsletter
Route::get('newsletter', 'Admin\NewslettersController@index')->name('index.newsletters');
Route::get('newsletter/destroy/{id}', 'Admin\NewslettersController@destroy')->name('destroy.newsletters');
//products
Route::resource('products', 'Admin\ProductsController')->except(['destroy']);
Route::get('products/destroy/{product}', 'Admin\ProductsController@destroy')->name('products.destroy');
Route::get('products/change-status/{product}', 'Admin\ProductsController@changeStatus')->name('products.change.status');
//blog
// category
Route::resource('blog-categories', 'Admin\BlogCategoriesController')->except(['create', 'show', 'destroy']);
Route::get('blog-categories/destroy/{blog_category}', 'Admin\BlogCategoriesController@destroy')->name('blog-categories.destroy');
// post
Route::resource('blog-posts', 'Admin\BlogPostsController')->except(['destroy']);
Route::get('blog-posts/{blog_post}/destroy', 'Admin\BlogPostsController@destroy')->name('blog-posts.destroy');


//get sub category by ajax
Route::get('get/sub/category/{category_id}', 'Admin\ProductsController@getSubCategory');

//add wishlist ajax
Route::get('store/wishlist/{id}', 'WishlistsController@store')->name('wishlist.store');

//add cart ajax
Route::get('add/to/cart/{id}', 'CartController@addCart');
Route::get('check', 'CartController@check');
Route::get('show-cart-content', 'CartController@showCartContent')->name('show.cart.content');
Route::get('cart-remove/{rowId}', 'CartController@cartRemove')->name('cart.remove');
Route::post('update-cart-item', 'CartController@updateCartItem')->name('update.cart.item');

//socialite
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

//all frontend routes are here
Route::post('store/newsletter', 'FrontendController@storeNewsLetters')->name('store.newsletters');

Route::get('product/details/{id}/{product_name}', 'ProductController@productView')->name('product.view');
Route::post('cart/product/add/{id}', 'ProductController@cartProductAdd')->name('cart.product.add');
Route::get('cart/product/view/{id}', 'ProductController@cartProductView')->name('update.cart.view');
Route::post('/insert/into/cart', 'ProductController@insertCart')->name('insert.into.cart');

//customer profile related routes
