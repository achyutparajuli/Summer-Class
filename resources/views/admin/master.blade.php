<!DOCTYPE html>
<html lang="en">

@include('admin.header.header')

<body>
    @include('admin.header.sidebar')


    <!-- Main Content -->
    <div class="main-content">

        @include('admin.header.nav')

        @yield('content')

    </div>

    @include('admin.footer.footer')

</body>

</html>