<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Rapeepat Wongsuwan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
{{-- Navbar --}}
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Rapeepat</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/welcome">Welcome</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about2') }}">abouts</a>
                </li>
                <li class="nav-item">
                    {{-- <a class="nav-link" href="{{ route('blogs') }}">blogs</a>
                </li>
                <li class="nav-item"> --}}
                    <a class="nav-link" href="{{ route('blog2') }}">blogs3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/product">รายการสินค้า</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/form">แจ้งเคลมสินค้าชำรุด</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/form_blog">เขียนบทความ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
{{-- end Navbar --}}

<body>
    <div class="container py-4">
        @yield('content')
    </div>

</body>

</html>
