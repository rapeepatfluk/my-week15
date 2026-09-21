@extends('layouts.app')

@section('title', 'บทความ')

@section('content')
    <h2>บทความทั้งหมด 2</h2>
    <hr>
    @foreach ($blogs as $blog)
        <h3>{{ $blog['title'] }}</h3>
        <p>{{ $blog['content'] }}</p>

        @if ($blog['status'] == true)
            <p class="text-success">สถานะ : เผยแพร่</p>
        @else
            <p class="text-danger">สถานะ : ไม่แผยแพร่</p>
        @endif
        <hr>
    @endforeach

@endsection
