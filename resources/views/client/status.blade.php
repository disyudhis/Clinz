<!DOCTYPE html>
<html lang="en">

<head>
    @include('client.style')
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        @include('client.spinner')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <a href="home.html"><img src="home/assets/img/logo/mesin.png" alt=""></a>
                    {{-- <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Clinz Laundry</h3> --}}
                </a>

                    {{-- <h2 class="mb-4">Tabel Daftar Pengguna</h2> --}}
        <div class="d-flex align-items-center ms-4 mb-4">
                </div>
                <div class="navbar-nav w-100 mt-14">
                    <a href="{{ url('/view_dashboard') }}" class="nav-item nav-link"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{ url('/view_order') }}" class="nav-item nav-link"><i
                            class="fa fa-solid fa-plus me-2"></i>Orders</a>
                    <a href="{{ url('/view_status') }}" class="nav-item nav-link active"><i
                            class="fas fa-bell me-2"></i>Status</a>
                    <a href="{{ url('/view_history') }}" class="nav-item nav-link"><i
                            class="fas fa-history me-2"></i>History</a>
                    <a href="#" class="nav-item nav-link"><i class="fas fa-wrench me-2"></i>Settings</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('client.navbar')
            <!-- Navbar End -->

            {{-- Content Dashboard --}}
            <div class="main-content">
                <div class="container">
                    <table class="table table-bordered myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Alamat</th>
                                <th>Total Bayar</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody class="text-center">
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>


    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.myTable').DataTable({
                processing: true,
                serverSide: false,
                fixedHeader: true,
                deferRender: true,
                type: 'GET',
                destroy: true,
                paging: true,
                ajax: "{{ route('status.list') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'totalBayar',
                        name: 'totalBayar'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },

                    {
                        data: 'action',
                        name: 'action',

                        orderable: false,
                        searchable: false
                    }
                ]

            })
        })
    </script>
    </div>

    <!-- Footer Start -->
    @include('client.footer')
    <!-- Footer End -->
    </div>
    <!-- Content End -->




    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    @include('client.script')
</body>

</html>
