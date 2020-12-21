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
// Route::get('/demo',function(){
//     $data = App\Models\Role::find('2')->load('users')->toArray();
//     var_dump($data);
// });
// Route::get('/demo2',function(){
//     $data = App\Models\User::find('1')->load('role')->toArray();
//     var_dump($data);
// });

Route::get('/', function () {
    return view('home');
});
Route::get('register','App\Http\Controllers\RegisterController@index')->name('register');
Route::post('registerSubmit','App\Http\Controllers\RegisterController@store')->name('registerSubmit');
Route::post('loginSubmit','App\Http\Controllers\LoginController@store')->name('loginSubmit');
Route::get('emailAuthentication','App\Http\Controllers\ChangePassword@emailAuthPage')->name('emailAuth');
Route::get('login','App\Http\Controllers\LoginController@login')->name('login');
Route::get('emailAuthentication/token','App\Http\Controllers\ChangePassword@token');
Route::get('logout','App\Http\Controllers\LoginController@logout')->name('logout');
Route::get('/admin','App\Http\Controllers\LoginController@loginAdmin');
Route::post('/admin','App\Http\Controllers\LoginController@loginAdminPost')->name('loginAdmin');
Route::group(['prefix'=>'loginSuccess', 'middleware' => 'CheckAuth'],function(){
    Route::get('/','App\Http\Controllers\LoginController@loginSuccess')->name('loginSuccess');
    Route::get('/borrow/{id}','App\Http\Controllers\BorrowBooksController@borrowBook')->name('borrowBook');
    Route::get('/listBorrow/delete/{id}','App\Http\Controllers\BorrowBooksController@deleteBook')->name('deleteBookBorrow');
    Route::get('/listBorrow','App\Http\Controllers\BorrowBooksController@listBorrow')->name('listBorrow');
    Route::get('/listBorrow/send/{id}','App\Http\Controllers\BorrowBooksController@sendBorrowBook')->name('sendBorrowBook');
    Route::get('/changePassword','App\Http\Controllers\ChangePassword@change')->name('changePass');
    Route::post('/changePassword','App\Http\Controllers\ChangePassword@store')->name('changePassSubmit');
    Route::post('/search','App\Http\Controllers\BorrowBooksController@searchBook')->name('searchSubmit');

});
Route::group(['prefix'=>'admin', 'middleware' => 'CheckAdmin'],function(){
    Route::get('/manageAdmin','App\Http\Controllers\ManageAccountController@store');
    Route::get('/manageAdmin/listUser','App\Http\Controllers\ManageAccountController@getAll')->name('listUser');
    Route::get('/manageAdmin/listBook','App\Http\Controllers\ManageBooksController@getBook')->name('listBook');
    Route::get('/manageAdmin/categoryBook','App\Http\Controllers\ManageBooksController@getcategoryBook')->name('categoryBook');
    Route::get('/manageAdmin/delete/{id}','App\Http\Controllers\ManageAccountController@getDelete')->name('delete');
    Route::get('/manageAdmin/deleteBook/{id}','App\Http\Controllers\ManageBooksController@getDelete')->name('deleteBook');
    Route::get('/manageAdmin/deletecategory/{id}','App\Http\Controllers\ManageBooksController@getDeleteCategory')->name('deleteCategory');
    Route::get('/manageAdmin/edit/{id}','App\Http\Controllers\ManageAccountController@getEdit')->name('edit');
    Route::get('/manageAdmin/editBook/{id}','App\Http\Controllers\ManageBooksController@getEditBook')->name('editBook');
    Route::get('/manageAdmin/editCategory/{id}','App\Http\Controllers\ManageBooksController@getEditCategory')->name('editCategory');
    Route::post('/manageAdmin/editCategory/{id}','App\Http\Controllers\ManageBooksController@getEditCategoryPost')->name('editCategory');
    Route::post('/manageAdmin/editBook/{id}','App\Http\Controllers\ManageBooksController@getEditBookPost')->name('editBook');
    Route::post('/manageAdmin/edit/{id}','App\Http\Controllers\ManageAccountController@getEditAccount')->name('edit');
    Route::get('/manageAdmin/listBook/addAccount','App\Http\Controllers\ManageAccountController@getAddAccount')->name('addAccount');
    Route::post('/manageAdmin/listBook/addAccount','App\Http\Controllers\ManageAccountController@getAddAccountPost')->name('addAccount');
    Route::get('/manageAdmin/listBook/addBook','App\Http\Controllers\ManageBooksController@getAddBook')->name('addBook');
    Route::post('/manageAdmin/listBook/addBook','App\Http\Controllers\ManageBooksController@getAddBookPost')->name('addBook');
    Route::get('/manageAdmin/categoryBook/addCategory','App\Http\Controllers\ManageBooksController@getAddCategory')->name('addCategory');
    Route::post('/manageAdmin/categoryBook/addCategory','App\Http\Controllers\ManageBooksController@getAddCategoryPost')->name('addCategory');
    Route::get('/manageAdmin/role','App\Http\Controllers\ManageAccountController@getRole')->name('listRole');
    Route::get('/manageAdmin/role/addRole','App\Http\Controllers\ManageAccountController@getaddRole')->name('addRole');
    Route::post('/manageAdmin/role/addRole','App\Http\Controllers\ManageAccountController@getaddRolePost')->name('addRole');
    Route::get('/manageAdmin/role/editRole/{id}','App\Http\Controllers\ManageAccountController@geteditRole')->name('editRole');
    Route::post('/manageAdmin/role/editRole/{id}','App\Http\Controllers\ManageAccountController@geteditRolePost')->name('editRole');
});

