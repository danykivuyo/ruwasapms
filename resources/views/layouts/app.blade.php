<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('img/logo.png') }}" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <title>ruwasa pms</title>

    <!-- Fonts -->
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Styles -->
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    @vite(['resources/js/app.js'])
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <style>
        :root {
            --border-width: 7px;
        }

        * {
            margin: 0;
            padding: 0;
        }

        .sec-loading {
            height: 100vh;
            width: 100vw;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sec-loading .one {
            height: 80px;
            width: 80px;
            border: var(--border-width) solid #4f61f2;
            transform: rotate(45deg);
            border-radius: 0 50% 50% 50%;
            position: relative;
            animation: move 0.5s linear infinite alternate-reverse;
        }

        .sec-loading .one::before {
            content: "";
            position: absolute;
            height: 55%;
            width: 55%;
            border-radius: 50%;
            border: var(--border-width) solid transparent;
            border-top-color: #4f61f2;
            border-bottom-color: #4f61f2;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: rotate 1s linear infinite;
        }

        @keyframes rotate {
            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @keyframes move {
            to {
                transform: translateY(15px) rotate(45deg);
            }
        }

        @media (max-width: 600px) {
            .table-container {
                overflow-x: scroll;
            }
        }
    </style>
    @livewireStyles
</head>

<body class="antialiased">
    <link href="{{ asset('img/logo.png') }}" rel="icon">

    @include('layouts.partials.navbar')
    @include('layouts.partials.sidebar')
    <main id="main" class="main">
        <livewire:alert />
        <div wire:loading class="sec-loading">
            <div class="one">
            </div>
        </div>
        @yield('content')
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>RUWASA</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="#">MUST</a>
        </div>
    </footer><!-- End Footer -->

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    {{-- <script>
      
      function showPreloader() {
        document.getElementById('preloader').style.display = 'block';
      }
      function hidePreloader() {
        document.getElementById('preloader').style.display = 'none';
      }

      // document.addEventListener('wire:before-navigate',  () => {
      //     showPreloader();
      // });

      document.addEventListener('wire:before-navigate', (event) => {
        console.log("navigating");
      });

      document.addEventListener("livewire:navigated", () => {
        hidePreloader();
      });
  </script> --}}
    @livewireScripts
</body>

</html>
