<!doctype html>
<html lang="en" data-bs-theme="light">

<!-- Mirrored from templates.g5plus.net/glowing-bootstrap-5/dashboard/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jul 2024 14:52:16 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - Glowing - Bootstrap 5 HTML Templates</title>
    <link rel="icon" href="{{ asset('client/assets/images/others/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/vendors/lightgallery/css/lightgallery-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/vendors/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/vendors/mapbox-gl/mapbox-gl.min.css') }}">
    <link rel="stylesheet" href="../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.9.1/font/bootstrap-icons.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('client/assets/css/theme.css') }}">
    <link rel="stylesheet" href="../../../cdn.jsdelivr.net/npm/select2%404.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="../../../cdn.jsdelivr.net/npm/select2-bootstrap-5-theme%401.3.0/dist/select2-bootstrap-5-theme.min.css" />
        <style>
            .alert-success {
                width: 25%; /* Đặt độ rộng của thông báo thành công là 25% */
                position: fixed;
                top: 20px; /* Căn cách đỉnh trang 20px */
                right: 0; /* Căn sát bên phải */
                text-align: center;
                z-index: 9999; /* Đảm bảo thông báo ở trên các thành phần khác */
                transition: opacity 0.5s ease; /* Hiệu ứng mờ dần khi ẩn */
            }
            .alert-danger {
                width: 25%; /* Đặt độ rộng của thông báo lỗi là 25% */
                position: fixed;
                top: 80px; /* Căn cách đỉnh trang 80px để không chồng lên nhau */
                right: 0; /* Căn sát bên phải */
                text-align: center;
                z-index: 9998; /* Đảm bảo thông báo lỗi ở dưới thông báo thành công */
                transition: opacity 0.5s ease; /* Hiệu ứng mờ dần khi ẩn */
            }
            .progress {
                height: 5px;
                position: absolute;
                bottom: -5px; /* Đặt thanh tiến trình ở dưới cùng của thông báo */
                left: 0;
                right: 0;
                background-color: #f1f1f1; /* Màu nền của thanh tiến trình */
            }
            .progress-bar {
                background-color: #28a745; /* Màu xanh cho thanh tiến trình thành công */
            }
            .progress-bar-danger {
                background-color: #dc3545; /* Màu đỏ cho thanh tiến trình lỗi */
            }
        </style>
</head>

<body>
    <div class="container-xxl">
        @if (session('messageSucess'))
        <div id="successAlert" class="alert alert-success" role="alert">
            {{ session('messageSucess') }}
            <div class="progress">
                <div id="progressBarSuccess" class="progress-bar" role="progressbar" style="width: 100%;"></div>
            </div>
        </div>
        @endif

        @if (session('messageError'))
        <div id="errorAlert" class="alert alert-danger" role="alert">
            {{ session('messageError') }}
            <div class="progress">
                <div id="progressBarError" class="progress-bar progress-bar-danger" role="progressbar" style="width: 100%;"></div>
            </div>
        </div>
        @endif

     





    </div>
    <div class="wrapper dashboard-wrapper">
        <div class="d-flex flex-wrap flex-xl-nowrap">
            <div class="db-sidebar bg-body">
                @include('layouts.admin.aside')
            </div>
            <div class="page-content">
                @include('layouts.admin.header')
                @yield('content')
            </div>
        </div>
    </div>
    <script src="../../../cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../../cdn.jsdelivr.net/npm/select2%404.0.13/dist/js/select2.full.min.js"></script>
    <script src="{{ asset('') }}/vendors/chartjs/chart.min.js')}}"></script>
    <script src="{{ asset('client/assets/vendors/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('client/assets/vendors/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendors/vanilla-lazyload/lazyload.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendors/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendors/lightgallery/lightgallery.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendors/lightgallery/plugins/zoom/lg-zoom.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendors/lightgallery/plugins/thumbnail/lg-thumbnail.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendors/lightgallery/plugins/video/lg-video.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendors/lightgallery/plugins/vimeoThumbnail/lg-vimeo-thumbnail.min.js') }}">
    </script>
    <script src="{{ asset('client/assets/vendors/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendors/slick/slick.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendors/gsap/gsap.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendors/gsap/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendors/gsap/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendors/mapbox-gl/mapbox-gl.js') }}"></script>
    <script src="{{ asset('client/assets/js/dashboard.min.js') }}"></script>
    <script>
        // Tự động ẩn thông báo và thanh tiến trình sau 2 giây cho thông báo thành công
        const successAlert = document.getElementById('successAlert');
        const progressBarSuccess = document.getElementById('progressBarSuccess');

        if (successAlert) {
            let width = 100; // Độ rộng ban đầu của thanh tiến trình
            const duration = 2000; // Thời gian tồn tại của thông báo (2000ms = 2 giây)
            const interval = 150; // Thời gian cập nhật thanh tiến trình (150ms)

            // Cập nhật thanh tiến trình cho thông báo thành công
            const timerSuccess = setInterval(() => {
                width -= (interval / duration) * 100; // Tính toán độ rộng thanh
                progressBarSuccess.style.width = width + '%';

                // Khi thanh tiến trình hết, ẩn thông báo
                if (width <= 0) {
                    clearInterval(timerSuccess);
                    successAlert.style.opacity = '0'; // Mờ dần thông báo
                    setTimeout(() => {
                        successAlert.style.display = 'none';
                    }, 500); // Thời gian mờ dần
                }
            }, interval);
        }

        // Tự động ẩn thông báo và thanh tiến trình sau 2 giây cho thông báo lỗi
        const errorAlert = document.getElementById('errorAlert');
        const progressBarError = document.getElementById('progressBarError');

        if (errorAlert) {
            let width = 100; // Độ rộng ban đầu của thanh tiến trình
            const duration = 2000; // Thời gian tồn tại của thông báo (2000ms = 2 giây)
            const interval = 150; // Thời gian cập nhật thanh tiến trình (150ms)

            // Cập nhật thanh tiến trình cho thông báo lỗi
            const timerError = setInterval(() => {
                width -= (interval / duration) * 100; // Tính toán độ rộng thanh
                progressBarError.style.width = width + '%';

                // Khi thanh tiến trình hết, ẩn thông báo
                if (width <= 0) {
                    clearInterval(timerError);
                    errorAlert.style.opacity = '0'; // Mờ dần thông báo
                    setTimeout(() => {
                        errorAlert.style.display = 'none';
                    }, 500); // Thời gian mờ dần
                }
            }, interval);
        }
    </script>
    @include('layouts.admin.svg')
    <div class="position-fixed z-index-10 bottom-0 end-0 p-10">
        <a href="#"
            class="gtf-back-to-top text-decoration-none bg-body text-primary bg-primary-hover text-light-hover shadow square p-0 rounded-circle d-flex align-items-center justify-content-center"
            title="Back To Top" style="--square-size: 48px"><i class="fa-solid fa-arrow-up"></i></a>
    </div>
</body>

<!-- Mirrored from templates.g5plus.net/glowing-bootstrap-5/dashboard/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jul 2024 14:52:26 GMT -->

</html>
