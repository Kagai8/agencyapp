<!doctype html>
<html lang="en">
  <head>
    <title>Greenline Insurance Agencies</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('logo/logobilabg.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <!-- Include Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="{{ asset('auth/css/style.css')}}">
    <style>
       body, html {
      height: 93%;
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
            @if(session('notification'))
            <div class="alert alert-{{ session('notification.alert-type') }}">
                {{ session('notification.message') }}
            </div>
            @endif
            <div class="row justify-content-center">

                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">

                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Welcome to : </h2><br><br><br>
                                <h2>GreenLine Insurance Agencies</h2>
                                <h2>Management System</h2>
                                
                            <div style="height: 100px; display: flex; flex-direction: column; justify-content: flex-end;">
                                    <p style="font-size: smaller; align-self: flex-end;"><i class="fa fa-copyright" aria-hidden="true"></i> Product Of Captain Cyber</p>
                                </div>
                            </div>

                        </div>
                    <div class="login-wrap p-4 p-lg-5">
                            <div >
                                <div class="col-md-6 ">
                                    <img src="{{ asset('logo/enhancedlogo.jpg') }}" alt="" style="width: 300px; height: auto;">

                                </div>
                            </div>
                        <div class="d-flex">
                            
                                    
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
                                <button type="submit" class="form-control btn btn-primary submit px-3">Log In</button>
                            </div>
                        </form>

                    </div>
              </div>
                </div>
            </div>
        </div>
    </section>



    </body>

    <script>
    $(document).ready(function() {
        // Check if there's a notification message in the session
        @if(session('notification'))
            // Extract the notification message and type from the session
            var message = '{{ session('notification.message') }}';
            var type = '{{ session('notification.alert-type') }}';

            // Show the Toastr notification
            toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-top-right', // You can change the position as per your requirement
                timeOut: 5000 // Duration of the notification (in milliseconds)
            };

            toastr[type](message); // Show the notification of the specified type
        @endif
    });
</script>
    <script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>
    <!-- Include jQuery (required by Toastr) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include Toastr JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('auth/js/jquery.min.js')}}"></script>
  <script src="{{ asset('auth/js/popper.js')}}"></script>
  <script src="{{ asset('auth/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('auth/js/main.js')}}"></script>
</html>

