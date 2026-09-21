@extends('layouts.app')

@section('title', 'หน้าแรก')

@section('content')
    <h2>บทความล่าสุด</h2>
    <hr>

@foreach ($blog as $blog)
    <h2>{{$blog->title}}</h2>
    <div>{{ Str::limit(strip_tags($blog->content), 100) }}</div>
    <a href="/detail/{{$blog->id}}">อ่านเพิ่มเติม</a>
    <br>
    <hr>
@endforeach
@endsection

