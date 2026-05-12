<!doctype html>
<html lang="en">

<head>
    @include('layouts.partials.head')
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        {{-- Topbar --}}
        @include('layouts.partials.topbar')

        {{-- Sidenav --}}
        @include('layouts.partials.sidenav')

        <!-- ============================================================== -->
        <!-- Start Main Content -->
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="container-fluid">

                {{-- Page Title / Breadcrumb --}}
                @hasSection('page-title')
                    @yield('page-title')
                @endif

                {{-- Main Content --}}
                @yield('content')

            </div>
            <!-- end container -->

            {{-- Footer --}}
            @include('layouts.partials.footer')
        </div>
        <!-- End of Main Content -->

    </div>
    <!-- END wrapper -->

    {{-- Theme Settings Offcanvas --}}
    @include('layouts.partials.theme-settings')

    {{-- Scripts --}}
    @include('layouts.partials.scripts')

    {{-- Page-specific scripts --}}
    @stack('scripts')

</body>

</html>
