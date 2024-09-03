<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Signup</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{  asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{  asset('assets/vendors/base/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{  asset('assets/css/style.css ')}}">
  <link rel="shortcut icon" href="{{  asset('assets/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form method="POST" action="{{ route('storeStudent') }}" class="pt-3" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <input type="text" required name="username" class="form-control form-control-lg @error('username') is-invalid @enderror" placeholder="full name" value="{{ old('username') }}">
                  @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="email" required name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                  @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="password" required name="password" value="{{ old('password') }}" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password">
                  @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="password" required name="password_confirmation" class="form-control form-control-lg" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <input type="text" required name="phone" value="{{ old('phone') }}" class="form-control form-control-lg @error('phone') is-invalid @enderror" placeholder="phone">
                    @error('phone')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="text" required name="address" value="{{ old('address') }}" class="form-control form-control-lg @error('address') is-invalid @enderror" placeholder="address">
                    @error('address')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                <div class="mb-4">
                  <div class="form-check">
                    <input type="checkbox" name="terms" class="form-check-input @error('terms') is-invalid @enderror" id="terms">
                    <label class="form-check-label text-muted" for="terms">
                      I agree to all Terms & Conditions
                    </label>
                    @error('terms')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.html" class="text-primary">Login</a>
                </div>
              </form>
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
  <script src="{{  asset('assets/vendors/base/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{  asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{  asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{  asset('assets/js/template.js')}}"></script>
  <!-- endinject -->
</body>

</html>
