<?php
// we must never forget to start the session
session_start();

// is the one accessing this page logged in or not?

if (!isset($_SESSION['db_is_logged_in']) 
    || $_SESSION['db_is_logged_in'] !== true) {

    // not logged in, move to login page
    header('Location: Employeelogin.php');
    exit;
}


?>
<html>
<head>
<title>Golconda Corrosion Control -Corrosion Protection|Anode Suppliers</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="style.css" type="text/css">
<SCRIPT LANGUAGE="JavaScript">
<!--
function validate(frm) {
  //Check Order Quanity
   
 if (frm.Quantity.value.length == 0)
    {
        alert("Please Enter Order Quantity--Numeric")
        frm.Quantity.focus()
        return false
    }
 if (frm.OrderSubTypeDropDown.value == "Select")
    {
        alert("Please choose Order Subtype")
        frm.OrderSubTypeDropDown.focus()
        return false
    }
 if (frm.OrderStartDate.value.length == 0)
    {
        alert("Please choose Order Start Date")
        frm.OrderStartDate.focus()
        return false
    }

 if (frm.TentEndDate.value.length == 0)
    {
        alert("Please choose Order Tentative End Date")
        frm.TentEndDate.focus()
        return false
    }
 if (frm.StartDate.value.length == 0)
    {
        alert("Please choose Current Status Start Date")
        frm.StartDate.focus()
        return false
    }
 if (frm.EndDate.value.length == 0)
    {
        alert("Please choose Current Status End Date")
        frm.EndDate.focus()
        return false
    }
 if (frm.CustEmail.value.length == 0)
    {
        alert("Please Enter Email Address Of the Customer")
        frm.CustEmail.focus()
        return false
    }
 if (frm.GCCEmail.value.length == 0)
    {
        alert("Please Enter Email Address Of atleast one of the GCC Members")
        frm.GCCEmail.focus()
        return false
    }
if (frm.CustomerName.value.length == 0)
    {
        alert("Please Enter Customer Name")
        frm.CustomerName.focus()
        return false
    }
if (frm.CustRefOrder.value.length == 0)
    {
        alert("Please Enter Customer Reference Order---NA--if Not Applicable")
        frm.CustRefOrder.focus()
        return false
    }
if (frm.GCC_order_ref_num.value.length == 0)
    {
        alert("Please Enter GCC Reference Order---NA--if Not Applicable")
        frm.GCC_order_ref_num.focus()
        return false
    }

return true

}
//-->
</SCRIPT>





<script language="javascript">

function enableSubStage()
{
var Status=document.AddOrder.OrderStatusDropBox.selectedIndex;

if (Status===4){
document.AddOrder.SubStage.disabled=false;}
}
function disableSubStage()
{
document.AddOrder.SubStage.disabled=true;
}
function disableSubmit()
{ document.AddOrder.Submit.disabled=true;
 } 
 
</script>
<!-- Loading Theme file(s) -->
    <link rel="stylesheet" href="http://www.zapatec.com/website/main/../ajax/zpcal/themes/fancyblue.css" />

<!-- Loading Calendar JavaScript files -->
    <script type="text/javascript" src="http://www.zapatec.com/website/main/../ajax/zpcal/../utils/zapatec.js"></script>
    <script type="text/javascript" src="http://www.zapatec.com/website/main/../ajax/zpcal/src/calendar.js"></script>
<!-- Loading language definition file -->
    <script type="text/javascript" src="http://www.zapatec.com/website/main/../ajax/zpcal/lang/calendar-en.js"></script>
</head>
<body bgcolor="#FFFFFF" text="#000000"  leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="disableSubStage();">








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
  <?php
   include 'Nav.html';
 ?>

</table>

</td>
<td vAlign=top>

<table width="600" border="0" cellspacing="2" cellpadding="6" bordercolor="#FFFFFF">
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

 <tr><td class="text" align="left"><p>
<?php
echo "Welcome  <b>{$_SESSION['user_name']}</b>";

echo "                    					Your  Role is <i>{$_SESSION['user_role']}</i>";?></p></td></tr>

</table>
</form><br>
<hr>

<table border="0" cellpadding="0" cellspacing="0" width="791" height="567" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
<form method="POST" action="NewOrder.php" name="AddOrder" onSubmit="return validate(AddOrder)">
  <tr>
    <td width="211" height="30" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font face="Arial" size="1" color="#003399"><b>Order  Type</b></font></td>
    <td width="175" height="30" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font face="Arial" size="1"><b><select size="1" name="OrderTypeDropDown">
        <option>Material Supply</option>
        &nbsp;
        </select>
      <br>
      </b></font></td>
    <td width="201" height="61" valign="top" align="left" bgcolor="#9AC7F8" rowspan="2" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <p align="left"><font size="1"><b><font color="#003399" face="Arial"><br>
      Quantity
      Of Material</font><font color="#000080"> </font></b></font>
      <p align="left">
      <font size="1"><b><br>
      </b></font>
      </p>
    </td>
    <td width="200" height="61" valign="top" align="left" bgcolor="#9AC7F8" rowspan="2" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <font size="1"><b><font face="Arial" size="1"><br>
      <!--webbot bot="Validation" S-Display-Name="Quantity"
      B-Value-Required="TRUE" I-Minimum-Length="1" --><input type="text" name="Quantity" size="20">
      </font></b></font>
    </td>
  </tr>
  <tr>
    <td width="178" height="31" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font color="#003399" face="Arial" size="1"><b>Order
      Sub Type</b></font></td>
    <td width="208" height="31" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font size="1"><b><select size="1" name="OrderSubTypeDropDown">
          <option value="Select">Select</option>
          <option>Anodes</option>
          <option>Transformer Rectifiers</option>
          <option>Junction Boxes</option>
          <option>Test Stations</option>
          <option>Cables</option>
          <option>Reference Electrodes</option>
          <option>Others</option>
          &nbsp;
          </select><br>
      </b></font></td>
  </tr>
  <tr>
    <td width="211" height="30" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><b><font face="Arial" size="1" color="#003399">Status of
      Order</font></b></td>
    <td width="175" height="30" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><b><font size="1"><select size="1" name="OrderStatusDropBox" onChange="enableSubStage()">
        <option>Select</option>
        <option>Document Approval</option>
        <option>Material Procurement</option>
        <option>Inspection Activity</option>
        <option>Production</option>
        <option>Inspection Report Approval</option>
        <option>Material Dispatch</option>
        <option>Delivered to Customer</option>
        <option>Order Closed</option>
      </select><br>
      </font></b></td>
    <td width="201" height="30" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <p align="left"><b><font face="Arial" size="1" color="#003399">Sub Stage(
      Production) </font></b></td>
    <td width="200" height="30" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <b><font face="Arial" size="1"><select size="1" name="SubStage">
        <option>Select</option>
        <option>Witness</option>
        <option>Testing and Finishing</option>
        <option>Final Inspection</option>
      </select></font></b></td>
  </tr>
  <tr>
    <td width="210" height="33" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font size="1" color="#003399"><b>
      <font face="Arial">Order Start Date </font>&nbsp;</b></font></td>
    <td width="174" height="33" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font size="1" color="#003399"><b><input type="text" id="calendar2" name="OrderStartDate" />
    <button id="trigger2">D</button>
    <script type="text/javascript">//<![CDATA[
      Zapatec.Calendar.setup({
        firstDay          : 1,
        electric          : false,
        inputField        : "calendar2",
        button            : "trigger2",
        ifFormat          : "%Y-%m-%d %H:%M",
        daFormat          : "%Y/%m/%d"
      });
    //]]>
    </script>

      <br/>
      </b></font></td>
    <td width="201" height="33" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font size="1" color="#003399"><b>
      <font face="Arial">Tentative Order
      End Date</font>&nbsp; <br/>
      </b></font>
</td>
    <td width="200" height="33" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font size="1" color="#003399"><b><input type="text" id="calendar3" name="TentEndDate" />
    <button id="trigger3">D</button>
    <script type="text/javascript">//<![CDATA[
      Zapatec.Calendar.setup({
        firstDay          : 1,
        electric          : false,
        inputField        : "calendar3",
        button            : "trigger3",
        ifFormat          : "%Y-%m-%d %H:%M",
        daFormat          : "%Y/%m/%d"
      });
    //]]>
    </script>

      &nbsp;
      </b></font>
</td>
  </tr>
<tr>
    <td width="193" height="49" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font size="1" color="#003399"><b><font face="Arial">
 Current Status Start Date<br></td> <td width="193" height="49" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
 <font color="#003399" size="1"><b> <input type="text" id="calendar1" name="StartDate" />
    <button id="trigger1">D</button>
      <script type="text/javascript">//<![CDATA[
      Zapatec.Calendar.setup({
        firstDay          : 1,
        electric          : false,
        inputField        : "calendar1",
        button            : "trigger1",
        ifFormat          : "%Y-%m-%d %H:%M",
        daFormat          : "%Y/%m/%d"
      });
    //]]></script>
   &nbsp;</b></font></td>
    <td width="201" height="49" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font size="1" color="#003399"><b><font face="Arial"><br>
      Current Status
      End Date</font>&nbsp;&nbsp;</b></font>
</td>
    <td width="200" height="49" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font size="1" color="#003399"><b> <input type="text" id="calendar" name="EndDate" />
    <button id="trigger">D</button>
    <script type="text/javascript">//<![CDATA[
      Zapatec.Calendar.setup({
        firstDay          : 1,
        electric          : false,
        inputField        : "calendar",
        button            : "trigger",
        ifFormat          : "%Y-%m-%d %H:%M",
        daFormat          : "%Y/%m/%d"
      });
    //]]>
    </script>

      &nbsp;</b></font>
</td>
</tr>
  <tr>
    <td width="384" height="27" valign="top" align="center" colspan="2" bgcolor="#FFFFFF" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      &nbsp;
    </td>
    <td width="401" height="27" valign="top" align="right" colspan="2" bgcolor="#FFFFFF" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      &nbsp;
    </td>
  </tr>
  <tr>
    
<td width="201" height="53" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <p align="left"><b><font face="Arial" size="1" color="#003399">Customer Name</font></b></p>
    </td>
  <td width="200" height="53" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <p align="left"><font face="Arial" size="1" color="#003399"><input type="text" name="CustomerName" size="20"></font></td>

<td width="192" height="53" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><b><font color="#003399" size="1" face="Arial">Email
      Id</font></b></td>
    <td width="192" height="53" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <p align="left"><font face="Arial" size="1" color="#003399"><input type="text" name="CustEmail" size="20"></font></td>
    
  
  </tr>

  <tr>
    <td width="227" height="50" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><b><font face="Arial" size="1" color="#003399">Customer
      Ref Order Num<br>
      <br>
      </font></b></td>
    <td width="157" height="50" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <font face="Arial" size="1" color="#003399"><input type="text" name="CustRefOrder" size="20"></font></td>
    <td width="201" height="50" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <p align="left"><b><font face="Arial" size="1" color="#003399">GCC
      Ref Order Num<br>
      </font></b></td>
    <td width="200" height="50" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <p align="left">
      <font face="Arial" size="1" color="#003399"><input type="text" name="GCC_order_ref_num" size="20"></font></td>
  </tr>
  <tr>
    <td width="227" height="42" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><b><font color="#003399" size="1" face="Arial">Testing Agency(If Applicable)</font></b></td>
    <td width="157" height="42" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <font face="Arial" size="1" color="#003399"><input type="text" name="Testing_agency" size="20"></font></td>
    <td width="201" height="42" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <p align="left"><b><font color="#003399" size="1" face="Arial">Inspection Agency(If Applicable)</font></b></td>
    <td width="200" height="42" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <p align="left"><font face="Arial" size="1" color="#003399"><input type="text" name="Inspection_agency" size="20"></font></td>
  </tr>
<tr><td width="192" height="53" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><b><font color="#003399" size="1" face="Arial">GCC Email
      Id(Enter comma separated incase of multiple email ids)</font></b></td>
    <td width="192" height="53" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <p align="left"><font face="Arial" size="1" color="#003399"><input type="text" name="GCCEmail" size="20"  value="" ></font></td></tr>
<tr>
    <td width="227" height="42" valign="top" align="center" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><b><font face="Arial" size="2"><br>
      </font></b></td>
    <td width="157" height="42" valign="top" align="left" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
    </td>
    <td width="401" height="42" valign="top" align="right" colspan="2" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"></td>
  </tr>

  <tr>
    <td width="785" height="116" valign="top" align="center" colspan="4" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font face="Arial" size="2"><b>Special Comments for this Order:<br></b></font>
<textarea name="SpecialComments" cols=45 rows=4></textarea></td>
  </tr>
  <tr>
    <td width="227" height="24" valign="top" align="center" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"></td>
    <td width="157" height="24" valign="top" align="left" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
    <input type="submit" value="Add Order" name="Submit">
    </td>
    <td width="401" height="24" valign="top" align="right" colspan="2" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <p align="left"><input type="reset" value="Clear" name="Reset"></td>
  </tr>
<tr>

   </form>
   </table>
</td>
</tr>
</table>

<a href="GetModifyOrder.php"><b><font size="2">Modify Exisitng Order Status</font></b></a>
<? if($_SESSION['user_role'] == 'MGT')
echo "<br><font size=2><a href=OrderDetails.php>Management Home</font></a><br>";?>


</body>
