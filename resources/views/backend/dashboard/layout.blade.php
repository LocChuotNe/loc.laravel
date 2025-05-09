<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('backend.dashboard.component.head')
    </head>
    <body>
        <div id="loading">
            <div class="loader simple-loader">
                <div class="loader-body">
                    <img src="{{ asset('backend/images/loader.webp') }}" alt="loader" class="light-loader img-fluid w-25" width="200" height="200" />
                </div>
            </div>
        </div>
        <!-- loader END -->
        @include('backend.dashboard.component.sidebar')
        <main class="main-content">
            <div class="position-relative">
                <!--Nav Start-->
                @include('backend.dashboard.component.nav')
                <!--Nav End-->
            </div>
            <!-- body -->
            @if (!empty($template))
                @include($template)
            @else
                <p>No template found</p>
            @endif
            <!-- Footer Section Start -->
            @include('backend.dashboard.component.footer')
            <!-- Footer Section End -->
        </main>
        @include('backend.dashboard.component.script')

        @if (!empty($config) && is_array($config) && !empty($config['js']))
            @foreach ($config['js'] as $js)
                <script src="{{ asset($js) }}"></script>
            @endforeach
        @endif
    </body>
</html>
