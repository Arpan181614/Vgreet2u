
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Perfect Vgreet2u</title>
    <link rel="stylesheet" href="css/perfect-css.css">

    <script src="js/perfect-js.js">

    </script>
    <script src="http://kit.fontawesome.com/80a0b0b238.js">
    </script>
<!--script src="jquery-3.3.1.min.js"></script-->
  </head>
  <body>
    <div class= 'container'>

<div class="container_content">
  <div class="h1">
        <span>V</span>
        <span>g</span>
        <span>r</span>
        <span>e</span>
        <span>e</span>
        <span>t</span>
        <span>2</span>
        <span>u</span>
      </div>
      <div class="search-icon">
      <input class="search-icon__input" placeholder="search ...">

      <div class="search-icon__wrapper">
      <div class="search-icon__glass"></div>
      <div class="search-icon__handle"></div>
      </div>
      </div>

<div class="container_content_inner">

<div class="title">

  <h1>Welcome to Vgreet2u</h1>
</div>
<div class="par">
<p class="txt">
Send Your Loved Ones A Greeting By Us.
</p>
</div>
<div class="btns">
<a href="login.php"> <button class='btns_more' onclick="openlogin()"> Login </button></a>
<!--////////////////////////searchIcon////////////////////////-->


</div>
</div>
</div>
 <div class="container_outer_img">
 <div class="img-inner">
 <img src='images/6.jpg'  alt="" class="container_img"/>
       </div>
     </div>
  </div>
<div class="overlay"></div>

<script>

const searchIcon = document.querySelector(".search-icon__wrapper");

searchIcon.addEventListener("click", e => searchIcon.parentElement.classList.toggle("open"))


</script>
<!--/////////////////////////navigation menu///////////////////////////-->
<h3 class="nav-icon" onclick="openForm()" >|I|</h3>
    <nav class="menu" id="myForm">
    <p onclick="closeForm()" >+</p>
    <ol>
    <li class="menu-item"><a href="#">Home</a></li>
    <li class="menu-item"><a href="#">about</a></li>
    <li class="menu-item" >
    <a href="#" onclick="closeocassion()">Ocassions</a><span onclick="openocassion()" class="angle-down">|</span>
    <ol class="ocassion" id="ocassion">
    <li class="menu-item"> <a href="#" onclick="closecongrats()">Congrats</a>

      </li>
    <li class="menu-item"> <a href="#" onclick="closeceleb()">celebrations</a></li>
    <li class="menu-item"> <a href="#" onclick="closebirth()">Birthdays</a>
      </li>
<li class="menu-item"> <a href="#" onclick="closebabies()">Babies & Kids</a>

  </li>
    </ol>
    </li>
    <li class="menu-item">
    <a href="#" onclick="closeholidays()">Holidays</a>
</li>
    <li class="menu-item">
    <a href="#" onclick="closefestival()">Festivals</a>
    </li>

    <li class="menu-item"><a href="contactus.html">Contact Us</a></li>
    </ol>
    </nav>
<!--////////////////////////login//////////////////////-->
<!--slider-------------------------------------------------------------->
<!--//////////////////////ocassions////////////////////////////-->
<div class="container2">
  <div class="head1" id="newjob">
  Ocassions
  </div>

  <div class="container3">

    <div class="box">
      <div class="thumb">
        <img src="images/MD1.jpg" alt="">

      </div>
      <div class="details">
  <div class="content3">
    <h3>Birthday</h3>
    <a href="birth.html">See More</a>
  </div>
      </div>
    </div>
    <div class="box">
      <div class="thumb">
        <img src="images/FD1.jpg" alt="">

      </div>
      <div class="details">
  <div class="content3">
    <h3>Anniversary</h3>
    <a href="celeb.html">See More</a>
  </div>
      </div>
    </div>
    <div class="box">
      <div class="thumb">
        <img src="images/RD1.jpg" alt="">

      </div>
      <div class="details">
    <div class="content3">
    <h3>New Baby</h3>
    <a href="baby.html">See More</a>
    </div>
      </div>
    </div>
    <div class="box">
      <div class="thumb">
        <img src="images/3.jpg" alt="">

      </div>
      <div class="details">
    <div class="content3">
    <h3>New Home</h3>
    <a href="congrats.html">See More</a>
    </div>
      </div>
    </div>

  </div>

</div>
<!--//////////////////////////Holidays//////////////////////-->
<div class="container2" id="container3">
  <div class="head1" id="newjob">
  Holidays
  </div>

  <div class="container3">

    <div class="box">
      <div class="thumb">
        <img src="images/mother's day/MD1.jpg" alt="">

      </div>
      <div class="details">
  <div class="content3">
    <h3>Mother's Day</h3>
    <a href="holidays.html">See More</a>
  </div>
      </div>
    </div>
    <div class="box">
      <div class="thumb">
        <img src="images/father's day/FD1.jpg" alt="">

      </div>
      <div class="details">
  <div class="content3">
    <h3>Father's Day</h3>
    <a href="holidays.html">See More</a>
  </div>
      </div>
    </div>
    <div class="box">
      <div class="thumb">
        <img src="images/republic day/RD2.jpg" alt="">

      </div>
      <div class="details">
    <div class="content3">
    <h3>Republic Day</h3>
    <a href="holidays.html">See More</a>
    </div>
      </div>
    </div>
    <div class="box">
      <div class="thumb">
        <img src="images/8.jpg" alt="">

      </div>
      <div class="details">
    <div class="content3">
    <h3>Valentine's Day</h3>
    <a href="holidays.html">See More</a>
    </div>
      </div>
    </div>

  </div>

</div>
<!--/////////////////////////festivals//////////////////////-->
<div class="container2" id="container4">
  <div class="head1" id="newjob">
Festivals
  </div>

  <div class="container3">

    <div class="box">
      <div class="thumb">
        <img src="images/holi/h2.jpg" alt="">

      </div>
      <div class="details">
  <div class="content3">
    <h3>Holi</h3>
    <a href="festivals.html">See More</a>
  </div>
      </div>
    </div>
    <div class="box">
      <div class="thumb">
        <img src="images/FD1.jpg" alt="">

      </div>
      <div class="details">
  <div class="content3">
    <h3>Raksha Bandhan</h3>
    <a href="festivals.html">See More</a>
  </div>
      </div>
    </div>
    <div class="box">
      <div class="thumb">
        <img src="images/RD1.jpg" alt="">

      </div>
      <div class="details">
    <div class="content3">
    <h3>New Year</h3>
    <a href="festivals.html">See More</a>
    </div>
      </div>
    </div>
    <div class="box">
      <div class="thumb">
        <img src="images/diwali/d18.jpg" alt="">

      </div>
      <div class="details">
    <div class="content3">
    <h3>Diwali</h3>
    <a href="festivals.html">See More</a>
    </div>
      </div>
    </div>

  </div>

</div>
<!--///////////////////////////footer///////////////////////-->
<footer><br>
  <div id="hm"><a href="#">Home</a> <a href="#">AboutUs</a> <a href="#">Login</a></div>
    <div id="pol"><a href="#">PrivacyPolicy</a> <a href="#">ContactUs</a> <a href="#">Terms&Conditions</a></div>
    <ul>
      <li>
<a href="#"><i class="fas fa-facebook" aria-hidden="true" >f</i>
<span></span>
<span></span>
<span></span>
<span></span>
</a>
        </li>
        <li>
  <a href="#"><i class="fas fa-twitter" aria-hidden="true" alt="face">t</i>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  </a>
          </li>
          <li>
    <a href="#"><i class="fas fa-google-plus" aria-hidden="true" alt="face">g</i>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    </a>
            </li>
            <li>
      <a href="#"><i class="fas fa-linkedin" aria-hidden="true" alt="face">l</i>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      </a>
              </li>
              <li>
        <a href="#"><i class="fas fa-angle-dow" aria-hidden="true" alt="face">i</i>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        </a>
                </li>
    </ul>
</footer>
  </body>
</html>
