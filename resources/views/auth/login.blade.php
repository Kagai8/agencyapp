<!doctype html>
<html lang="en">
  <head>
    <title>Agency App Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="{{ asset('auth/css/style.css')}}">

    </head>
    <body>
    <section class="ftco-section">
        <div class="container">
            
            <div class="row justify-content-center">

                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">

                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Welcome to : </h2><br><br><br>
                                <h2>Insurance</h2>
                                <h2>Agency Management System</h2>
                                
                            <div style="height: 100px; display: flex; flex-direction: column; justify-content: flex-end;">
                                    <p style="font-size: smaller; align-self: flex-end;"><i class="fa fa-copyright" aria-hidden="true"></i> Product Of Captain Cyber</p>
                                </div>
                            </div>

                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Log In</h3>
                        </div>
                                
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="signin-form">
                        @csrf

                        <div class="form-group mb-3">
                            <label class="label" for="email">Email</label>
                            <input type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group mb-3">
                            <label class="label" for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                        </div>
                    </form>

                </div>
              </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('auth/js/jquery.min.js')}}"></script>
  <script src="{{ asset('auth/js/popper.js')}}"></script>
  <script src="{{ asset('auth/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('auth/js/main.js')}}"></script>

    </body>
</html>

