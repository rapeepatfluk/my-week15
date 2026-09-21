<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BlogController;
//นักอ่าน
Route::get('/', [BlogController::class, 'index'])->name('index');
Route::get('detail/{id}',[BlogController::class, 'detail'])->name('detail');

// Route::get('/welcome', function () {
//     return view('welcome');
// });


//นักเขียน
Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', function () {
    return view('blog');
});
Route::get('student/{id}', function ($id) {
    return view("Student",['id'=>$id]);
    
})->name('student.profile');




Route::get('/abouts', [AdminController::class,'about2'])->name ("about2");
// Route::get('/blogs' ,[AdminController::class,'blogs'])->name("blogs");



Route::get('/form', [AdminController::class,'create'])->name("create");
Route::post('/insert', [AdminController::class,'insert'])->name("insert");

Route::get('/product', [ProductController::class,'index'])->name("product");
Route::get('/formProduct', [ProductController::class,'createProduct'])->name("createProduct");
Route::post('/formProduct', [ProductController::class, 'store'])->name("storeProduct");
Route::get('/product/change/{id}', [ProductController::class, 'changeStatus'])->name('product.change');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');



// ไฟล์ routes/web.php (ตัวอย่าง Laravel)
use App\Http\Controllers\BookController;

// เส้นทางสำหรับแสดงตารางรายชื่อหนังสือ
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// เส้นทางสำหรับแสดงฟอร์มกรอกข้อมูลหนังสือใหม่
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

// เส้นทางสำหรับรับข้อมูลจากฟอร์มเพื่อบันทึก (POST)
Route::post('/books', [BookController::class, 'store'])->name('books.store');


// เพิ่ม Route นี้ในไฟล์ routes/web.php
Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return "เชื่อมต่อฐานข้อมูลสำเร็จ! Database name: " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return "ไม่สามารถเชื่อมต่อฐานข้อมูลได้: " . $e->getMessage();
    }
});

// เส้นทางสำหรับลบข้อมูลตาม id
Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('delete');

// เส้นทางสำหรับบันทึกข้อมูลบทความ
Route::post('/insertBlog', [AdminController::class,'insertBlog'])->name("insertBlog");

//authors
Route::prefix('authors')->group(function(){
Route::get('/form_blog', [AdminController::class,'createBlog'])->name("createBlog");
Route::get('/blog2', [AdminController::class,'blog2'])->name("blog2");
Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
Route::get('/change/{id}', [AdminController::class, 'change'])->name('change');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
