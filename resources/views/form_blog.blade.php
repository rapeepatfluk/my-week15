@extends('layouts.app')

@section('title', 'เขียนบทความ')

@section('content')

 <h2>เขียนบทความ</h2>
    <hr>
    <form method="POST" action="/insertBlog">
        @csrf
        <div class="form-group mb-3">
            <label for="title">ชื่อบทความ</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        @error('title')
            <div class="my-2">
                <p class="text-danger">{{ $message }}</p>
            </div>
        @enderror

        <div class="form-group mb-3">
            <label for="content">เนื้อหาบทความ</label>
            <textarea class="form-control"  id="content" cols="30" rows="6" name="content"></textarea>
        </div>
        @error('content')
            <div class="my-2">
                <p class="text-danger">{{ $message }}</p>
            </div>
        @enderror

        <div class="form-group mb-3">
            <label for="status">สถานะ</label>
            <select name="status" id="status" class="form-select">
                <option value="1">เผยแพร่</option>
                <option value="0">ซ่อน</option>
            </select>
        </div>
        @error('status')
            <div class="my-2">
                <p class="text-danger">{{ $message }}</p>
            </div>
        @enderror

        <input type="submit" value="บันทึก" class="btn btn-success my-3">
        <a href="/authors/blog2" class="btn btn-primary my-3">กลับหน้าหลัก</a>
    </form>
@endsection 