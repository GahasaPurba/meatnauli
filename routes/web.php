<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);

Route::get('/', 'BerandaController@index');
Route::get('/tentangkami', function () {
    return view('frontend.tentangkami.index');
});

Route::group(['middleware' => 'verified'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/editpost/{id}', 'HomeController@editpost')->name('home.editpost');
    Route::delete('/home/destroypost/{id}', 'HomeController@destroypost')->name('home.destroypost');
    Route::get('/home/editquestion/{id}', 'HomeController@editquestion')->name('home.editquestion');
    Route::delete('/home/destroyquestion/{id}', 'HomeController@destroyquestion')->name('home.destroyquestion');
    Route::get('/home/edititem/{id}', 'HomeController@edititem')->name('home.edititem');
    Route::delete('/home/destroyitem/{id}', 'HomeController@destroyitem')->name('home.destroyitem');
    Route::get('/mailsearch', 'MailController@search')->name('mailsearch');
    Route::resource('/announcement', 'AnnouncementController');
    Route::get('/announcementsearch', 'AnnouncementController@search')->name('announcementsearch');
    Route::resource('/editprofile', 'EditProfileController');
    Route::resource('/questionnaire', 'QuestionnaireController');
    Route::resource('/category', 'CategoryController');
    Route::get('/categorysearch', 'CategoryController@search')->name('categorysearch');
    Route::resource('/tag', 'TagController');
    Route::get('/tagsearch', 'TagController@search')->name('tagsearch');
    Route::resource('/qnacategory', 'QnaCategoryController');
    Route::get('/qnacategorysearch', 'QnaCategoryController@search')->name('qnacategorysearch');
    Route::resource('/souvenircategory', 'SouvenirCategoryController');
    Route::get('/souvenircategorysearch', 'SouvenirCategoryController@search')->name('souvenircategorysearch');
    Route::resource('/author', 'AuthorController');
    Route::get('/author/edits/{id}', 'AuthorController@edits')->name('author.edits');
    Route::get('/authorsearch', 'AuthorController@search')->name('authorsearch');
    Route::resource('/seller', 'SellerController');
    Route::get('/seller/edits/{id}', 'SellerController@edits')->name('seller.edits');
    Route::get('/sellersearch', 'SellerController@search')->name('sellersearch');
    Route::resource('/user', 'UserController');
    Route::get('/user/edits/{id}', 'UserController@edits')->name('user.edits');
    Route::get('/usersearch', 'UserController@search')->name('usersearch');
    Route::get('/post/trash', 'PostController@trash')->name('post.trash');
    Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
    Route::delete('/post/kill/{id}', 'PostController@kill')->name('post.kill');
    Route::resource('/post', 'PostController');
    Route::get('/postsearch', 'PostController@search')->name('postsearch');
    Route::get('/postexcel', 'PostController@excel')->name('postexcel');
    Route::get('/postpdf', 'PostController@pdf')->name('postpdf');
    Route::get('/question/trash', 'QuestionController@trash')->name('question.trash');
    Route::get('/question/restore/{id}', 'QuestionController@restore')->name('question.restore');
    Route::delete('/question/kill/{id}', 'QuestionController@kill')->name('question.kill');
    Route::resource('/question', 'QuestionController');
    Route::get('/questionsearch', 'QuestionController@search')->name('questionsearch');
    Route::get('/item/trash', 'ItemController@trash')->name('item.trash');
    Route::get('/item/restore/{id}', 'ItemController@restore')->name('item.restore');
    Route::delete('/item/kill/{id}', 'ItemController@kill')->name('item.kill');
    Route::resource('/item', 'ItemController');
    Route::get('/itemsearch', 'ItemController@search')->name('itemsearch');
    Route::get('/itemexcel', 'ItemController@excel')->name('itemexcel');
    Route::get('/itempdf', 'ItemController@pdf')->name('itempdf');
    Route::get('/qna', 'QnaController@qna')->name('qna');
    Route::get('/qnadetail/{slug}', 'QnaController@singleqna')->name('singleqna');
    Route::get('/qnacategories/{category}', 'QnaController@category')->name('qnacategory');
    Route::get('/qnasearch', 'QnaController@search')->name('qnasearch');
    Route::post('/souvenirorder/{id}', 'SouvenirController@order')->name('souvenir.order');
    Route::patch('/checkoutupdate/{id}', 'SouvenirController@update')->name('souvenir.update');
    Route::get('/shoppingcart', 'SouvenirController@shoppingcart')->name('souvenir.shoppingcart');
    Route::delete('/shoppingcart/{id}', 'SouvenirController@destroy')->name('souvenir.destroy');
    Route::post('/checkout', 'SouvenirController@checkout')->name('souvenir.checkout');
    Route::get('/province/{id}/cities', 'SouvenirController@getcities');
    Route::get('/payment', 'PaymentController@payment')->name('payment');
    Route::get('/paymentdetail/{id}', 'PaymentController@paymentdetail')->name('paymentdetail');
    Route::get('/payment2', 'PaymentController@payment2')->name('payment2');
    Route::get('/paymentdetail2/{id}', 'PaymentController@paymentdetail2')->name('paymentdetail2');
    Route::post('/paymentupload', 'PaymentController@paymentupload')->name('paymentupload');
    Route::patch('/paymentconfirm/{id}', 'PaymentController@paymentconfirm')->name('paymentconfirm');
    Route::delete('/payment/{id}', 'PaymentController@destroy')->name('payment.destroy');
});

Route::resource('/mail', 'MailController');
Route::get('/information', 'InformationController@index')->name('information');
Route::get('/caraberbelanja', 'BantuanController@berbelanja')->name('berbelanja');
Route::get('/caraberjualan', 'BantuanController@berjualan')->name('berjualan');
Route::get('/caramenambahpostingan', 'BantuanController@menambahpostingan')->name('menambahpostingan');
Route::get('/caramengajukanpertanyaan', 'BantuanController@mengajukanpertanyaan')->name('mengajukanpertanyaan');
Route::get('/blog', 'BlogController@blog')->name('blog');
Route::get('/blogdetail/{slug}', 'BlogController@singleblog')->name('singleblog');
Route::get('/blogcategories/{category}', 'BlogController@category')->name('blogcategory');
Route::get('/blogtags/{tag}', 'BlogController@tag')->name('blogtag');
Route::get('/blogsearch', 'BlogController@search')->name('blogsearch');
Route::get('/souvenir', 'SouvenirController@souvenir')->name('souvenir');
Route::get('/souvenirdetail/{slug}', 'SouvenirController@singlesouvenir')->name('singlesouvenir');
Route::get('/souvenircategories/{category}', 'SouvenirController@category')->name('souvenircategory');
Route::get('/souvenirsearch', 'SouvenirController@search')->name('souvenirsearch');
Route::get('login/google', 'Auth\LoginController@redirectToProvider1');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback1');
Route::get('register/google', 'Auth\RegisterController@redirectToProvider1');
Route::get('register/google/callback', 'Auth\RegisterController@handleProviderCallback1');
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider2');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback2');
Route::get('register/facebook', 'Auth\RegisterController@redirectToProvider2');
Route::get('register/facebook/callback', 'Auth\RegisterController@handleProviderCallback2');
Route::get('login/github', 'Auth\LoginController@redirectToProvider3');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback3');
Route::get('register/github', 'Auth\RegisterController@redirectToProvider3');
Route::get('register/github/callback', 'Auth\RegisterController@handleProviderCallback3');
