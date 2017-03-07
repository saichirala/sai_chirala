<?php
// we must never forget to start the session
session_start(); 
$errorMessage = '';
if (isset($_POST['OrderNumber']) && isset($_POST['password'])) {
// check if the user id and password combination is correct

//import library
include 'configdb.php';
include 'opendb.php';
$ordernum=$_POST['OrderNumber'];
$password=$_POST['password'];
//check in database
$sql="SELECT 
Order_Num,
Order_pwd,
Order_type,
Order_sub_type,
Order_quantity,
Order_status,
Order_sub_status,
Order_cust_name,
Order_email_id,
Order_cust_ref_num,
Order_gcc_ref_num,
Order_Status_start_date,
Order_Status_end_date,
Order_created_by,
Order_modified_by,
Order_testing_agency from OrderMaster where Order_num='$ordernum' and Order_pwd='$password'";

$result=mysql_query($sql) or die('Query failed'.mysql_error());

if (mysql_num_rows($result) == 1) {
      // the Order_id and password match, 
      // set the session
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
} else {
$_SESSION['order_login_err']=true;

header('location:orderstatus.php');
exit;
}
include 'closedb.php';

}
?>


<HTML><HEAD><TITLE>Golconda Corrosion Control-Cathodic Protection|Corrosion Prevention</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<META 
content="Corrosion Control, Corrosion Protection, Corrosion Prevention, Cathodic Protection middle east, Corrosion causes and Protection,Corrosion Prevention Solutions" 
name=keywords>
<META 
content="Golconda Corrosion Control  specalizes in corrosion control, Corrosion inhibition and Corrosion prevention.Cathodic protection for Anodes" 
name=description>
<META content="index, follow" name=Robots>
<META content=index,follow name=GOOGLEBOT>
<META content=Global name=coverage>

<LINK href="style.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16640" name=GENERATOR></HEAD>
<BODY text=#000000 bgColor=#ffffff leftMargin=0 topMargin=0 marginheight="0" 
marginwidth="0">
<TABLE cellSpacing=0 cellPadding=0 width="100%" 
background=images/topbg.gif border=0>
  <TBODY>
  <TR>
    <TD vAlign=top><IMG height=59 src="images/topside.jpg" 
      width=177></TD>
    <TD vAlign=top align=right>
      <DIV align=right><IMG height=59 src="images/logo1.gif" 
      width=396></DIV></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 width="100%" border=0 cllpadding="0">
  <TBODY>
  <TR>
    <TD vAlign=top align=left width=153 
    background=images/sidebg.gif height=600>
      <TABLE cellSpacing=0 cellPadding=0 width=153 border=0>
        <TBODY>
        <TR>
          <TD vAlign=top align=left><IMG height=24 
            src="images/side02.gif" width=153></TD></TR>
        <TR>
          <TD><IMG height=6 src="images/trans.gif" width=1></TD></TR>
        <?php
		include 'Nav.html';
	?>

</TBODY></TABLE></TD>
    <TD vAlign=top>
      <TABLE cellSpacing=2 cellPadding=6 width=600 border=0>
        <TBODY>
        <TR>
          <TD vAlign=top>
            <TABLE cellSpacing=0 cellPadding=0 width=600 border=0>
              <TBODY>
              <TR><td class="text">
<?
echo "Dear Customer : <b>$row[Order_cust_name]</b>.Welcome to Golconda Corrosion Control Order Tracking Facility.

<br>Mentioned below is the status of your Order.<br>Please get in touch with us through email/phone/or thru the comments sections available in case of any
queries.<br>

Order Number <b> $row[Order_Num]<br></b>

The Order Type <b> $row[Order_type]</b> for <b> $row[Order_quantity] </b> units of <b>$row[Order_sub_type]<br></b>
The Current Status of the Order is <b>$row[Order_status]. </b>The status start date is <b> $row[Order_Status_start_date] </b>and tentative date for next status update is on
<br> <b>$row[Order_Status_end_date]. </b>";

?>




</TD></TR>

</TBODY></TABLE></TR></TBODY></TABLE></BODY></HTML>

