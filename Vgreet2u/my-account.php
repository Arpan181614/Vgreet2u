<?php
session_start();
error_reporting(0);
include('source/config.php');
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

else{
	if(isset($_POST['update']))
	{
		$name=$_POST['name'];
		$contactno=$_POST['contactno'];
		$query=mysqli_query($link,"update users set name='$name',contact_no='$contactno' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Your info has been updated');</script>";
		}
	}


date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
	if(isset($_POST['change'])){
    // Define variables and initialize with empty values
    $new_password = $confirm_password = "";
    $new_password_err = $confirm_password_err = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validate new password
        if(empty(trim($_POST["new_password"]))){
            $new_password_err = "Please enter the new password.";
        } elseif(strlen(trim($_POST["new_password"])) < 6){
            $new_password_err = "Password must have atleast 6 characters.";
        } else{
            $new_password = trim($_POST["new_password"]);
        }

        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Please confirm the password.";
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($new_password_err) && ($new_password != $confirm_password)){
                $confirm_password_err = "Password did not match.";
            }
        }

        // Check input errors before updating the database
        if(empty($new_password_err) && empty($confirm_password_err)){
            // Prepare an update statement
            $sql = "UPDATE users SET password = ? WHERE id = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

                // Set parameters
                $param_password = password_hash($new_password, PASSWORD_DEFAULT);
                $param_id = $_SESSION["id"];

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Password updated successfully. Destroy the session, and redirect to login page
                    session_destroy();
                    header("location: login.php");
                    exit();
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }

        // Close connection
        mysqli_close($link);
    }

  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>My Account</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="css/bootstrap.min.css">

	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="css/my-account.css">
	    <link rel="stylesheet" href="css/green.css">

	</head>
    <body class="cnt-home">

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box inner-bottom-sm">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	          <span>1</span>My Profile
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">
<h4>Personal info</h4>
				<div class="col-md-12 col-sm-12 already-registered-login">

<?php
$query=mysqli_query($link,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

					<form class="register-form" role="form" method="post">
<div class="form-group">
					    <label class="info-title" for="name">Name<span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" value="<?php echo $row['name'];?>" id="name" name="name" required="required">
					  </div>



						<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
			 <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="<?php echo $row['email'];?>" readonly>
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="Contact No.">Contact No. <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" required="required" value="<?php echo $row['contactno'];?>"  maxlength="10">
					  </div>
					  <button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">Update</button>
					</form>
					<?php } ?>
				</div>
				<!-- already-registered-login -->

			</div>
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>

<!-- checkout-step-01  -->
<!-- checkout-step-02  -->
<div class="panel panel-default checkout-step-02">
  <div class="panel-heading">
    <h4 class="unicase-checkout-title">
      <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
        <span>2</span>Change Password
      </a>
    </h4>
  </div>
  <div id="collapseTwo" class="panel-collapse collapse">
    <div class="panel-body">

<form class="register-form" role="form" method="post" name="chngpwd" onSubmit="return valid();">
<div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
<label class="info-title" for="New Password">New Password <span>*</span></label>
<input type="password" class="form-control unicase-form-control text-input" id="newpass" name="new_password" value="<?php echo $new_password; ?>">
<span class="help-block" style="color:#eb3007"><?php echo $new_password_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
<label class="info-title" for="Confirm Password">Confirm Password <span>*</span></label>
<input type="password" class="form-control unicase-form-control text-input" id="cnfpass" name="confirm_password" required="required" value="<?php echo $confirm_password; ?>">
<span class="help-block" style="color:#eb3007"><?php echo $confirm_password_err; ?></span>
</div>
<button type="submit" name="change" class="btn-upper btn btn-primary checkout-page-button">Change </button>
</form>




    </div>
  </div>
</div>
<!-- checkout-step-02  -->

					</div><!-- /.checkout-steps -->
				</div>

			</div><!-- /.row -->
		</div><!-- /.checkout-box -->


</div>
</div>

	<script src="js/jquery-1.11.1.min.js"></script>

	<script src="js/bootstrap.min.js"></script>


</body>
</html>
<?php } ?>
