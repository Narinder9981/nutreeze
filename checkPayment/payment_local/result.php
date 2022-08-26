<?php

error_reporting(E_ALL & ~E_NOTICE);

include('settings.php');

if(!empty($_GET)) extract($_GET);

if(!empty($_POST)) extract($_POST); 


echo "<table width='70%' align='center'  border='0' cellspacing='0' cellpadding='5' style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size:12px; border:double;	border-color:#ccc; padding:20px 10px;'>

				  <tr>

					<td colspan='4' align='center'   style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size:14px;'><strong class='text'>$webappname Transaction Details</strong></td>

					</tr>

				  <tr>

					<td colspan='4' align='left'>&nbsp;</td>

				  </tr>

				  <tr>

					<td colspan='4' align='left'  style='padding-left: 10px;'><p> <br>   

					  Reference Number :". @$ReferenceNumber ."</p>

					  <p> ResponseCode :". @$ResponseCode."</p>             

					  <p> PayTxnID :". @$PayTxnID."  </p>

					  <p> ResponseMessage :".  @$ResponseMessage  ." </p>

					  <p> Paymode :". @$Paymode  ."   </p>

					  <p> PayTxnID :".  @$PayTxnID  ." </p>

					  <p> Result :".  @$Result ."   </p>

					   

					  <p> Message:".  @$msg ."   </p>

					  <p> Order Track ID:".  @$udf1 ."   </p>

					   <p> Order Amount:".  @$udf2 ." KWD   </p>

					</td>

				  </tr>

				  <tr>

					<td width='20%'>&nbsp;</td>

					<td width='28%'>&nbsp;</td>

					<td width='26%'>&nbsp;</td>

					<td width='26%'>&nbsp;</td>

				  </tr>

				  </table>";

				  
function db_connect() {

    //enter your MySQL database host name, often it is not necessary to edit this line
    $db_host = "localhost";
    //enter your MySQL database username
    $db_username = "root";
    //enter your MySQL database password

    $db_password = "";
    //enter your MySQL database name
    $db_name = "muscle_fuel_v1";


    $connection = mysqli_connect($db_host, $db_username, $db_password, $db_name);
    //mysql_set_charset('utf8',$connection);
    date_default_timezone_set('Asia/Kuwait');




    // If connection was not successful, handle the error
    if ($connection === false) {
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        return mysqli_connect_error();
    } else {
        return $connection;
    }
}

function db_query($query) {
    // Connect to the database
    $connection = db_connect();

    // Query the database
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    return mysqli_insert_id($connection);
}

if (@$result == "CAPTURED") {
    $insert = "INSERT INTO `transcation_master`( `transaction_code`, `payment_mode`, `transaction_date`, `is_deleted`, `transaction_status`)"
            . " VALUES ('".@$PayTxnID."','".@$Paymode."','".date('Y-m-d h:i:s')."',0,'success')";
    $insert_id = db_query($insert);
   // $insert_id = mysqli_insert_id();
    $sqlqry = "UPDATE order_master SET transaction_id ='" . $insert_id . "', order_status='success' where order_id_app ='" . @$udf1 . "'";
    $result = db_query($sqlqry);
}else{
    $insert1 = "INSERT INTO `transcation_master`( `transaction_code`, `payment_mode`, `transaction_date`, `is_deleted`, `transaction_status`)"
            . " VALUES ('".@$PayTxnID."','".@$Paymode."','".date('Y-m-d h:i:s')."',0,'failed')";
    db_query($insert1);
}
				  ?>