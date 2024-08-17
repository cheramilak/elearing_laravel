<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mini bank</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/base/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <!-- End plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/boxicons.css') }}" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendors/css/core.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendors/css/theme-default.css') }}" />
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">

  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>
<body>
    <div class="bs-toast toast toast-placement-ex m-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
        <div class="toast-header">
          <i class='bx bx-bell me-2'></i>
          <div class="me-auto fw-medium">Message</div>
          <small>now</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          message.
        </div>
    </div>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo" href="/"><img src=" {{asset('assets/images/logo.png')}}" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="/"><img src="{{asset('assets/images/logo.png')}}" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name">{{ Auth()->user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                    @csrf
                    <button type="submit" class="dropdown-item">
                      <i class='bx bx-power-off me-2'></i>
                      <span class="align-middle">Log Out</span>
                    </button>
                </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @if (Auth()->user()->type == 1)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users') }}">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Users</span>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="mdi mdi-account-circle  menu-icon"></i>
              <span class="menu-title">Customers</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="mdi mdi-bank menu-icon"></i>
              <span class="menu-title">Banks</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="mdi mdi-currency-usd menu-icon"></i>
              <span class="menu-title">Exchnage</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            @yield('content')
        </div>
      </div>

    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('assets/vendors/base/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('assets/js/template.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/js/dataTables.bootstrap4.js') }}"></script>
  <!-- End custom js for this page-->

  <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>

  @yield('page-script')

  @if(session('success'))
    <script>
           const toastPlacementExample = document.querySelector('.toast-placement-ex');
            toastPlacementExample.querySelector('.toast-body').innerText = {!! json_encode(session('success')) !!};

            let selectedType = 'bg-success';
            selectedPlacement = 'top-0 end-0'.split(' ');
            toastPlacementExample.classList.add(selectedType);
            DOMTokenList.prototype.add.apply(toastPlacementExample.classList, selectedPlacement);
            toastPlacement = new bootstrap.Toast(toastPlacementExample);
            toastPlacement.show();

    </script>
    @endif

    @if(session('error'))
        <script>
        const toastPlacementExample = document.querySelector('.toast-placement-ex');
        toastPlacementExample.querySelector('.toast-body').innerText = {!! json_encode(session('error')) !!};

        let selectedType = 'bg-danger';
        selectedPlacement = 'top-0 end-0'.split(' ');
        toastPlacementExample.classList.add(selectedType);
        DOMTokenList.prototype.add.apply(toastPlacementExample.classList, selectedPlacement);
        toastPlacement = new bootstrap.Toast(toastPlacementExample);
        toastPlacement.show();

        </script>
    @endif
    @if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toastPlacementExample = document.querySelector('.toast-placement-ex');
            if (toastPlacementExample) {
                const toastBody = toastPlacementExample.querySelector('.toast-body');
                const errors = @json($errors->all());

                if (errors.length > 0) {
                    // Assuming you want to show the first error in the toast
                    toastBody.innerText = errors[0]; // Adjust if needed

                    let selectedType = 'bg-danger';
                    let selectedPlacement = 'top-0 end-0'.split(' ');

                    toastPlacementExample.classList.add(selectedType);
                    DOMTokenList.prototype.add.apply(toastPlacementExample.classList, selectedPlacement);

                    const toastPlacement = new bootstrap.Toast(toastPlacementExample);
                    toastPlacement.show();
                }
            }
        });
    </script>
@endif

</body>

</html>

