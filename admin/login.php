<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = $_POST['username'];
      $password = $_POST['password']; 
      
      $sql = "SELECT userID, username, password, userType FROM users WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $username and $password, table row must be 1 row
		
      if($result[3] == 'admin') {
         session_register("username");
         $_SESSION['login_user'] = $username;
         
         header("location: admin/home.php");
      }else {
         $error = "Your Username or Password is invalid";
      }
   }
?>