<?php
// we must never forget to start the session
session_start();

// is the one accessing this page logged in or not?

if (!isset($_SESSION['db_is_logged_in']))
{

    // not logged in, move to login page
  header('Location: Employeelogin.php');
  exit;
}

include 'configdb.php';
include 'opendb.php';

if(isset($_POST[OrderNo]))
{

//echo "Order num is";
//echo $_POST[OrderNo];
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
Order_testing_agency,Order_start_Date,Order_tent_end_date,Order_Spl_comments,Order_insp_agency,order_creation_date from OrderMaster where Order_Num='$_POST[OrderNo]'";

$result=mysql_query($sql) or die('Query failed'.mysql_error());

if (mysql_num_rows($result) == 1) {
      // the Order_id and password match, 
      // set the session
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
}
else
{
$_SESSION[invalidOrder]="true";
header("location:GetModifyOrder.php");
exit;
}
}
include 'closedb.php';

?>
<html>
<head>
<title>Golconda Corrosion Control -Corrosion Protection|Anode Suppliers</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="style.css" type="text/css">
<SCRIPT LANGUAGE="JavaScript">

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

input_box=confirm("Press Ok to save the modifications/Cancel to modify further");
if (input_box==true)

{ 
alert("Modificaitons will be Saved");
return true;
}

else
{
return false;
}
}


</script>






<script language="javascript">

function enableSubStage()
{
var Status=document.ExistingOrder.OrderStatusDropBox.selectedIndex;

if (Status==4){
document.ExistingOrder.SubStage.disabled=false;}
else {
document.ExistingOrder.SubStage.value="";
document.ExistingOrder.SubStage.disabled=true;
}
}
function disableSubStage()
{
if(document.ExistingOrder.OrderStatusDropBox.selectedIndex !=4)
document.ExistingOrder.SubStage.value="";
document.ExistingOrder.SubStage.disabled=true;
}
function disableSubmit()
{ document.ExistingOrder.Submit.disabled=true;
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

 <tr><td class="text" align="left"><p>
<?php
echo "Welcome  <b>{$_SESSION['user_name']}</b>";

echo "&nbsp&nbsp&nbsp Your  Role is <i>{$_SESSION['user_role']}</i>";?></p></td></tr>

</table>
</form><br>
<hr>

<table border="0" cellpadding="0" cellspacing="0" width="791" height="486">
<form method="POST" action="ExistingOrder.php" name="ExistingOrder" onSubmit="return validate(ExistingOrder)">
<tr>
<td align=Center><font face="Arial" size="2"><font color="#000080"><b>Order Number</font><br></b>
      <br clear="all">
      </font></b>
</td>
<td width="179" height="50" valign="top" align="left">
   
        <? echo $row[Order_Num]?><input type=hidden name='OrderNumber' value="<? echo $row[Order_Num] ?>;">
</td>
</tr>
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
      B-Value-Required="TRUE" I-Minimum-Length="1" --><input type="text" name="Quantity" value="<? echo $row[Order_quantity];?>" size="20">
      </font></b></font>
    </td>
  </tr>
  <tr>
    <td width="178" height="31" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font color="#003399" face="Arial" size="1"><b>Order
      Sub Type</b></font></td>
    <td width="208" height="31" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font size="1"><b><select size="1" name="OrderSubTypeDropDown">
         
          <option selected><? echo $row[Order_sub_type];?></option>
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
        <option Selected><? echo $row[Order_status];?></option>
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
       <option><? echo $row[Order_sub_status];?></option>
        <option>Witness</option>
        <option>Testing and Finishing</option>
        <option>Final Inspection</option>
      </select></font></b></td>
  </tr>
  <tr>
    <td width="210" height="33" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font size="1" color="#003399"><b>
      <font face="Arial">Order Start Date </font>&nbsp;</b></font></td>
    <td width="174" height="33" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font size="1" color="#003399"><b><input type="text" id="calendar2" name="OrderStartDate" value="<? echo $row[Order_start_Date];?>"/>
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
    <td width="200" height="33" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font size="1" color="#003399"><b><input type="text" id="calendar3" name="TentEndDate" value="<? echo $row[Order_tent_end_date];?>"  />
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
 <font color="#003399" size="1"><b> <input type="text" id="calendar1" name="StartDate" value="<? echo $row[Order_Status_start_date];?>"/>
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
    <td width="200" height="49" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font size="1" color="#003399"><b> <input type="text" id="calendar" name="EndDate" value="<? echo $row[Order_Status_end_date];?>"/>
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
      <p align="left"><font face="Arial" size="1" color="#003399"><input type="text" name="CustomerName" size="20" value="<? echo $row[Order_cust_name];?>"></font></td>

<td width="192" height="53" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><b><font color="#003399" size="1" face="Arial">Customer Email
      Id</font></b></td>
    <td width="192" height="53" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <p align="left"><font face="Arial" size="1" color="#003399"><input type="text" name="CustEmail" size="20"  value="<? echo $row[Order_email_id];?>"></font></td>
    
  
  </tr>
  <tr>
    <td width="227" height="50" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><b><font face="Arial" size="1" color="#003399">Customer
      Ref Order Num<br>
      <br>
      </font></b></td>
    <td width="157" height="50" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <font face="Arial" size="1" color="#003399"><input type="text" name="CustRefOrder" size="20" value="<? echo $row[Order_cust_ref_num];?>"></font></td>
    <td width="201" height="50" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <p align="left"><b><font face="Arial" size="1" color="#003399">GCC
      Ref Order Num<br>
      </font></b></td>
    <td width="200" height="50" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <p align="left">
      <font face="Arial" size="1" color="#003399"><input type="text" name="GCC_order_ref_num" size="20" value="<? echo $row[Order_gcc_ref_num];?>"></font></td>
  </tr>
  <tr>
    <td width="227" height="42" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><b><font color="#003399" size="1" face="Arial">Testing Agency(If Applicable)</font></b></td>
    <td width="157" height="42" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <font face="Arial" size="1" color="#003399"><input type="text" name="Testing_agency" size="20"  value="<? echo $row[Order_testing_agency];?>"></font></td>
    <td width="201" height="42" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <p align="left"><b><font color="#003399" size="1" face="Arial">Inspection Agency(If Applicable)</font></b></td>
    <td width="200" height="42" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <p align="left"><font face="Arial" size="1" color="#003399"><input type="text" name="Inspection_agency" size="20"  value="<? echo $row[Order_insp_agency];?>"></font></td>
  </tr><tr><td width="192" height="53" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><b><font color="#003399" size="1" face="Arial">GCC Email
      Id(Enter comma separated incase of multiple email ids)</font></b></td>
    <td width="192" height="53" valign="top" align="left" bgcolor="#9AC7F8" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
      <p align="left"><font face="Arial" size="1" color="#003399"><input type="text" name="GCCEmail" size="20"  value="<? echo $row[GCC_email_id];?>"></font></td></tr>
<tr>
    <td width="227" height="42" valign="top" align="center" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><b><font face="Arial" size="2"><br>
      </font></b></td>
    <td width="157" height="42" valign="top" align="left" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
    </td>
    <td width="401" height="42" valign="top" align="right" colspan="2" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"></td>
  </tr>

  <tr>
    <td width="785" height="116" valign="top" align="center" colspan="4" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"><font face="Arial" size="2"><b>Special Comments for this Order:<br></b></font>
<textarea name="SpecialComments" cols=45 rows=4><? echo $row[Order_Spl_comments];?></textarea></td>
  </tr>
  <tr>
    <td width="227" height="24" valign="top" align="center" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8"></td>
    <td width="157" height="24" valign="top" align="left" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9AC7F8">
    <input type="submit" value="Modify Order" name="Submit">
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
<p class=text>
<a href="AddOrder.php"><b>Add a new Order</b></a>
<? if($_SESSION['user_role'] == 'MGT')
echo "<br><a href=OrderDetails.php>Management Home</a><br>";?>
</p>


</body>

</html>
