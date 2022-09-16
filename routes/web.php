<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('home/test/', [HomeController::class, 'test']);

Route::prefix('tai-khoan')->name('users.')->group(function(){
    Route::get('/', [UsersController::class, 'index'])->name('index');
    Route::get('/them-moi', [UsersController::class, 'add'])->name('add');
    Route::post('/them-moi', [UsersController::class, 'postAdd'])->name('postAdd');
    Route::get('/cap-nhat/{id}', [UsersController::class, 'edit'])->name('edit');
    Route::post('/cap-nhat/{id?}', [UsersController::class, 'postEdit'])->name('postEdit');
    Route::get('/xoa/{id}', [UsersController::class, 'delete'])->name('delete');
    Route::get('/tim-kiem', [UsersController::class, 'ajaxSearch'])->name('ajaxSearch1');
    Route::post('/tim-kiem', [UsersController::class, 'ajaxSearch'])->name('ajaxSearch');
    Route::get('/test', [UsersController::class, 'test']);
});

Route::get('customers', function(){
    return "Danh sách khách hàng";
});

// Định tuyến có tham số 
Route::get('customers/detail/{id}', function($id){
    return "Xem khách hàng " . $id;
});

// Định tuyến có tham số tùy chọn 
Route::get('customers/{id?}', function($id = 0){
    if ($id == 0) {
        return "Danh sách khách hàng";
    } else {
        return "Chi tiết khách hàng " . $id;
    }
});

// Định tuyến có tham số có ràng buộc biểu thức chính quy 
Route::get('customers/detail/{id}/{groupId}', function($id, $groupId){
    return "Xem khách hàng " . $id;
})->where(['id' => '[0-9]+', 'groupId' => '[A-Za-z0-9-_]+']);
// Những ràng buộc nào cần dùng nhiều lần thì có thể đưa vào phương thức boot của RouteServiceProvider
// Ví dụ ràng buộc với tham số id 
// Route::pattern('id', '[0-9]+');

// Định tuyến gọi tới view 
Route::view('welcome', 'welcome');

// Đinh tuyến gọi tới controller
Route::get('/welcome/test', [HomeController::class, 'test']);
