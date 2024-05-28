<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Registration</title>
  <link rel="stylesheet" href="../css/signup.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../Images/parklogo-removebg-preview.png" type="image/icon type">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


<body>

  <?php

  include 'dbcon.php';


  if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phnumber = mysqli_real_escape_string($con, $_POST['phnumber']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);


    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailquery = " select * from signup where email = '$email'";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    $usernamequery = "select * from signup where username ='$username'";
    $uquery = mysqli_query($con, $usernamequery);

    $usernamecount = mysqli_num_rows($uquery);   

    if ($usernamecount > 0) {
      echo '<script>alert("username already taken ! ")</script>';
    } elseif ($emailcount > 0) {                       
      echo '<script>alert("Email already Registered !")</script>';
    } else {
      if ($password === $cpassword) {

        $insertquery = "insert into signup(name,username, email, phnumber,password, cpassword) values('$name','$username','$email','$phnumber','$pass','$cpass')";

        $iquery = mysqli_query($con, $insertquery);

        if ($iquery) {
          echo '<script>alert("Registration Successful\n You can Login Now!!")</script>';

          header("refresh:1 ; url=./signin.php");
        } else {
          echo '<script>alert("Unsucessful Registration!!!")</script>';
        }
      } else {
  ?>
        <script>
          alert("Passsword not matching!!!");
        </script>
  <?php


      }
    }
  }

  ?>


  <div class="navbar">
    <a href="/"><img src="../Images/logo.jpg" class="logo"></a>
    <ul>
      <li><a href="../Index/index1.php">Home</a></li>
      <li><a href="../Admin/admin_login.php">Admin login</a></li>
      <li><a href="../Login_Register/signup.php">Sign up</a></li>
      <li><a href="../Login_Register/signin.php">Log in</a></li>
    </ul>
  </div>
  <div class="container">
    <div class="title"><i class="bi bi-person-lines-fill"></i> Registration</div>
    <div class="content">
      <form action=" <?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" id="name" name="name" placeholder="Enter your name" pattern="[a-zA-Z'-'\s]*" required="" oninvalid="this.setCustomValidity('Please Enter Valid Name')" oninput="setCustomValidity('')">
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" id="phnumber" name="phnumber" placeholder="Enter your number" pattern="^[7-9]\d{9}$" maxlength="10" required="" oninvalid="this.setCustomValidity('Please Enter Valid Number 9/8/7')" oninput="setCustomValidity('')">
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" id="pass1" name="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" id="pass2" name="cpassword" placeholder="Confirm your password" required>
          </div>
          <!-- <div class="input-box">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <input type="radio" name="gender"  id="dot-1" name="gender">
            <span class="details">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <input type="radio" name="gender"  id="dot-2" name="gender">
            <span class="details">Female</span>
          </label>
          </div>
        </div> -->
        </div>
        <div class="btn">
          <button type="submit" id="btn" name="submit" value="register">Register</button>
        </div>
        <div class="signup-link">Already have a account ! <a href="../Login_Register/signin.php">Login here</a></div>
      </form>
    </div>
  </div>

</body>

</html>