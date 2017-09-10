<!DOCTYPE html>
<html>
<head>
    @include('admin.partials.head')
</head>
<body>
<section id="container">
    @include ('admin.partials.header')

    @include ('admin.partials.sidebar')

    <div id="main-content">
        <section class="wrapper">
            @yield('content')
        </section>
    </div>
</section>

@include('admin.partials.footer')
@yield('footer_script')
</body>
</html>
