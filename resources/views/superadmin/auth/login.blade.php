<!doctype html>
<html lang="en">
  <head>
    <title>GIA - MINISTER LOG IN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="{{ asset('minister/minister/css/style.css')}}">
  <style>
    /* Add custom CSS to fix the layout */
    body, html {
      height: 100%;
      background-color: #fff; /* Set body background color to white */
    }
    .ftco-section {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
    }
    .wrap {
      display: flex;
      flex-wrap: nowrap;
    }
    .img {
      flex: 50%;
      background-size: cover;
      background-position: center;
    }
    .login-wrap {
      flex: 50%;
      padding: 40px;
      background-color: #fff; /* Set a background color to ensure visibility */
    }
  </style>
  </head>
  <body>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
          <div class="wrap d-md-flex">
            <div class="img" style="background-image: url('{{ asset('minister/minister/images/3.png') }}');">
            </div>
            <div class="login-wrap p-4 p-md-5">
              <div class="d-flex">
                <div class="w-100">
                  <h3 class="mb-8">MINISTER LOG IN</h3>
                </div>
                
              </div>
              <form method="POST" action="{{ route('login') }}" class="signin-form">
                @csrf
                <div class="form-group mb-3">
                  <label class="label" for="name">Email</label>
                  <input type="email" name="email" :value="old('email')" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group mb-3">
                  <label class="label" for="password">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                </div>
                
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="{{ asset('minister/minister/js/jquery.min.js')}}"></script>
  <script src="{{ asset('minister/minister/js/popper.js')}}"></script>
  <script src="{{ asset('minister/minister/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('minister/minister/js/main.js')}}"></script>

  </body>
</html>

