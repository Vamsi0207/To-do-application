<?php
session_start();
        $db = mysqli_connect('localhost', 'root', 'V@msi020705', 'todo');
        $name = "";
        $password = "";
        if (isset($_POST["Login"])) {
          if (empty($_POST['username']) && empty($_POST['password']) ) {
            echo '<script language="javascript">';
            echo "alert('Enter Details'); location.href='Login.php'";
            echo '</script>';
          }
          else{

                $email= $_POST['username'];
                $password = $_POST['password'];
                $sql = "SELECT * FROM Details WHERE Email_Id = '$email' AND User_Password = '$password'";
                $result = mysqli_query($db, $sql);
                
        if (mysqli_num_rows($result) ==1) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['Email_Id'] = $row['Email_Id']; 
          $full_name = $row['Full_Name'];
          echo '<script language="javascript">';
          echo "alert('Login Successful'+'  '+'$full_name'); location.href='index.php'";
          echo '</script>';
        }
        else{
          echo '<script language="javascript">';
          echo "alert('Username and password is incorrect'); location.href='Login.php'";
          echo '</script>';
        }
        }
      }
  ?>
<html>
<head>
    <title>TODO Application</title>
    <link rel="stylesheet" href="styles.css">
      
</head>
<body>
<div class="form">
    <form method="post" action="Login.php" >
    <div class="title">TODO Login</div>
    <div class="input-container ic1">
      <label for="firstname" class="placeholder"></label>
      <input id="username" name='username' class="input" type="text" placeholder="Enter Your Email" />
      <div class="cut"></div>
    </div>
    <div class="input-container ic2">
      <input id="lastname" class="input" name='password' type="Password" placeholder=" " />
      <div class="cut"></div>
      <label for="lastname" class="placeholder">Password</label>
    </div>
    <button type='submit' name="Login" class="submit">Login</button>
    </form>
    
    <div class="subtitle">Don't have an account?<a href="RegistrationForm.php">Register/Signup</a></div>
    
</div>
</body>
</html>