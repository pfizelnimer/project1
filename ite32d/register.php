<!--?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","authentication");
if(isset($_POST['register_btn']))
{
    $username=mysqli_real_escape_string($db, $_POST['username']);
    $email=mysqli_real_escape_string($_POST['email']);
    $password=mysqli_real_escape_string($_POST['password']);
    $password2=mysqli_real_escape_string($_POST['password2']);  
     if($password==$password2)
     {           //Create User
            $password=md5($password); //hash password before storing for security purposes
            $sql="INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
            mysqli_query($db,$sql);  
            $_SESSION['message']="You are now logged in"; 
            $_SESSION['username']=$username;
            header("location:client.php");  //redirect home page
    }
    else
    {
      $_SESSION['message']="The two password do not match";   
     }
}
? -->

<!DOCTYPE html>
<html>
<head>
  <title>Sign Up as Client</title>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
  <?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
<div class="header">
    <h1>Sign Up</h1>
</div>

<form method="post" action="register.php">
  <table>
     <tr>
           <td>Username : </td>
           <td><input type="text" name="username" class="textInput"></td>
     </tr>
     <tr>
           <td>Email : </td>
           <td><input type="email" name="email" class="textInput"></td>
     </tr>
      <tr>
           <td>Password : </td>
           <td><input type="password" name="password" class="textInput"></td>
     </tr>
      <tr>
           <td>Confirm Password: </td>
           <td><input type="password" name="password2" class="textInput"></td>
     </tr>
      <tr>
           <td><a href="index.php"><button type="button" value="Cancel">Cancel</button></a></td>
           <td><input type="submit" name="register_btn" class="Register"></td>
     </tr>
  
</table>
<br />
<table>
  <tr>
           <td><a href="regcustomer.php"><button type="button" value="cussign">Customer Sign Up</button></a></td>
           
  </tr>

</table>
</form>
<?php 
  echo "Register Form"
?>
<?php
if (isset($_POST['register_btn'])){
  
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $username = md5($username);
  $email = md5($email);
  $password = md5($password);
  $password2 = md5($password2);
  $msg = $username . ' : ' . $email . ' : ' . $password . ' : ' . $password2;
$fp = fopen("file1.txt", "a") or die ("can't open file");
fwrite($fp, $msg."\n");
fclose($fp);
header("location:client.php");  //redirect home page
}
?>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
        
    }
?>
</body>
</html>