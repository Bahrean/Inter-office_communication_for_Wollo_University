<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
  <meta name="author" content="NobleUI">
  <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

  <title>Admin Login Page</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  
  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">

  <!-- Plugins CSS -->
  <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">

  <!-- Layout Styles -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">

  <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />
    <style type="text/css">
    .authlogin-side-wrapper{
        width: 100%;
        height: 100%;
        background-image: url({{asset('upload/login.png')}});
        background-size: cover;
        background-position: center;
    }
    </style>
</head>
<body>
  <div class="main-wrapper">
    <div class="page-wrapper full-page">
      <div class="page-content d-flex align-items-center justify-content-center">
        <div class="row w-100 mx-0 auth-page">
          <div class="col-md-8 col-xl-6 mx-auto">
            <div class="card">
              <div class="row">
                <div class="col-md-4 pe-md-0">
                  <div class="authlogin-side-wrapper">
                    <!-- Add any side content here if needed -->
                  </div>
                </div>
                <div class="col-md-8 ps-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo logo-light d-block mb-2">Noble<span>UI</span></a>
                    <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                    <form class="forms-sample" method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="mb-3">
                        <label for="login" class="form-label">Email/Phone/Name</label>
                        <input type="text" class="form-control" name="login" id="login" placeholder="Enter your login credentials" required>
                      </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                      </div>
                      <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="authCheck">
                        <label class="form-check-label" for="authCheck">Remember me</label>
                      </div>
                      <div>
                        <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">Login</button>
                      </div>
                    
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Core JS -->
  <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>

  <!-- Plugins JS -->
  <script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/template.js') }}"></script>
</body>
</html>
