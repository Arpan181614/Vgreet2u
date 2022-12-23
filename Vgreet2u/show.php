<?php
session_start();
include('db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `baby` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['title'];
$code = $row['code'];
$image = $row['path'];
$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,

	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../Vgreet2u/css/baby.css">
    <title></title>
		<script type="text/javascript" src="../Vgreet2u/js/perfect-js.js">

		</script>
  </head>
  <body>
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
				<!--////////////////////////searchIcon////////////////////////-->
        <div class="search-icon">
        <input class="search-icon__input" placeholder="search ...">

        <div class="search-icon__wrapper">
        <div class="search-icon__glass"></div>
        <div class="search-icon__handle"></div>
        </div>
        </div>

        <script>

        const searchIcon = document.querySelector(".search-icon__wrapper");

        searchIcon.addEventListener("click", e => searchIcon.parentElement.classList.toggle("open"))


        </script>
        <!--//////////////////////////////navigation menu//////////////////////-->
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
						<!--//////////////////////////////////////////////////////////////////////////////////////////////-->
						<!--/////////////////////////cart icon///////////////////-->
						<?php
						if(!empty($_SESSION["shopping_cart"])) {
						$cart_count = count(array_keys($_SESSION["shopping_cart"]));
						?>
						<div class="cart_div">
						<a href="cart.php"><img src="images/cart.png" /><span><?php echo $cart_count; ?></span></a>
						</div>

						<?php
					}?>
					<?php
					$ret=mysqli_query($con,"select * from baby where code like '$find'");
					$num=mysqli_num_rows($ret);
					if($num>0)
					{
					while ($row=mysqli_fetch_array($ret))
					{?>
								<div class='container4'>
								<form method='post' action=''>
			<input type='hidden' name='code' value=".$row['code']." />
<div class='boxes'>
					        <div class='imgbox'>
<img  src="<?php echo($row['path']);?>"  alt="" width="200" height="300">
						    </div>
					        <div class='content4'>
					      <button type='submit' class='buy'>Add to Cart</button>
								<div class='name'><h2><?php echo($row['title'])?></h2></div>
					      </div></div></form>
					      </div>


						<div style="clear:both;"></div>
<?php }} else{?>
	<div class="col-sm-6 col-md-4 wow fadeInUp"> <h3>No Product Found</h3>
	</div>

<?php } ?>

						<div class="message_box" style="margin:10px 0px;">
						<?php echo $status; ?>
						</div>


  </body>
</html>
