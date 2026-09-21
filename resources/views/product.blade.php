@extends('layouts.app')

@section('title', 'รายการสินค้า')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                <div class="card-header bg-dark text-white p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-0 fs-4 fw-bold">🛒 รายการสินค้าทั้งหมด</h2>
                        <small class="text-white-50">แสดงรายการสินค้าและราคาล่าสุดในระบบ</small>
                    </div>
                    <a href="/formProduct" class="btn btn-warning fw-semibold px-4 shadow-sm">
                        ✨ เพิ่มสินค้าใหม่
                    </a>
                </div>
                <div class="card-body p-4 bg-white">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-striped mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="py-3 ps-4 text-center" style="width: 8%">ลำดับ</th>
                                    <th scope="col" class="py-3">ชื่อสินค้า</th>
                                    <th scope="col" class="py-3">รายละเอียด</th>
                                    <th scope="col" class="py-3 text-center" style="width: 15%">ราคา</th>
                                    <th scope="col" class="py-3 text-center" style="width: 18%">สถานะคลังสินค้า</th>
                                    <th scope="col" class="py-3 text-center" style="width: 15%">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                    <tr>
                                        <th scope="row" class="text-center py-3 ps-4 text-muted fw-normal">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="py-3 fw-medium text-dark">{{ $item->name }}</td>
                                        <td class="py-3 text-muted" style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            {{ $item->detail }}
                                        </td>
                                        <td class="py-3 text-center fw-semibold text-primary">
                                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill">
                                                {{ number_format($item->price, 2) }} บาท
                                            </span>
                                        </td>
                                        <td class="py-3 text-center">
                                            @if ($item->status)
                                                <a href="{{ route('product.change', $item->id) }}" class="btn btn-sm btn-success px-3 rounded-pill">พร้อมวางขาย</a>
                                            @else
                                                <a href="{{ route('product.change', $item->id) }}" class="btn btn-sm btn-secondary px-3 rounded-pill">ระงับการขาย</a>
                                            @endif
                                        </td>
                                        <td class="py-3 text-center">
                                            <a href="{{ route('product.edit', $item->id) }}" class="btn btn-sm btn-outline-warning px-3 rounded-pill">
                                                ✏️ แก้ไขสินค้า
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
