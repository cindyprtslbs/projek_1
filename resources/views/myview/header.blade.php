<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Projek 1</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('dist/assets/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
    {{-- <link rel="stylesheet" href="{{asset('dist/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('dist/assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dist/assets/js/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('dist/assets/css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('dist/assets/images/favicon.png')}}" />



  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
      </div>
      @include('myview.navbar')
      @include('myview.sidebar')
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="row">
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  </div>
                  <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                      <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                        <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="mdi mdi-calendar"></i> <span id="currentDate">Today (17 August 2024)</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                            <a class="dropdown-item" href="#">January - March</a>
                            <a class="dropdown-item" href="#">March - June</a>
                            <a class="dropdown-item" href="#">June - August</a>
                            <a class="dropdown-item" href="#">August - November</a>
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            @yield('content')
          </div>
          <!-- content-wrapper ends -->
          @include('myview.footer')

        </div>

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>


    <!-- Link JS DataTables dan DataTables Buttons -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script> --}}
    <!-- container-scroller -->
    <!-- plugins:js -->
    {{-- <script src="{{asset('dist/assets/vendors/js/vendor.bundle.base.js')}}"></script> --}}
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('dist/assets/vendors/chart.js/chart.umd.js')}}"></script>
    {{-- <script src="{{asset('dist/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>  --}}
    <!-- <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
    {{-- <script src="{{asset('dist/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>  --}}
    {{-- <script src="{{asset('dist/assets/js/dataTables.select.min.js')}}"></script>  --}}
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    {{-- <script src="{{asset('dist/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('dist/assets/js/template.js')}}"></script>
    <script src="{{asset('dist/assets/js/settings.js')}}"></script>
    <script src="{{asset('dist/assets/js/todolist.js')}}"></script> --}}
    <!-- endinject -->
    <!-- Custom js for this page-->
    {{-- <script src="{{asset('dist/assets/js/jquery.cookie.js')}}" type="text/javascript"></script> --}}
    {{-- <script src="{{asset('dist/assets/js/dashboard.js')}}"></script> --}}
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->

    <script>
    $(document).ready(function () {
        // Inisialisasi DataTable
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
    </script>

    <script>
    // Function to format the date
    function formatDate(date) {
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        return date.toLocaleDateString('en-US', options);
    }

    // Get the current date
    const today = new Date();
    const formattedDate = formatDate(today);

    // Update the button with the current date
    document.getElementById('currentDate').textContent = `Today (${formattedDate})`;
    </script>
  </body>
</html>
