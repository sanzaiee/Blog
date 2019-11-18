<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/backend/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/backend/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        Blog
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    @include('backend.layouts.cssandscripts.css')

</head>

<body class="">
    <div class="wrapper " id="app">
        {{-- <v-app>
            <v-content> --}}
                <div class="sidebar" data-color="white" data-active-color="danger">
                    <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
                    <div class="logo">
                        <a href="/">
                            <div class="logo-image-large">
                                <img src="" style="    margin-top: -55px; margin-bottom: -56px;">
                                    <h1>BLOG</h1>
                            </div>
                        </a>

        </a>
                    </div>

                    @include('backend.layouts.includes.sidebar')

                    <div class="main-panel">
                        <!-- Navbar -->
                        @include('backend.layouts.includes.topbar')

                        <!-- End Navbar -->
                        <!-- <div class="panel-header panel-header-lg">

  <canvas id="bigDashboardChart"></canvas>

</div> -->
                        <div class="content">
                            @yield('content')

                        </div>
                        @include('backend.layouts.includes.footer')
                    </div>
                </div>
{{--
            </v-content>
        </v-app> --}}
    </div>

    <!--   Core JS Files   -->
    @include('backend.layouts.cssandscripts.script')
</body>

</html>
