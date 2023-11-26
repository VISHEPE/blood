<html>

<head>  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script></head>
<body background="admin_image\blood-cells.jpg">


  <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <div class="container" style="margin-top:200px;">
      <div class="row justify-content-center">
          <div class="col-lg-6">
              <h1 class="mt-4 mb-3" style="color:#D2F015 ;">
                  Blood Bank Management Sytem
                  <br>Admin Login Portal
                </h1>

            </div>
      </div>
      <div class="card" style="height:250px; background-image:url('admin_image/glossy1.jpg');">
          <div class="card-body">

      <div class="row justify-content-lg-center justify-content-mb-center" >
      <div class="col-lg-6 mb-6 ">
      <div class="font-italic" style="font-weight:bold">Username<span style="color:red">*</span></div>
      <div><input type="text" name="username" placeholder="Enter your username" class="form-control" value="" required></div>
    </div>
    </div>
    <div class="row justify-content-lg-center justify-content-mb-center">
    <div class="col-lg-6 mb-6 "><br>
    <div class="font-italic"style="font-weight:bold">Password<span style="color:red">*</span></div>
    <div><input type="password" name="password" placeholder="Enter your Password" class="form-control" value="" required></div>
    </div>
  </div>
  <div class="row justify-content-lg-center justify-content-mb-center">
    <div class="col-lg-4 mb-4 " style="text-align:center"><br>
    <div><input type="submit" name="login" class="btn btn-primary" value="LOGIN" style="cursor:pointer"></div>
    </div>
  </div>
  <div class="row justify-content-lg-center justify-content-mb-center">
    <div class="col-lg-4 mb-4 " style="text-align:center"><br>
    <div><input type="submit" name="forgot_password" class="btn btn-primary" value="Forgot Password" style="cursor:pointer"></div>
    </div>
  </div>
    </div>
  </div></div>
<br>
<?php
include 'conn.php';

if(isset($_POST["login"])){
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = $_POST["password"]; // No need to escape, as we use prepared statements

    $sql = "SELECT * FROM admin_info WHERE admin_username=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            // Verify the password using password_verify
            if (password_verify($password, $row['admin_password'])) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION["username"] = $username;
                header("Location: dashboard.php");
            } else {
                echo '<div class="alert alert-danger" style="font-weight:bold"> Username and Password are not matched!</div>';
            }
        }
    } else {
        echo '<div class="alert alert-danger" style="font-weight:bold"> Username and Password are not matched!</div>';
    }

} elseif(isset($_POST["forgot_password"])){
    // Handle forgot password logic here
    echo "Forgot Password functionality to be implemented.";
}
?>


 </form>
</body>
</html>
