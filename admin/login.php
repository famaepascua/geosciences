 <?php
 require("config.php");
 session_start();

 $user = mysqli_real_escape_string($db,$_POST['username']);
 $password = mysqli_real_escape_string($db,$_POST['password']);

 $sql = "SELECT username, password, userType,userID FROM users WHERE username = ? and password = ?";
 $statement = $db->prepare($sql);
 $statement->bind_param('ss',$user,$password);
 $statement->execute();


 $result = $statement->get_result();
 $row = $result->fetch_row();

 $userID = $row[3];

if(mysqli_num_rows($result) > 0){

   $sql = "INSERT INTO userlogs(userID) VALUES('$userID') ";

  if(!$db->query($sql)){
    var_dump($db->error);
    die;
  }
  $userlogID = $db->insert_id;
  $_SESSION['userlogID'] = $userlogID;
  $_SESSION['currentUser'] = $row[0];
  $_SESSION['currentUserType'] = $row[2];
  $_SESSION['currentUserID'] = $row[3];
  if($row[2] == 'admin'){
    header('Location: home.php');
  }else{
   header('Location: ../user/user.php');
  }
}else{
  echo "<script type='text/javascript'>alert('Invalid username or password. ');location.href='../index.php'</script>";
}

?>