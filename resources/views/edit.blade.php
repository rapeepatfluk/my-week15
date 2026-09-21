@extends('layouts.app')

@section('title', 'ฟอร์มแก้ไขบทความ')
@section('content')
<h2>ฟอร์มแก้ไขบทความ</h2>
<form action="{{ route('update', $blog->id) }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $blog->id }}">
    <div class="form-group">
        <label for="title">ชื่อบทความ</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $blog->title) }}">
        @error('title')
            <div class="text-danger my-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="content">เนื้อหาบทความ</label>
        <textarea class="form-control" id="content" name="content" rows="3">{{ old('content', $blog->content) }}</textarea>
        @error('content')
            <div class="text-danger my-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="status">สถานะ</label>
        <select class="form-control" id="status" name="status">
            <option value="1" {{ $blog->status == 1 ? 'selected' : '' }}>เผยแพร่</option>
            <option value="0" {{ $blog->status == 0 ? 'selected' : '' }}>ซ่อน</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
</form>
@endsection
