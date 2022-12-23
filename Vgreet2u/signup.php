<?php
// Include config file
require_once "source/config.php";

// Define variables and initialize with empty values
$name = $username = $email = $password = $confirm_password = "";
$name_err = $username_err = $email_err = $password_err = $confirm_password_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Validate username
  if(empty(trim($_POST["name"]))){
      $name_err = "Please enter your name.";
  } else{
      // Prepare a select statement
      $sql = "SELECT id FROM users WHERE name = ?";

      if($stmt = mysqli_prepare($link, $sql)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "s", $param_name);

          // Set parameters
          $param_name = trim($_POST["name"]);

          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
              /* store result */
              mysqli_stmt_store_result($stmt);

                  $name = trim($_POST["name"]);
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }

          // Close statement
          mysqli_stmt_close($stmt);
      }
  }


    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($name_err) && empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_username, $param_email, $param_password);

            // Set parameters
            $param_name = $name;
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Perfect Vgreet2u</title>
    <link rel="stylesheet" href="css/signup.css">


    <script src="js/perfect-js.js">

    </script>
    <!--script src="jquery-3.3.1.min.js"></script-->
  </head>
  <body>
    <!--////////////////////////////////////////signup//////////////////////////////////-->
    <div id="mysignup" class="bg-modals">
      <div class="modals"><span id="sin"> Signup</span> <span id="frm">Form</span><span id="closes" onclick="closesignup()">+</span>
        <div class="modal-content">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">

                <input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Full Name">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div>

        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">

            <input type="text" id="uname" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="User Name">
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">

            <input type="text" id="eadd" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Email Address">
            <span class="help-block"><?php echo $email_err; ?></span>
        </div>

        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

            <input type="password" id="pswd"name="password" class="form-control" value="<?php echo $password; ?>" placeholder="Password">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">

            <input type="password" id="pswd" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" placeholder="Confirm Password">
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" id="signup-button" value="Submit">

        </div>
        <p id="acc">Already have an account? <a href="login.php" id="lg-button">Login here</a>.</p>
    </form>
        </div>

      </div>
    </div>

  </body>
</html>
