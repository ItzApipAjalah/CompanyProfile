<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Error {{ $code }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../../assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
    <style>
        .custom-bg {
            background-color: #097670;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="content-wrapper d-flex align-items-center text-center error-page custom-bg">
              <div class="row flex-grow">
                  <div class="col-lg-7 mx-auto text-white">
                      <div class="row align-items-center d-flex flex-row">
                          <div class="col-lg-6 text-lg-right pr-lg-4">
                              <h1 class="display-1 mb-0">{{ $code }}</h1>
                          </div>
                          <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                              @if($code == 404)
                                  <h2>SORRY!</h2>
                                  <h3 class="fw-light">The page you’re looking for was not found.</h3>
                              @elseif($code == 500)
                                  <h2>OOPS!</h2>
                                  <h3 class="fw-light">Something went wrong on our end.</h3>
                              @else
                                  <h2>ERROR!</h2>
                                  <h3 class="fw-light">An unexpected error occurred.</h3>
                              @endif
                          </div>
                      </div>
                      <div class="row mt-5">
                          <div class="col-12 text-center mt-xl-2">
                              <a class="text-white fw-medium" href="{{ route('home') }}">Back to home</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/template.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>
