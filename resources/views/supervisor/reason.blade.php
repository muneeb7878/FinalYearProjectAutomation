
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

<section class="container-fluid">
        <div class="container shadow rounded-3">
            <div class="row d-flex justify-content-center">
                <!-- Write post section -->
                <div class="col-8 shadow rounded-3 mt-5 mb-4 text-center">
                    <button type="button" id="postBtn" class="btn btn-primary rounded-3 m-4">Write a Reason</button>
                    <div class="row d-flex justify-content-center">
                        <div class="col-8 mb-3 mt-5" id="post">
                        <form action="\rejectreason" method="POST"> 
                        @csrf
                                <h1 class="text-center text-primary">Write a Reason</h1>
                            <textarea class="form-control" id="message-text" name="content" required></textarea>
                            <button type="submit" class="btn btn-outline-primary rounded-pill mt-2 float-end" name="SubmitBtn">Send Reason</button>
                        </form>
                        </div>
                    </div>
                </div>
           
                <!-- Model -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <i class="fas fa-comment-dots text-primary h1"></i>
                                <h3>Write your reason here:</h3>
                                <form>
                                    <div class="mb-3 text-start">
                                        <label for="message-text" class="col-form-label">Message:</label>
                                        <textarea class="form-control" id="message-text"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Post</button>
                            </div>
                        </div>
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