<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "<h1>Welcome to My Website  </h1> <a href='".route('login')."'>Login</a> <a href='".route('blog')."'>เกี่ยวกับเรา</a>";
});

Route::get('about', function () {
    return "<h1>เกี่ยวกับเรา</h1>";
});

Route::get('blog/{id}', function ($id) {
    return "<h1>บทความทั้งหมด</h1>".$id;
})->name('blog');

Route::get('admin/user/fluke', function () {
    return "<h1>ยินดีต้อนรับแอดมิน</h1>";
})->name('login');

Route::fallback(function () {
    return "<h1 style='text-align:center; padding-top:200px;'>404 ไม่พบหน้าเว็บ</h1>";
});