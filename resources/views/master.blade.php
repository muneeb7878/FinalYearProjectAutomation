<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- Style Sheets -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="assets/styles/group.css">
    <!-- FontAwesome Icons -->
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">

</head>
<body>
{{View::make("header")}}
@yield("content")    


     <!-- Scripts -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <script src="js/jquery.js"></script>
    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>
</body>
</html>