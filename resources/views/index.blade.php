
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP - Committee</title>
    <!-- Style Sheets -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- FontAwesome Icons -->
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">

</head>

<body>

    <section>
        <div class="container vh-100 d-flex justify-content-center align-items-center">
            <div class="row position-relative d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="login-form bg-light p-4 rounded-3 shadow-sm">
                        <form action="{{route('user.login')}}" method="post" class="row g-5">
                        @csrf
                        <h4 class="text-center">Login</h4>
                            @if(Session::get('fail'))
                           <div>
                           <div class="alert alert-danger">
                                {{Session::get('fail')}}
                            </div>
                           </div>
                           @endif
                            <div class="col-12">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="col-12 passwordField">
                                <label>Password:</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                <i class="fas fa-eye" id="togglePassword"></i>
                                <span class="text-danger">@error('password') {{$message}} @enderror</span>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-lg btn-dark float-end">Login</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>
</body>

</html>