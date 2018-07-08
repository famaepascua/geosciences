 <?php
   require("config.php");
   session_start();
   
   $user = $_POST['username'];
   $password = $_POST['password'];

   $sql = "SELECT username, password, userType,userID FROM users WHERE username = '$user' and password = '$password'";

   $statement = $db->prepare($sql);
   $statement->bind_param('ss',$user,$password);
   $statement->execute();

   $result = $statement->get_result();
   $row = $result->fetch_row();

   if($db->query($sql)->num_rows > 0 && $row[2] == 'admin'){
      $_SESSION['currentUser'] = $row[0];
      $_SESSION['currentUserType'] = $row[2];
      $_SESSION['currentUserID'] = $row[3];
      header('Location: home.php');
   }else if ($db->query($sql)->num_rows > 0 && $row[2] == 'user'){
       $_SESSION['currentUser'] = $row[0];
       $_SESSION['currentUserType'] = $row[2];
       $_SESSION['currentUserID'] = $row[3];
      header('Location: ../user/user.php');
   }else{
      header('Location: ../index.php');
   }

?>