<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
    <title>Disqus</title>
  </head>
  
  <body>
   <?php
   require 'partials/navbar.php';
   require 'partials/fotter.php';
  ?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://source.unsplash.com/2000x900/?coding,java" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/2000x900/?coding,php" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/2000x900/?coding,django" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>




<div class="category-container conatiner my-5">
  <hr>
  <h1 style="color:red; text-align:center;">DisQue-Browse-Categories</h1>
<hr>
  <div id="categories" class="my-3 row">

<div class="box col-md-3">

<h2><a href="#">Python</a></h2>
<img src="img/python.jpg" alt="pythonimg">
<p>Python is an interpreted, high-level and general-purpose programming language. Created by Guido van Rossum and first released in 1991, Python's design philosophy emphasizes code readability with its notable use of significant whitespace</p>
<button class="btn  btn-primary"><a href="threads.php?catid=2" style="color:white; text-decoration:none;">Python</a></buton>
</div>

<div class="box col-md-3">
<h2><a href="threads.php?catid=3" style="color:blue; text-decoration:none;">JavaScript</a></h2>
  <img src="img/javascript.png" alt="javascriptimg">
  <p>JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-orientation</p>
<button class="btn  btn-primary"><a href="threads.php?catid=3" style="color:white; text-decoration:none;">JavaScript</a></buton>
</div>

<div class="box col-md-3">
<h2><a href="threads.php?catid=1" style="color:blue; text-decoration:none;">Java</a></h2>
<img src="img/java.webp" alt="javaimg">
<p>Java is a class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible. java is also known as language of possiblities.hard to learn but must for learning oops concepts java is best.</p>
<button class="btn  btn-primary"><a href="threads.php?catid=1" style="color:white; text-decoration:none;">Java</a></buton>
</div>


<div class="box col-md-3">
<h2><a href="threads.php?catid=4" style="color:blue; text-decoration:none;">C++</a></h2>
<img src="img/c++.png" alt="javaimg">
<p>C++ (/ˌsiːˌplʌsˈplʌs/) is a general-purpose programming language created by Bjarne Stroustrup as an extension of the C programming language, or "C with Classes". The language has expanded significantly over time, and modern C++ now has object-oriented, generic, and functional.</p>
<button class="btn btn-primary"><a href="threads.php?catid=4" style="color:white; text-decoration:none;">C++</a></buton>
</div>

<div class="box col-md-3">
<h2><a href="threads.php?catid=5" style="color:blue; text-decoration:none;">Django</a></h2>
<img src="img/django.webp" alt="javaimg">
<p>Django is a Python-based free and open-source web framework that follows the model-template-views architectural pattern. It is maintained by the Django Software Foundation, an American independent organization.</p>
<button class="btn btn-primary mb-0"><a href="threads.php?catid=5" style="color:white; text-decoration:none;">Django</a></buton>
</div>


<div class="box col-md-3">
<h2><a href="threads.php?catid=6" style="color:blue; text-decoration:none;">Node.js</a></h2>
<img src="img/node.png" alt="javaimg">
<p>Node.js is an open-source, cross-platform, back-end, JavaScript runtime environment that executes JavaScript code outside a web browser. Node.js lets developers use JavaScript to write command line tools and for server-side scripting—running scripts server-side to produce dynamic web page content before the page is sent to the user's web browser</p>
<button class="btn  btn-primary"><a href="threads.php?catid=6" style="color:white; text-decoration:none;">Node.js</a></buton>
</div>


</div>


</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>