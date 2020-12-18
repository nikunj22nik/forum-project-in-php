 <?php
$showalert=false;
$showError=false;
require 'partials/dbconnect.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $comment_content=$_POST['questiondesc'];
    $threadid=$_GET['id'];
    $comment_by=$_POST['sno'];
    if($comment_content==null){
$showError="OOPS!!Something went wrong your comment is added";
    }
    else{
    $sql="INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `time`, `comment_by`) VALUES (NULL, '$comment_content', '$threadid', current_timestamp(), '$comment_by')";
    $result=mysqli_query($conn,$sql);

    if($result){
        $showalert=true;
    }
    else{
        $showalert="OOPS!!Something went wrong your comment is added";
    }

  }
}
?>




 
 
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="/css/style.css">
     <title>Document</title>
    <style>
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

        .question{
            border:2px solid black;
            width:70%;
            display:block;
            margin:auto;
            margin-top:20px;
            border-radius:10px;
            padding:10px;
            background-color:black; 
           
        }
        h1{
            color:rgb(70, 6, 9);
            text-align:center;
        }
        p{
            color:green;
            background-color:black;
        }
        </style>
 </head>
 <body>
     <?php
require 'partials/dbconnect.php';
require 'partials/navbar.php';

//success alert

if($showalert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong>Your comment is succesfully added
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
else if($showError){
    echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> .'.$showError.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}








$num=$_GET['id'];
$sql="SELECT * FROM `thread` WHERE `thread_id`='$num'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
echo '<div class="question">
<h1>'.$row['thread_title'].'</h1>
<p>Q-'.$row["thread_description"].'</p>

<span style="color:blue;">Posted By-Nikunj</span>
</div>';
}

?>

<h1 class="text-center my-4">Add a Comment</h1>



<hr>
<?php

if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){

  echo '<div class="container my-3">
 <form method="post" action="'.$_SERVER["REQUEST_URI"].'">
<div class="form-group">
    <label for="exampleFormControlTextarea1" class="ml-5"><b>Comment</b></label>
    <textarea style="border:2px solid blue;" class="form-control" name="questiondesc" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
  <button class="btn btn-primary">Add</button>
  </form>
  
</div>';

}

else{
  echo'<div class="container my-3">
  <b>Please Login to add a comment</b>
  <hr>
  </div>';


}


?>




<div>

<h2 style="margin-left:70px;margin-bottom:30px;">Discussion</h2>
    </div>

<div class="container">
<?php
require 'partials/dbconnect.php';
$threadid=$_GET['id'];

$sql="SELECT * FROM `comments` WHERE `thread_id`='$threadid'";

$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){

  $comment_by=$row['comment_by'];
$sqlcommentby="SELECT `name` FROM `user` WHERE `s.no`='$comment_by'";
$resultcommentby=mysqli_query($conn,$sqlcommentby);
$row2=mysqli_fetch_assoc($resultcommentby);
$comment_byname=$row2['name'];
    echo '<div class="media my-2">
    <img src="img/anonymous.jpg" width="34px" class="mr-3" alt="...">

    <div class="media-body">
    <h5 class="mt-1">'.$comment_byname.' at '.$row["time"].'</h5>
    '.$row["comment_content"].'
     </div>
  </div>';
}

?>
</div>






    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

 </body>
 </html>