<?php
// we must never forget to start the session
session_start();

// is the one accessing this page logged in or not?
$_SESSION['db_is_logged_in']=true;
if (!isset($_SESSION['db_is_logged_in']) 
    || $_SESSION['db_is_logged_in'] !== true) {

    // not logged in, move to login page
    header('Location: login.php');
    exit;
}

?>
<html>
<head>
<title>Golconda Enterprise</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000"  leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >

<table width="100%" border="0" cellspacing="0" cellpadding="0" background="images/topbg.gif">
  <tr>
    <td vAlign=top><img src="images/topside.jpg" width="177" height="59"></td>
    <td align="right" vAlign=top><div align="right"><img src="images/logo1.gif" width="396" height="59"></div>
    </td>
  </tr>
</table>
<table width="100%" cellspacing=0 cllpadding=0 border=0>
<tr>
<td width="153" background="images/sidebg.gif" vAlign=top align=left height="600">

<table width="153" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td vAlign=top align=left><img src="images/side02.gif" width="153" height="24"></td>
  </tr>
  <tr>
    <td><img src="images/trans.gif" width="1" height="6"></td>
  </tr>
  <tr>
    <td align=right height=30><a href="index.html" class="nav"><b>Home</b></a>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/dot.gif" border=0>&nbsp;&nbsp;&nbsp;</td>
  </tr>

  <tr>
    <td align=right height=30><a href="aboutus.html" class="nav"><b>About Us</b></a>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/dot.gif" border=0>&nbsp;&nbsp;&nbsp;</td>
  </tr>

  <tr>
    <td align=right height=30><a href="services.html" class="nav"><b>Services</b></a>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/dot.gif" border=0>&nbsp;&nbsp;&nbsp;</td>
  </tr>

  <tr>
    <td align=right height=30><a href="products.html" class="nav"><b>Products</b></a>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/dot.gif" border=0>&nbsp;&nbsp;&nbsp;</td>
 </tr>

<tr>
    <td align=right height=30><a href="corrosion.html" class="nav"><b>Corrosion</b></a>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/dot.gif" border=0>&nbsp;&nbsp;&nbsp;</td>
  </tr>

<tr>
    <td align=right height=30><a href="contactus.html" class="nav"><b>Contact Us</b></a>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/dot.gif" border=0>&nbsp;&nbsp;&nbsp;</td>
  </tr>

<tr>
    <td align=right height=30><a href="feedback.html" class="nav"><b>Feedback</b></a>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/dot.gif" border=0>&nbsp;&nbsp;&nbsp;</td>
  </tr>

<tr>
    <td align=right height=30><a href="orderstatus.html" class="nav"><b>Order Status</b></a>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/dot.gif" border=0>&nbsp;&nbsp;&nbsp;</td>
  </tr>



</table>

</td>
<td vAlign=top>

<table width="600" border="0" cellspacing="2" cellpadding="6">
  <tr>
	<td vAlign=top>


</td>
</tr>
  <tr>
	<td vAlign=top>


<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="images/h_order.gif" width="600" height="18"></td>
  </tr>
</table>
<br>
<table width="600" border="0" cellspacing="0" cellpadding="0">

 <tr><td><p>&nbsp;</p></td></tr>
  <tr><td class="text">
<p align="center">&nbsp;Enter order details to find out the status of your order.</p>
</td></tr>
</table>
<table width="600" border="0" cellspacing="0" cellpadding="0" height="340">
  <tr><td height="21" width="414" align="right"><p><font face="Verdana" size="1">&nbsp;</font></p></td></tr>

  <tr><td height="21" width="414" align="right"><p><font face="Verdana" size="1">&nbsp;</font></p></td></tr>
  <tr>

    <td valign="top" align="right" height="46" width="414"><font face="Verdana" size="1">Enter
      Order Number :</font></td>
	<td height="46" colspan="2" width="182" align="right">
      <form name="OrderDetails" action="orderdetails.php" method="post">
       <font face="Verdana" size="1">
       <input name="OrderNo" type="text"><br>
       </font>
		

    </td>
  </tr>
  <tr><td rowspan="2" height="46" width="414" align="right"><p align="right"><font face="Verdana" size="1">Enter
      Order Title :&nbsp;</font></p></td><td height="25" colspan="2" width="182" align="right"><p><font face="Verdana" size="1"><input name="OrderTitle" type="text" size="20"></font></p></td></tr>
  <tr><td height="21" colspan="2" width="182" align="right"></td></tr>
  <tr>
        <td valign="middle" align="right" rowspan="2" height="48" width="414"><font face="Verdana" size="1"><span style="mso-ansi-language:EN-US">Design
          Engineering Drawing submission date<o:p>
          </o:p>
          </span>&nbsp;:</font>  </td>
	<td height="27" colspan="2" width="182" align="right">

        <font face="Verdana" size="1">
        <input name="DEDSDate" type="password" size="20">
        </font>
		
    </td>

  </tr>
  <tr>
	<td height="21" colspan="2" width="182" align="right">
    </td>

  </tr>
<tr><td rowspan="2" height="46" width="414" align="right"><p align="right"><font face="Verdana" size="1"><span style="mso-ansi-language:EN-US"><font color="#000000">Design,
    Engineering Drawings Approval date<o:p>
    </o:p>
    :</font></span></font></p></td><td height="25" colspan="2" width="182" align="right"><p><font face="Verdana" size="1"><input name="DEDAdate" type="text" size="20"></font></p></td></tr>
<tr><td height="21" colspan="2" width="182" align="right"></td></tr>
<tr><td height="20" rowspan="2" width="414" align="right">
    <p align="right"><font face="Verdana" size="1">Planned Date of Dispatch :</font></td><td align="right" height="10" colspan="2" width="182">
<font face="Verdana" size="1"><input name="PlanDispDate" type="text" size="20"></font>
      </td></tr>
<tr><td align="right" height="10" colspan="2" width="182">
      </td></tr>
<tr><td height="21" align="right" rowspan="2" width="414"><font face="Verdana" size="1"><span style="mso-ansi-language:EN-US">Procurement
    of raw materials :<o:p>
    </o:p>
    </span></font></td><td align="right" height="11" colspan="2" width="182">
<font face="Verdana" size="1"><input name="ProcOfRawDate" type="text" size="20"></font>
      </td></tr>
<tr><td align="right" height="10" colspan="2" width="182">
      </td></tr>
<tr><td height="21" align="right" rowspan="2" width="414"><font face="Verdana" size="1"><span style="mso-ansi-language:EN-US">Schedule
    of production :</span></font></td><td align="right" height="11" colspan="2" width="182">
<font face="Verdana" size="1"><input name="SchdProdDate" type="text" size="20"></font>
      </td></tr>
<tr><td align="right" height="10" colspan="2" width="182">
      </td></tr>
<tr><td height="21" align="right" rowspan="2" width="414"><span style="mso-ansi-language:EN-US"><font face="Verdana" size="1">Completion
    of production :<o:p>
    </o:p>
    </font></span></td><td align="right" height="11" colspan="2" width="182">
<font face="Verdana" size="1"><input name="CompProdDate" type="text" size="20"></font>
      </td></tr>
<tr><td align="right" height="10" colspan="2" width="182">
      </td></tr>
<tr><td height="29" align="right" rowspan="2" width="414"><span style="mso-ansi-language:EN-US"><font face="Verdana" size="1">Packing
    &amp; Planned dispatch :</font></span></td><td align="right" height="15" colspan="2" width="182">
<font face="Verdana" size="1"><input name="PackandPlanDate" type="text" size="20"></font>
      </td></tr>
<tr><td align="right" height="14" colspan="2" width="182">
      </td></tr>
<tr><td height="29" align="right" rowspan="2" width="414"><span style="mso-ansi-language:EN-US"><font face="Verdana" size="1">Actual
    dispatch date :</font></span></td><td align="right" height="15" colspan="2" width="182">
<font face="Verdana" size="1"><input name="ActualDispDate" type="text" size="20"></font>
      </td></tr>
<tr><td align="right" height="14" colspan="2" width="182">
      </td></tr>
<tr><td height="29" align="right" rowspan="2" width="414"><font face="Verdana" size="1"><span style="font-style: normal; font-variant: normal; mso-list: Ignore; mso-ansi-language: EN-US">&nbsp;<span style="mso-fareast-font-family: Times New Roman; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Airway
    Bill Number / Bill of Lading Number</span></span><span style="mso-fareast-font-family: Times New Roman; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; font-style: normal; font-variant: normal; mso-list: Ignore">&nbsp;
    :</span><span style="mso-ansi-language:EN-US"><o:p>
    </o:p>
    </span></font></td><td align="right" height="15" colspan="2" width="182">
<font face="Verdana" size="1"><input name="BillOfLading" type="text" size="20"></font>
      </td></tr>
<tr><td align="right" height="14" colspan="2" width="182">
      </td></tr>
<tr><td height="29" width="414" rowspan="2">
    <p align="right"><font face="Verdana" size="1">Enter Customer Name:</font></td><td align="left" height="15" width="180" colspan="2">

        <p align="right">
<font face="Verdana" size="1"><input name="CustName" type="text" size="20"></font>
      </td></tr>
<tr><td align="left" height="14" width="180" colspan="2">

      </td></tr>
<tr><td height="29" width="414"><p>&nbsp;</p></td><td align="left" height="29" width="86">

        <input name="submit" type="button"  value="Submit">
      </td><td align="left" height="29" width="94" valign="middle">
<input type="reset" value="Reset" name="B2">
      </td></tr>
</table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br>
</p>

</td>
</tr>
</table>



</body>

</html>

