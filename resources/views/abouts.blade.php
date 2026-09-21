@extends('layouts.app')

@section('title', 'เกี่ยวกับเรา')

@section('content')

    <h2>เกี่ยวกับเรา S</h2>
    <hr>
    <p>ผู้พัฒนาระบบ : {{ $name }}</p>
    <p>วันที่ก่อตั้ง : {{ $date }}</p>
    <hr>
    <p>Lorem ipsum, dolor sit amdddet consectetur adipisicing elit. Voluptatem eveniet, quis odit architecto illum dicta
        earum totam aliquam id, corrupti consectetur delectus corporis sapiente minus. Amet optio inventore ipsa ut!</p>

@endsection
