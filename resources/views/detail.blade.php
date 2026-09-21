@extends('layouts.app')

@section('title'){{ $blog->title }}@endsection

@section('content')
    <h2>{{$blog->title}}</h2>
    <hr>
    <div>{!!$blog->content!!}</div>

    
    <a href="{{route('index')}}" >กลับหน้าแรก</a>
@endsection