<?php
session_start();
        $db = mysqli_connect('localhost', 'root', 'V@msi020705', 'todo');
        // initialize variables
        $name = "";
        $password = "";
        $email="";
        $gender="";
        $date='';
        if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $date=$_POST['date'];
                $sql = "INSERT INTO Details(Full_Name, User_Password, Date_Of_Birth, Email_Id, Gender) 
            VALUES ('$name', '$password', '$date', '$email', '$gender')";

    if (mysqli_query($db, $sql)) {
      echo '<script language="javascript">';
      echo 'alert("Successfully Registered"); location.href="Login.php"';
      echo '</script>';
    } else {
      if (strpos(mysqli_error($db), 'Duplicate entry') !== false)
      {
        echo '<script language="javascript">';
      echo 'alert("You are already registered"); location.href="Login.php"';
      echo '</script>';
      }
    }
        }
        ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>todo registration form</title>
    <link rel="stylesheet" href="style1.css">
  </head>
  <body>
    <form  method="post" action="RegistrationForm.php">
      <h2>TODO REGISTRATION</h2>
      <div class="form-group fullname">
        <label for="fullname">Full Name</label>
        <input name='name' type="text" id="fullname" placeholder="Enter your full name">
      </div>
      <div class="form-group email">
        <label for="email">Email </label>
        <input name='email' type="text" id="email" placeholder="Enter your email">
      </div>
      <div class="form-group password">
        <label for="password">Password</label>
        <input name='password' type="password" id="password" placeholder="Enter your password">
        <i id="pass-toggle-btn" class="fa-solid fa-eye"></i>
      </div>
      <div class="form-group date">
        <label for="date">Date of Birth</label>
        <input name='date' type="date" id="date" placeholder="Select your date">
      </div>
      <div class="form-group gender">
        <label for="gender">Gender</label>
        <select name='gender' id="gender">
          <option value="" selected disabled>Select your gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>
      </div>
      <div class="form-group submit-btn">
        <button type="submit" name="submit" >Submit</button>
      </div>
    </form>
  </body>
</html>