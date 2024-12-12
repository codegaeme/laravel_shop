<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop Ecommerce HTML CSS Template</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/font-awesome.css')}}">

    <link rel="stylesheet" href="{{asset('admin/assets/css/templatemo-hexashop.css')}}">

    <link rel="stylesheet" href="{{asset('admin/assets/css/owl-carousel.css')}}">

    <link rel="stylesheet" href="{{asset('admin/assets/css/lightbox.css')}}">
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
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
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

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
   @include('layouts.client.header')
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
   @yield('top')
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Men Area Starts ***** -->
 @yield('men')
    <!-- ***** Men Area Ends ***** -->

    <!-- ***** Women Area Starts ***** -->
   @yield('woman')
    <!-- ***** Women Area Ends ***** -->

    <!-- ***** Kids Area Starts ***** -->
   @yield('kid')
    <!-- ***** Kids Area Ends ***** -->

    <!-- ***** Explore Area Starts ***** -->
    @yield('explor')
    <!-- ***** Explore Area Ends ***** -->

    <!-- ***** Social Area Starts ***** -->
   @yield('content')
    <!-- ***** Subscribe Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
   @include('layouts.client.footer')


    <!-- jQuery -->
    <script src="{{asset('admin/assets/js/jquery-2.1.0.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('admin/assets/js/popper.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>

    <!-- Plugins -->
    <script src="{{asset('admin/assets/js/owl-carousel.js')}}"></script>
    <script src="{{asset('admin/assets/js/accordions.js')}}"></script>
    <script src="{{asset('admin/assets/js/datepicker.js')}}"></script>
    <script src="{{asset('admin/assets/js/scrollreveal.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/imgfix.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/slick.js')}}"></script>
    <script src="{{asset('admin/assets/js/lightbox.js')}}"></script>
    <script src="{{asset('admin/assets/js/isotope.js')}}"></script>

    <!-- Global Init -->
    <script src="{{asset('admin/assets/js/custom.js')}}"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);

            });
        });

    </script>
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

  </body>
</html>
