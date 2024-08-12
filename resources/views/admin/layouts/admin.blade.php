<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
        .tagify {
            min-height: 50px;
            height: auto !important;
        }
    </style>

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    {{-- <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet"> --}}
    <!-- Custom styles for this page -->
    {{-- <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css" />

    {{-- <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}"> --}}

    <link href="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/fontawesome-free/css/all.min.css"
        rel="stylesheet">
    <link href="https://startbootstrap.github.io/startbootstrap-sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" />


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        {{-- sidebar --}}
        @include('admin.includes.sidebar')
        {{-- sidebar end --}}

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                <!-- Topbar Navbar -->
                @include('admin.includes.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin.includes.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/jquery/jquery.min.js"></script>
    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    {{-- <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}

    <!-- Core plugin JavaScript-->
    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing.min.js">
    </script>
    {{-- <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script> --}}

    <!-- Custom scripts for all pages-->
    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/js/sb-admin-2.min.js"></script>
    {{-- <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script> --}}



    <!-- Page level plugins -->
    {{-- <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    {{-- <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script> --}}



    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    @stack('script')
    @include('components.message')

</body>

</html>
