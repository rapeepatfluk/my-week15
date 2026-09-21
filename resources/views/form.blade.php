@extends('layouts.app')

@section('title', 'แจ้งเคลมสินค้าชำรุด')

@section('content')

    <h2>แจ้งเคลมสินค้าชำรุด</h2>
    <hr>
    <form method="POST" action="/insert">
        @csrf
        <div class="form-group mb-3">
            <label for="idproduct">รหัสสินค้า</label>
            <input type="text" class="form-control" id="idproduct" name="idproduct">
        </div>
        @error('idproduct')
            <div class="my-2">
                <p class="text-danger">{{ $message }}</p>
            </div>
        @enderror

        <div class="form-group mb-3">
            <label for="email">อีเมลผู้ติดต่อ</label>
            <input  class="form-control" cols = "30" rows="6" id="email" name="email"></input>
        </div>
        @error('email')
            <div class="my-2">
                <p class="text-danger">{{ $message }}</p>
            </div>
        @enderror

        <div class="form-group mb-3">
            <label for="content">อาการชำรุด</label>
            <textarea class="form-control" cols = "30" rows="6" id="content" name="content"></textarea>
        </div>
        @error('content')
            <div class="my-2">
                <p class="text-danger">{{ $message }}</p>
            </div>
        @enderror

        <div class="form-group mb-3">
            <label for="priority">ระดับความเร่งด่วน</label>
            <select name="priority" id="priority" class="form-select" cols = "30" rows="6">
                <option value="">เลือก</option>
                <option value="1">ไม่ด่วน</option>
                <option value="2">ปกติ</option>
                <option value="3">ด่วนปานกลาง</option>
                <option value="4">ด่วน</option>
                <option value="5">ด่วนที่สุด</option>
            </select>
        </div>
        @error('priority')
            <div class="my-2">
                <p class="text-danger">{{ $message }}</p>
            </div>
        @enderror

        <input type="submit" value="บันทึก" class="btn btn-success my-3">
        <a href="/welcome" class="btn btn-primary my-3">ไปหน้าแรก</a>
    </form>

@endsection
