@extends('layouts.app')

@section('title', 'หน้าแสดงบทความทั้งหมด')

@section('content')
    @if(count($blog2) > 0)
        <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="mb-4 text-primary border-bottom pb-2">บทความทั้งหมดในระบบ</h2>
            
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered border-warning text-center">
                <thead>
                    <tr class="table-warning text-center">
                        <th scope="col">ชื่อบทความ</th>
                        <th scope="col">เนื้อหาบทความ</th>
                        <th scope="col" class="col-md-2">สถานะ</th>
                        <th scope="col" >จัดการ</th>
                        <th scope="col">แก้ไข</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($blog2 as $blog)
                        <tr>                            
                            <td class="text-start">{{ $blog->title}}</td>
                            <td class="text-start">{{Str::limit($blog->content, 50)}}</td>
                            <td class="text-start">
                                @if ($blog->status)
                                    <a href="{{ route('change', $blog->id) }}" class="btn btn-success">เผยแพร่</a>
                                @else
                                    <a href="{{ route('change', $blog->id) }}" class="btn btn-danger">ซ่อน</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('delete', $blog->id)}}" class="btn btn-danger" onclick="confirm('คุณต้องการลบบทความ {{ $blog->title }} นี้หรือไม่?')">ลบ</a>
                            </td>
                            <td>
                                <a href="{{route('edit', $blog->id)}}" class="btn btn-warning">แก้ไข</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $blog2->links() }}
    
    @else
        <h2  class="text-center">ไม่มีบทความในระบบ</h2>
    
    @endif

        @endsection
