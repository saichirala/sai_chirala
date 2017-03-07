<?php
// we must never forget to start the session
session_start(); 
$errorMessage = '';

// check if the user id and password combination is correct

//import library
include 'configdb.php';
include 'opendb.php';

//check in database
srand(time());
$random = (rand()%100000)+654321;


$query = "insert into OrderMaster(Order_pwd,
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
Order_testing_agency,
Order_start_Date,
Order_tent_end_date,
Order_Spl_comments,Order_insp_agency) VALUES ('$random', '$_POST[OrderTypeDropDown]','$_POST[OrderSubTypeDropDown]','$_POST[Quantity]','$_POST[OrderStatusDropBox]','$_POST[SubStage]',
'$_POST[CustomerName]','$_POST[CustEmail]','$_POST[GCCEmail]','$_POST[CustRefOrder]','$_POST[GCC_order_ref_num]','$_POST[StartDate]','$_POST[EndDate]','$_SESSION[user_name]','$_SESSION[user_name]',
'$_POST[Testing_Agency]','$_POST[OrderStartDate]','$_POST[TentEndDate]','$_POST[SpecialComments]','$_POST[Inspection_agency]')";

mysql_query($query) or die(mysql_error());

$New_order_num=mysql_insert_id();

$_SESSION['OrderNo']=$New_order_num;
$_SESSION['Passwd']=$random;

// Read POST request params into global vars

$Custname = $_POST[CustomerName] ;


$email = $_POST[CustEmail];
$gccemail=$_POST[GCCEmail];



$from      = "info@golconda.net" ;
$to    = $email;
$subject = "Order Status from Golconda Corrosion Control :$New_order_num" ;



$message = "\n\n----- Order Status Update from Golconda Corrosion Control ------\n\n" .

	"Dear $Custname,\n" .
	"Greetings from Golconda Corrision Control team!!\n" .
	"Here are the details of the new order number and password which are created as per order you have placed with us.\n" .
	"Order No : $New_order_num\n" .
	"Password : $random\n" .
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
