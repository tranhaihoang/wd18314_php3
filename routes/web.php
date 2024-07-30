<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
////    return view('welcome');
//
//    // lấy tất cả dữ liệu có trong bảng
////    $data = DB::table('categories')
////        ->get();
//
//    // lấy dữ liệu theo cột mong muốn
////    $data = DB::table('categories')
////        ->select('id','name')
////        ->get();
//
//    // lấy dữ liệu theo điều kiện where
////    $data=DB::table('categories')
////        ->select('id','name')
////        ->where('id',7)
////        ->get();
//
//    // like: so sánh tương đối
////    $data=DB::table('categories')
////        ->select('id','name')
////        ->where('name','like','%S%')
////        ->get();
//
//    //and: "và": thỏa mãn tất cả các điều kiện
////    $data=DB::table('categories')
////        ->select('id','name')
////        ->where('id',9)
////        ->where('name','like','%S%')
////        ->get();
//
//    //or:"hoặc": thỏa mãn 1 trong các điều kiện
////    $data=DB::table('categories')
////        ->select('id','name')
////        ->orWhere('id',9)
////        ->orWhere('name','like','%S%')
////        ->get();
//
//    //not: phủ định
//    $data=DB::table('categories')
//        ->select('id','name')
//        ->whereNot('name','like','%S%')
//        ->get();
//    return $data;
//});


//Route::get('/',function (){
//   // truy vấn để lấy tất cả
////    $data = Post::all();
////    $data = Post::get();
////    dd($data);
//    // where
////    $data = Post::where('id',2)->get();
////    dd($data);
//
//    // thêm dữ liệu
//    // cách 1:
////    $post = new Post();
////    $post->title = "bài viết số 3";
////    $post->content = "nội dung bài viết số 3";
////    $post->save();
//
//    // cách 2:
////    $post = Post::query()->create([
////       'title'=>"Bài viết số 4",
////       'content'=>"Nội dung bài viết số 4",
////       'name'=>"kientc",
////    ]);
////    dd($post);
//
//    //sửa
//    //cách 1:
//    $post = Post::query()->find(4);
//    $post->title = "ABC";
//    $post->save();
//
//    // cách 2:
//    $post = Post::query()->where('id',5)->update([
//        'title'=>"Bài viết số n",
//        'content'=>"nội dung bài viết số n"
//    ]);
//    dd($post);
//
//    // xóa
//    $post = Post::query()->where('id',3)->delete();
//    dd($post);
//
//});

//Route::get('/products',[\App\Http\Controllers\ProductController::class,'index'])
//    ->name('product.index');
Route::get('/', function () {
    $products = \App\Models\Product::query()->latest('id')->limit(4)->get();

    return view('welcome', compact('products'));
})->name('welcome');

Route::controller(\App\Http\Controllers\ProductController::class)
    ->name('products.')
    ->prefix('products/')
    ->group(function (){
        Route::get('/','index')->name('index'); //hiển thị danh sách
        Route::get('create','create')->name('create'); //hiển thị form thêm
        Route::post('store','store')->name('store'); //thực hiện chức năng thêm
        Route::get('edit/{id}','edit')->name('edit') // hiển thị form sửa
            ->where('id','[0-9]+');// id chỉ cho phép là số
        Route::put('update/{id}','update')->name('update') //thực hiện chức năng sửa
            ->where('id','[0-9]+');
        Route::delete('destroy/{id}','destroy')->name('destroy') // thực hiện xóa
            ->where('id','[0-9]+');
    });

Route::controller(\App\Http\Controllers\CategoriesController::class)
    ->name('categories.')
    ->prefix('categories/')
    ->group(function (){
        Route::get('/','index')->name('index'); //hiển thị danh sách
        Route::get('create','create')->name('create'); //hiển thị form thêm
        Route::post('store','store')->name('store'); //thực hiện chức năng thêm
        Route::get('edit/{id}','edit')->name('edit') // hiển thị form sửa
            ->where('id','[0-9]+');// id chỉ cho phép là số
        Route::put('update/{id}','update')->name('update') //thực hiện chức năng sửa
            ->where('id','[0-9]+');
        Route::delete('destroy/{id}','destroy')->name('destroy') // thực hiện xóa
            ->where('id','[0-9]+');
    });


