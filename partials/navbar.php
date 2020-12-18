
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/forumproject" style="color:red;">DisQue</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Aboutus</a>
      </li>
      <!-- <li class="nav-item  active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Topics
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
      <li class="nav-item active">
        <a class="nav-link " href="#">ContactUs</a>
      </li>
    </ul>
   
    <ul class="navbar-nav mr-0">
      <li class="nav-item active">
       
      </li>
</div>
<?php
session_start();
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
  
echo '<img src="img/anonymous.jpg" class="mr-3" width="30px"> <span style="color:white;">'.$_SESSION['username'].'</span>';
echo '<a href="logout.php" role="button" id="lgout" class="btn btn-outline-danger ml-3">Logout</a>';

}
else{

  echo '<button type="button" id="lgn"  class="btn btn-outline-success  ml-2"><a href="login.php" style="text-decoration:none;" >Login</a></button>
  <button type="button" id="lgout" class="btn btn-outline-danger ml-2"><a href="signup.php" style="text-decoration:none;">SignUp</a></button>';
}



?>

</nav>


  







