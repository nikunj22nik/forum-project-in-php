<?php

$servername="localhost";
$username="root";
$password="";
$database="form";

$conn=mysqli_connect($servername,$username,$password,$database);

      $insert=1;
        $existalert=1;

if($_SERVER['REQUEST_METHOD']=='POST'){


$username=$_POST['username'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$email=$_POST['email'];


//check weather username exist or not.



$sqle="SELECT * FROM `user` WHERE `name` ='$username'";
$resultsql=mysqli_query($conn,$sqle);
$numExistRow=mysqli_num_rows($resultsql);

if($numExistRow>0){
  $exist=true;
  $existalert=2;
}

else{
  $exist=false;
 
}

if($password==$cpassword&&$exist==false&&$username!=NULL&&$password!=NULL&&$email!=NULL){
 $hash=password_hash($password,PASSWORD_DEFAULT);

 
  $sql="INSERT INTO `user` (`s.no`, `name`, `email`, `password`, `time`) VALUES (NULL, '$username', '$email', '$hash', current_timestamp());";

$result=mysqli_query($conn,$sql);

if($result){
$insert=2;
}
else{
  $insert=3; 
}

}
else{
  $insert=3;
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/style.css">
      <title>Signup</title>

 



       </head>





        <body>
   <?php 

require 'partials/navbar.php';
if($insert==2){
   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
   <strong>Holy guacamole!</strong> Success!! You succesfully signup.Now you can login
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>';
 $insert=1;
}

else if($insert==3){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong>Wrong!!Something went wrong please try again.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
$insert=1;
}


else if($existalert==2){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong>Wrong!!Username already exist.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}



?>






<h3 style="text-align:center; color:red;" class="my-3">Signup to Our Website</h3>



<div class="container">
<form method="post" action="signup.php">
<div class="row">
<div class="col-md-6 mx-auto">

<div class="form-group" method="post" action="signup.php">
    <label style="display:block; text-align:center;" for="exampleInputEmail1">User Name</label>
    <input type="text" class="form-control" style="border:2px solid red;"  name="username" id="username" aria-describedby="emailHelp">

  </div>




  <div class="form-group my-4">
    <label style="display:block; text-align:center;" for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" style="border:2px solid red;" name="email" id="email" aria-describedby="emailHelp">

  </div>

  <div class="form-group">
    <label style="display:block; text-align:center;"  for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" style="border:2px solid red;" name="password" id="password">
</div>

  <div class="form-group">
    <label style="display:block; text-align:center;"  for="exampleInputPassword1">Confirm Password</label>
    <input type="password" style="border:2px solid red;" class="form-control" name="cpassword" id="cpassword">
    <small id="emailHelp" class="form-text text-muted">Make sure to write the same password</small>
  </div>
 <button type="submit" style="display:block; margin:auto;" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>



















