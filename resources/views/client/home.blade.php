<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Clinz Laundry</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="client/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="client/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="client/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="client/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="client/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        @include('client.spinner')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('client.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('client.navbar')
            <!-- Navbar End -->

            {{-- Content Dashboard --}}
            <div class="main-content">
                <h1 class="m-4 font-bold fs-3">Clean in one blink✨</h1>
                <p class="mx-4">We will use all our strength to shorten the time it takes to, <br>
                    for the laundry to take place</p>
                <div class="ml-2 mt-4 row">
                    <div class="col-sm-12 col-lg-4">
                        {{-- card status --}}
                        <div class="card w-full bg-warning text-light mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                                <i class="fas fa-bell fs-1"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-white fs-3">Status</h5>
                                <p class="card-text">Cek Status Pesananmu</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-4">
                        {{-- card order --}}
                        <div class="card w-full bg-success text-light mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                                <i class="fas fa-plus fs-1"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-white fs-3">Orders</h5>
                                <p class="card-text">Lakukan Pesanan!</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-4">
                        {{-- card history --}}
                        <div class="card w-full bg-primary text-light mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                                <i class="fas fa-history fs-1"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-white fs-3">History</h5>
                                <p class="card-text">Cek pesanan yang sudah selesai</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Sale & Revenue Start -->
            {{-- @include('client.sales-revenue'); --}}
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            {{-- @include('client.sales-chart'); --}}
            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            {{-- @include('client.sales-start'); --}}
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
            {{-- @include('client.widget'); --}}
            <!-- Widgets End -->


            <!-- Footer Start -->
            @include('client.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->




        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="client/lib/chart/chart.min.js"></script>
    <script src="client/lib/easing/easing.min.js"></script>
    <script src="client/lib/waypoints/waypoints.min.js"></script>
    <script src="client/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="client/lib/tempusdominus/js/moment.min.js"></script>
    <script src="client/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="client/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="client/js/main.js"></script>
</body>

</html>
