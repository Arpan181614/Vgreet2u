<?php
include(db.php);

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 	<head>
 		<meta charset="utf-8">
 		<title></title>
 	</head>
 	<body>
		<div class="search-icon">
		<input class="search-icon__input" placeholder="search ...">

		<div class="search-icon__wrapper">
		<div class="search-icon__glass"></div>
		<div class="search-icon__handle"></div>
		</div>
		</div>
<?php $query = mysql_query("select * from products");
$num_rows = mysql_num_rows($query);
echo $num_rows;
 ?>
 	</body>
 </html>
