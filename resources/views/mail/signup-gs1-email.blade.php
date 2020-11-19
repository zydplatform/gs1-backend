<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Planet Systems Uganda">
  <meta name="keywords" content="web application for barcodes using mobile first approach">
  <meta name="description" content="GS1 Uganda website">
  <title>GS1 Uganda</title>
  <link rel="icon" href="mydashboard/images/newlogo1.png" type="image/icon type">
  <!-- Custom fonts for this template-->
  <link href="mydashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Custom styles for this template-->
  <link href="mydashboard/css/userdashboard.css" rel="stylesheet">
  <!-- data tables custom styles -->
   <link href="mydashboard/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
   <style type="text/css">
     .sidebar{
      /*background: white;*/
      /*color: black;*/
     }
     body#page-top{
      top: 0px;
     }
   </style>
</head>
<body>
  <p>Hello <strong>{{$email_data['name']}}</strong></p>
  <h3>Welcome to GS1 Uganda Standards Limited</h3> <br><br>
  <p>Please click the link below to verify your email and activate your account !</p><br><br>
  <a href="http://localhost/gs1Admin/gs1-admin/public/verify?code={{$email_data['verification_code']}}">Click Here !</a>
  <strong>Thank You</strong>

	  <!-- Bootstrap core JavaScript-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="mydashboard/vendor/jquery/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="mydashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="mydashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="mydashboard/js/userdashboard.min.js"></script>
  <script src="mydashboard/js/userdashboard2.js"></script>

  <!-- Page level plugins -->
  <script src="mydashboard/vendor/chart.js/Chart.min.js"></script>
  <script src="mydashboard/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="mydashboard/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Page level custom scripts -->
  <script src="mydashboard/js/demo/chart-area-demo.js"></script>
  <script src="mydashboard/js/demo/chart-pie-demo.js"></script>
  <script src="mydashboard/js/demo/datatables-demo.js"></script>
</body>
</html>