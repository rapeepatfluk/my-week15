@extends('layouts.app')

@section('title', 'เพิ่มสินค้าใหม่')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow rounded-4 overflow-hidden">
                <div class="card-header bg-success text-white p-4 text-center">
                    <h3 class="mb-0 fw-bold">📦 เพิ่มสินค้าใหม่</h3>
                    <small class="text-white-50">กรอกข้อมูลเพื่อบันทึกรายการสินค้าใหม่เข้าสู่ระบบ</small>
                </div>
                <div class="card-body p-4 bg-white">
                    <form action="{{ route('storeProduct') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold text-secondary">ชื่อสินค้า</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted border-end-0">🛒</span>
                                <input type="text" class="form-control bg-light border-start-0 ps-0 @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" placeholder="ระบุชื่อสินค้า เช่น ปลากระป๋อง">
                            </div>
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="price" class="form-label fw-semibold text-secondary">ราคาสินค้า</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted border-end-0">💵</span>
                                <input type="text" class="form-control bg-light border-start-0 ps-0 @error('price') is-invalid @enderror" 
                                       id="price" name="price" value="{{ old('price') }}" placeholder="ระบุราคาสินค้า เช่น 32">
                            </div>
                            @error('price')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="reset" class="btn btn-light border px-4 py-2 text-secondary fw-semibold">
                                🧹 ล้างข้อมูล
                            </button>
                            <button type="submit" class="btn btn-success px-4 py-2 fw-semibold shadow-sm">
                                💾 บันทึกสินค้า
                            </button>
                            <a href="/product" class="btn btn-outline-primary px-4 py-2 fw-semibold">
                                📋 รายการสินค้าทั้งหมด
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
