<?php
// we must never forget to start the session
session_start(); 
$errorMessage = '';
if (isset($_POST['userid']) && isset($_POST['password'])) {
// check if the user id and password combination is correct

//import library
include 'configdb.php';
include 'opendb.php';
$username=$_POST['userid'];
$password=$_POST['password'];
//check in database

$sql="SELECT user_id,user_name,user_role from User_Details where user_id='$username' and user_pwd='$password'";

$result=mysql_query($sql) or die('Query failed'.mysql_error());


if (mysql_num_rows($result) == 1) {
      // the user id and password match, 
      // set the session
      $row = mysql_fetch_array($result, MYSQL_ASSOC);

      $_SESSION['db_is_logged_in'] = true;
      $_SESSION['user_name']=$row['user_name'];
      $_SESSION['user_role']=$row['user_role'];

// after login we move to the main page
header('Location:OrderDetails.php');
exit;
} else {
$_SESSION['login_err']=true;
header('Location:EmployeeLogin.php');
}
include 'closedb.php';

}
?>
