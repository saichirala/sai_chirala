<?php
// we must never forget to start the session
session_start(); 
$errorMessage = '';

// check if the user id and password combination is correct

//import library
include 'configdb.php';
include 'opendb.php';
$ordernum=$_POST['OrderNumber'];
//echo $ordernum;

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
GCC_email_id,
Order_cust_ref_num,
Order_gcc_ref_num,
Order_Status_start_date,
Order_Status_end_date,
Order_created_by,
Order_modified_by,
Order_testing_agency,Order_start_Date,Order_tent_end_date,Order_Spl_comments,Order_insp_agency ,Order_creation_date from OrderMaster where Order_Num='$ordernum'";

$result=mysql_query($sql) or die('Query failed'.mysql_error());

if (mysql_num_rows($result) == 1) {
      // the Order_id and password match, 
      // set the session
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
}
//echo "is $row[Order_status]";
//echo "is $row[Order_sub_status]";
//echo "is $_POST[OrderStatusDropBox]";
//echo " is $_POST[SubStage]";

if(($row[Order_status]!=$_POST[OrderStatusDropBox]) || ($row[Order_sub_status]!=$_POST[SubStage]))
{ $history=" insert into OrderMasterHistory select * from OrderMaster where Order_Num='$row[Order_Num]' ";

mysql_query($history) or die(mysql_error());
}


$query = "Update OrderMaster set 
Order_type='$_POST[OrderTypeDropDown]',
Order_sub_type='$_POST[OrderSubTypeDropDown]',
Order_quantity='$_POST[Quantity]',
Order_status='$_POST[OrderStatusDropBox]',
Order_sub_status='$_POST[SubStage]',
Order_cust_name='$_POST[CustomerName]',
Order_email_id='$_POST[CustEmail]',
GCC_email_id='$_POST[GCCEmail]',
Order_cust_ref_num='$_POST[CustRefOrder]',
Order_gcc_ref_num='$_POST[GCC_order_ref_num]',
Order_Status_start_date='$_POST[StartDate]',
Order_Status_end_date='$_POST[EndDate]',
Order_created_by='$_SESSION[user_name]',
Order_modified_by='$_SESSION[user_name]',
Order_testing_agency='$_POST[Testing_Agency]',
Order_start_Date='$_POST[OrderStartDate]',
Order_tent_end_date='$_POST[TentEndDate]',
Order_Spl_comments='$_POST[SpecialComments]',
Order_insp_agency='$_POST[Inspection_agency]',
Order_Creation_Date='$_POST[Order_creation_date]'
where Order_Num='$row[Order_Num]'";

mysql_query($query) or die(mysql_error());


$_SESSION['OrderNo']=$ordernum;


// Read POST request params into global vars

$Custname = $_POST[CustomerName] ;


$email = $_POST[CustEmail];
$gccemail=$_POST[GCCEmail];



$from      = "info@golconda.net" ;
$to    = $email;
$subject = "Order Status Update from Golconda Corrosion Control :$ordernum" ;



$message = "\n\n----- Order Status Update from Golconda Corrosion Control ------\n\n" .

	"Dear $Custname,\n" .
	"Greetings from Golconda Corrision Control team!!\n" .
	"There is a New Status update on the Order you have placed with us!" .
	"Order No : $ordernum \n" .
	"Password : $row[Order_pwd] \n" .
	"Request you to use this Order Number and Password to check the status anytime from our website\n".
	"Regards,\n".
	"GCC Team\n". 



	"\n\n------------------------------------------------------------\n" ;


// Obtain file upload vars
$fileatt      = $_FILES['fileatt']['tmp_name'];
$fileatt_type = $_FILES['fileatt']['type'];
$fileatt_name = $_FILES['fileatt']['name'];

$headers = "From: $from\r\n";
$headers.="CC: $gccemail\r\n";

if (is_uploaded_file($fileatt)) {
  // Read the file to be attached ('rb' = read binary)
  $file = fopen($fileatt,'rb');
  $data = fread($file,filesize($fileatt));
  fclose($file);

  // Generate a boundary string
  $semi_rand = md5(time());
  $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

  // Add the headers for a file attachment
  $headers .= "\nMIME-Version: 1.0\n" .
              "Content-Type: multipart/mixed;\n" .
              " boundary=\"{$mime_boundary}\"";










  // Add a multipart boundary above the plain message
//  $message = "This is a multi-part message in MIME format.\n\n" .
  //           "--{$mime_boundary}\n" .
    //         "Content-Type: text/plain; charset=\"iso-8859-1\"\n" .
      //       "Content-Transfer-Encoding: 7bit\n\n" .
	//     " $message";






  // Base64 encode the file data
  $data = chunk_split(base64_encode($data));

  // Add file attachment to the message
  $message .= "--{$mime_boundary}\n" .
              "Content-Type: {$fileatt_type};\n" .
              " name=\"{$fileatt_name}\"\n" .
              //"Content-Disposition: attachment;\n" .
              //" filename=\"{$fileatt_name}\"\n" .
              "Content-Transfer-Encoding: base64\n\n" .
              $data . "\n\n" .
              "--{$mime_boundary}--\n";



}

// Send the message
if(@mail($to, $subject, $message, $headers))
$_SESSION['MailSuccess']="true";
else
$_SESSION['MailSuccess']="false";

header('Location:OrderDetails.php');



include 'closedb.php';


?>
