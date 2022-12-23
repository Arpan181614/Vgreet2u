<?php
session_start();
include('db.php');

?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="css/baby.css">
    <title>Plants</title>
    <script type="text/javascript" src="js/perfect-js.js">

    </script>
  </head>
  <body>
        <div class="big-container">
       
    <div class="h1">
      <span>i</span>
            <span>P</span>
            <span>i</span>
            <span>c</span>
            <span>s</span>
            
        </div>        <!--////////////////////////searchIcon////////////////////////-->
        <form method='post' action='show.php'>
        <div class="search-icon">
        <input class="search-icon__input" name="search" placeholder="search ...">

        <div class="search-icon__wrapper">
        <div class="search-icon__glass"></div>
        <div class="search-icon__handle"></div>
        </div>
        </div>
</form>
        <script>

        const searchIcon = document.querySelector(".search-icon__wrapper");

        searchIcon.addEventListener("click", e => searchIcon.parentElement.classList.toggle("open"))


        </script>
        <!--//////////////////////////////navigation menu//////////////////////-->
        <!--/////////////////////////navigation menu///////////////////////////-->
<h3 class="nav-icon" onclick="openForm()" >|I|</h3>
<div class="middle" id="myForm">
  <p onclick="closeForm()" >+</p>
      <div class="menu">
        <li class="item" id='home'>
          <a href="dashboard1.php" class="btn"><i class="fas fa-home"></i>Home</a>
          </li>
        
        <li class="item" id='profile'>
          <a href="my-account.php" class="btn"><i class="far fa-user"></i>My Profile</a>
          </li>
        
        <li class="item" id="nature">
          <a href="#nature" class="btn"><i class="fas fa-birthday-cake"></i>Nature</a>
          <div class="smenu">
            <a href="birds.php">Birds</a>
            <a href="animals.php">Animals</a>
            <a href="seaoceans.php">Seas & Oceans</a>
            <a href="mountains.php">Mountains</a>
            <a href="plants.php">Plants</a>
          </div>
        </li>
        <li class="item" id="cars">
          <a href="cars.php" class="btn"><i class="far fa-handshake"></i>Cars</a>
          </li>
<li class="item" id="monuments">
          <a href="monuments.php" class="btn"><i class="fas fa-gift"></i>Famous Monuments</a>
          </li>
        <li class="item" id="contact-us">
          <a href="contactus.html" class="btn"><i class="fas fa-envelope"></i>Contact Us</a>
          </li>

        <li class="item">
          <a class="btn" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </li>
      </div>
    </div>
    <!--//////////////////////////////////////////////////////////////////////////////////////////////-->
            
            <?php
            
            $result = mysqli_query($con,"SELECT * FROM `image_details` where code = 7");
            while($row = mysqli_fetch_assoc($result)){
              $codes = $row['code'];
                echo "<div class='container4'>
                <form method='post' action=''>
      <input type='hidden' name='code' value=".$row['code']." />
<div class='boxes'>
                  <div class='imgbox'>
                <img src='".$row['path']."' >
                <div class='content'>
    
    <p style = 'color:".$row['color']."'>".$row['description']."</p>
  </div>
                </div>
                  <div class='content4'>
                <div class='name'><h2>".$row['title']."</h2></div>
                        <form method='get' action=''>
<a  class='buy' name='download' href='download.php?file=".$row['path']."&title=".$row['title']."&code=".$row['code']."&desc=".$row['description']."'>Download File</a>
</form>
                </div></div></form>
                </div>";
                      }
            mysqli_close($con);
            ?>

            <div style="clear:both;"></div>

            
</div>
  </body>
</html>
