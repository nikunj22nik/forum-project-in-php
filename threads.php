<?php
$showalert=false;
$showError=false;
require 'partials/dbconnect.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
$threadTitle=$_POST['questiontitle'];
$threaddesc= htmlentities($_POST['questiondesc']);

$id=$_POST['catid'];
if($threadTitle!=null&&$threaddesc!=null){
  $thread_userid=$_POST['sno'];



$sql="INSERT INTO `thread` (`thread_id`, `thread_title`, `thread_categoryid`, `thread_userid`, `thread_description`, `time`) VALUES (NULL, '$threadTitle', '$id', '$thread_userid', '$threaddesc', current_timestamp())";
$result=mysqli_query($conn,$sql);
if($result){
  $showalert=true;
}
else{
  $showError="OOPS!!Something wrong your doubt is not posted succesfully";
}

}
else{
  $showError="OOPS!!Something wrong your doubt is not posted succesfully";
}


}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/style.css">
    <title>Document</title>
    <style>
    .jumbodisp {
        border: 2px solid black;
        background-color: burlywood;
        padding: 10px;
    }

/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: red; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}

    </style>
</head>

<body>
    <?php
   
   require 'partials/navbar.php';
if($showalert){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong>Your Question is succesfully Posted.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
else if($showError){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>!</strong> '.$showError.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}




   ?>


    <div class="container my-5">
        <div class="jumbodisp">
            <div class="displayouter">

                <?php

$servername="localhost";
$username="root";
$password="";
$database="form";

$conn=mysqli_connect($servername,$username,$password,$database);

$catid=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
$catid=$_POST['catid'];
}else{
  $catid=$_GET['catid'];
}

$sql="SELECT * FROM `category` WHERE `category_id`='$catid'";
 $result=mysqli_query($conn,$sql);


while($row=mysqli_fetch_assoc($result)){
echo '<h2>Welcome to '.$row["category_name"].' Forum</h2>'.$row["category_description"].'<hr>';

}

?>

                <div class="displayinside">

                    <p>This is a Peer to Peer Forum for Sharing Information</p>

                  

                </div>
            </div>
        </div>

        <div class="container my-5">
            <form method="post" action="threads.php">
                <?php
$catid=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
$catid=$_POST['catid'];
}else{
  $catid=$_GET['catid'];
}


if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){

echo '<div class="form-group ">
<label for="questiontitle" style="text-align:center;" >Problem Title</label>
<input type="text" class="form-control" name="questiontitle">
</div>
<input type="hidden" name="catid" value="'.$catid.'">
<input type="hidden" name="sno" value='.$_SESSION['sno'].'">
<div class="form-group">
    <label for="exampleFormControlTextarea1">Problem Description</label>
    <textarea class="form-control" name="questiondesc" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
 
<button class="btn btn-primary">Submit</button>

  </form>
</div>';
}
else{
  echo'<div class="container my-3">
  <b>Please Login to Ask a Question</b>
  <hr>
  </div>';
}

?>

                <h2 style="text-align:center;" class="my-4">Browse Questions</h2>



                <?php

require 'partials/dbconnect.php';
$catid=0;
if($_SERVER['REQUEST_METHOD']=="POST"){
$catid=$_POST['catid'];
}
else{
$catid=$_GET['catid'];
}
$sql="SELECT * FROM `thread` WHERE `thread_categoryid`='$catid'";
$result=mysqli_query($conn,$sql);
$noResults=mysqli_num_rows($result);
while($row=mysqli_fetch_assoc($result)){
  $id=$row['thread_id'];


  $comment_by=$row['thread_userid'];
$sqlcommentby="SELECT `name` FROM `user` WHERE `s.no`='$comment_by'";
$resultcommentby=mysqli_query($conn,$sqlcommentby);
$row2=mysqli_fetch_assoc($resultcommentby);
$comment_byname=$row2['name'];


  echo '<div class="media my-4">
  <img src="img/anonymous.jpg" width="30px" class="mr-3" alt="">

  <div class="media-body">
  <p class="mt-0">'.$comment_byname.' at '.$row["time"].'</p>
  <h5 class="mt-0"><a href="threadlist.php?id='.$id.'">'. $row["thread_title"].'</a></h5>'.$row["thread_description"].'
  </div>
</div>';
}
if($noResults==0){

 echo '<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">No Result Found</h1>
    <p class="lead">Be The First Person to ask your Doubts </p>
  </div>
</div>';

}


?>


        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>