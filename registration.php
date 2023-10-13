<?php
$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  
  include   'partials/_dbconnect.php';
  $username= $_POST["username"];
  $password=$_POST["password"];
  $cpassword=$_POST["cpassword"];
  $first=$_POST['first'];
  $last=$_POST['last'];
  $city=$_POST['city'];
  $dept=$_POST['dept'];
  $zip=$_POST['zip'];

  $exists=false;
  if(($password==$cpassword) && $exists==false)   {

$sql=" INSERT INTO `users` ( `username`, `password`, `dt`, `first`, `last`, `city`, `dept`, `pin`) VALUES ( '$username', '$password', current_timestamp(), '$first', '$last', '$city', '$dept', '$zip')";
$result=mysqli_query($conn,$sql);
if($result){
  $showAlert=true;
}
  }
  
  else{
    $showError="password do not match";
  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Registration</title>
    <style>
      /* Center the form in the middle of the screen */
      body {
        /* display: flex; */
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
      }
    </style>
  </head>
  <body>
    <?php require 'partials/_nav.php'?>

    <?php 
    if($showAlert) {
      
    
   
    
    echo'  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your account is  now created and you can login .
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div> ';

    }
    if($showError) {
      
    
   
    
      echo'  <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong>'.$showError.'
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div> ';
  
      }
    ?>

<div class="container justify-center" style="">
<h1 class="text-center">Student Registration</h1>
<form action="/cs_dept/registration.php" method="POST">
  <div style="text-align: center;">
  <img src="data:image/jpeg;base64,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" alt="Student Registration Image" width="400" height="200">
  </div>
  <div class="form-group  col-md-6 mt-5" style="justify-content: center; align-items: center;">
  <div class="form-row">
    <div class="col-md-6 mb-3 ">
      <label for="validationTooltip01">First name</label>
      <input type="text" class="form-control" name="first" id="validationTooltip01" value="" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationTooltip02">Last name</label>
      <input type="text" class="form-control" name="last" id="validationTooltip02" value="" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
  </div>
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group col-md-6" >
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
    <div class="form-group">
    <label for="cpassword">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <small id="emailHelp" class="form-text text-muted">Make sure that both have same password.</small>
  </div>
  <form class="needs-validation" novalidate>
  <!-- <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationTooltip01">First name</label>
      <input type="text" class="form-control" name="first" id="validationTooltip01" value="" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationTooltip02">Last name</label>
      <input type="text" class="form-control" name="last" id="validationTooltip02" value="" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
  </div> -->
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationTooltip03">City</label>
      <input type="text" name="city" class="form-control" id="validationTooltip03" required>
      <div class="invalid-tooltip">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationTooltip04">Dept.</label>
      <select class="custom-select" name="dept" id="validationTooltip04" required>
        <option selected disabled value="">Choose...</option>
        <option value="cs">cs</option>
        <option value="phy">phy</option>
        <option value="che">che</option>
        <option value="math">math</option>
      </select>
      <div class="invalid-tooltip">
        Please select a valid state.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationTooltip05">Zip</label>
      <input type="number" name="zip" class="form-control" id="validationTooltip05" required>
      <div class="invalid-tooltip">
        Please provide a valid zip.
      </div>
    </div>
  









  
  <button type="submit" class="btn btn-success">SignUp</button>
</form>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>
    
</body>
</html>