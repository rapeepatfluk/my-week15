@extends('layouts.app')

@section('title', 'แก้ไขข้อมูลสินค้า')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow rounded-4 overflow-hidden">
                <div class="card-header bg-warning text-dark p-4 text-center">
                    <h3 class="mb-0 fw-bold">✏️ แก้ไขข้อมูลสินค้า</h3>
                    <small class="text-muted">แก้ไขรายละเอียดข้อมูลสินค้าในระบบ</small>
                </div>
                <div class="card-body p-4 bg-white">
                    <form action="{{ route('product.update', $product->id) }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold text-secondary">ชื่อสินค้า</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted border-end-0">🛒</span>
                                <input type="text" class="form-control bg-light border-start-0 ps-0 @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="ระบุชื่อสินค้า เช่น ปลากระป๋อง">
                            </div>
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label fw-semibold text-secondary">ราคาสินค้า</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted border-end-0">💵</span>
                                <input type="text" class="form-control bg-light border-start-0 ps-0 @error('price') is-invalid @enderror" 
                                       id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="ระบุราคาสินค้า เช่น 32">
                            </div>
                            @error('price')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="detail" class="form-label fw-semibold text-secondary">รายละเอียดสินค้า</label>
                            <textarea class="form-control bg-light @error('detail') is-invalid @enderror" 
                                      id="detail" name="detail" rows="4" placeholder="ระบุรายละเอียดสินค้า...">{{ old('detail', $product->detail) }}</textarea>
                            @error('detail')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label fw-semibold text-secondary">สถานะคลังสินค้า</label>
                            <select class="form-select bg-light" id="status" name="status">
                                <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>พร้อมวางขาย</option>
                                <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>ระงับการขาย</option>
                            </select>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="/product" class="btn btn-light border px-4 py-2 text-secondary fw-semibold">
                                ❌ ยกเลิก
                            </a>
                            <button type="submit" class="btn btn-warning px-4 py-2 fw-semibold shadow-sm">
                                💾 บันทึกการแก้ไข
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
