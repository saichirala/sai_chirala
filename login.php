<?php
// we must never forget to start the session
session_start(); 
$errorMessage = '';
if (isset($_POST['txtUserId']) && isset($_POST['txtPassword'])) {
// check if the user id and password combination is correct

//import library
include 'config.php';
include 'opendb.php';
$username=$_POST['txtUserId'];
$password=$_POST['txtPassword'];
echo $username;
echo $password;

//check in database

$sql="SELECT user_id from golconda.tbl_auth_user where user_id='$username' and user_password='$password'";

$result=mysql_query($sql) or die('Query failed'.mysql_error());
echo $result;
echo mysql_num_rows($result);
if (mysql_num_rows($result) == 1) {
      // the user id and password match, 
      // set the session
      $_SESSION['db_is_logged_in'] = true;




// after login we move to the main page
header('Location: orderdetails.php');
exit;
} else {
$errorMessage = 'Sorry, wrong user id / password';
}
include 'closedb.php';

}
?>
<html>
<head>
<title>Basic Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head> 
<body>
<?php
if ($errorMessage != '') {
?>
<p align="center"><strong><font color="#990000"><?php echo $errorMessage; ?></font></strong></p>
<?php
}
?> 
<form method="post" name="frmLogin" id="frmLogin">
<table width="400" border="1" align="center" cellpadding="2" cellspacing="2">
<tr>
<td width="150">User Id</td>
<td><input name="txtUserId" type="text" id="txtUserId"></td>
</tr>
<tr>
<td width="150">Password</td>
<td><input name="txtPassword" type="password" id="txtPassword"></td>
</tr>
<tr>
<td width="150">&nbsp;</td>
<td><input type="submit" name="btnLogin" value="Login"></td>
</tr>
</table>
</form>
</body>
</html>
