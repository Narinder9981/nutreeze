<?php 

error_reporting(E_ALL & ~E_NOTICE);

$apiURL = 'https://api.myfatoorah.com';
$apiKey = 'm0l5pwmk8o4IksWjQiYESp3-9fuIBrcAzxLs7Zi8rbXoeQhDdz3dxwvRTV_M1GxiuYf6R5J5BkTlknJ10WwohIkSHgD8QEtYr0AY7xDz5s_u5SH-x2CvjBjy6xWZXfHvb2E-5jYTp7LzRfFIxft4zWXo7s0gb0GVJK2AzcAzZa_luSnYEcsxcbDpxWg9CTOei5aBCjVA5z6WQjbx0kidkRIjilc-5P9xeSFsuuk2euImY4l0RYlm3bpoRhU4SLpAqePeQlOVyRjvBMFD67Hqp5DsCZ0F8h2na9FJ6GtXOfb-5GvfDUTj0_4o6jkEWtAmd48Od3xLdwKsdOpSxuXws5dNG_bmM9i54jSt2O-I8oL2lcweBZV6N4U2LwnduQTbTKtu7l59cWrOQbhQ-m8-o63kcKD-rB1cDf9Ed7p-ruC87q0HfK4WZ1IsIzOeZvsVpHObtAsm5nGcAnL4A0o2lL3WuzrUapKUGoabtht49mrWKAX0A2BRJUY1oZs7v4_QXseOADW8RmgUA8WghzXJjmAohKSz0QrLLljOt0bwZYe7CQ4mWTbYDjo8E9clm27qEAu9E7jfl3j2bOIwSbuJocHdhPmUv3f3xJPH57QCRFNM-crEOsSRFlQ7l_03sE3JoZkagDQjRlmW_bexYO8ycD5Wb5oDSVJxxuTs5R150fUwQQQxQaLhmLgIc6_R9l3NpeK_QA';


function db_connect() {

    //enter your MySQL database host name, often it is not necessary to edit this line
    $db_host = "localhost";
    //enter your MySQL database username
    $db_username = "appuser";
    //enter your MySQL database password
    $db_password = "Admin@1234";
    //enter your MySQL database name
    $db_name = "lifestyle";

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



function callAPI($endpointURL, $apiKey, $postFields = []) {

    $curl = curl_init($endpointURL);
    curl_setopt_array($curl, array(
        CURLOPT_CUSTOMREQUEST  => 'POST',
        CURLOPT_POSTFIELDS     => json_encode($postFields),
        CURLOPT_HTTPHEADER     => array("Authorization: Bearer $apiKey", 'Content-Type: application/json'),
        CURLOPT_RETURNTRANSFER => true,
    ));

    $response = curl_exec($curl);
    $curlErr  = curl_error($curl);

    curl_close($curl);

    if ($curlErr) {
        //Curl is not working in your server
        die("Curl Error: $curlErr");
    }

    $error = handleError($response);
    if ($error) {
        die("Error: $error");
    }

    return json_decode($response);
}

//------------------------------------------------------------------------------
/*
 * Handle Endpoint Errors Function 
 */

function handleError($response) {

    $json = json_decode($response);
    if (isset($json->IsSuccess) && $json->IsSuccess == true) {
        return null;
    }

    //Check for the errors
    if (isset($json->ValidationErrors) || isset($json->FieldsErrors)) {
        $errorsObj = isset($json->ValidationErrors) ? $json->ValidationErrors : $json->FieldsErrors;
        $blogDatas = array_column($errorsObj, 'Error', 'Name');

        $error = implode(', ', array_map(function ($k, $v) {
                    return "$k: $v";
                }, array_keys($blogDatas), array_values($blogDatas)));
    } else if (isset($json->Data->ErrorMessage)) {
        $error = $json->Data->ErrorMessage;
    }

    if (empty($error)) {
        $error = (isset($json->Message)) ? $json->Message : (!empty($response) ? $response : 'API key or API URL is not correct');
    }

    return $error;
}
if(isset($_GET['paymentId'])){
        
$keyId   = $_GET['paymentId'];
$KeyType = 'paymentId';
//Inquiry using invoiceId 
/*$keyId   = '613842';
$KeyType = 'invoiceId';*/

//Fill POST fields array
$postFields = [
    'Key'     => $_GET['paymentId'],
    'KeyType' => $KeyType
];
//Call endpoint

$json       = callAPI("$apiURL/v2/getPaymentStatus", $apiKey, $postFields);

    //  print_r($json);die;
        if($json->Data->InvoiceStatus && $json->Data->InvoiceStatus!= 'Paid' ){  //failed transaction
                  
            $fielderrorurl='result.php';            
            $ResponseMessage ='Transaction Failed';   
            // If Order have Coupon then remove that coupon from usage History
            $order_id = $json->Data->CustomerReference;
            $fQuery = "SELECT * FROM `order_master`  where order_master_id = ".$order_id." and is_deleted = 0 ";
            $connection = db_connect();
            $fResult = mysqli_query($connection, $fQuery) or die(mysqli_error($connection));
            $fCount = mysqli_fetch_assoc($fResult);
            $promo_code_discount = 0 ; 
            if($fCount['order_master_id'] == $json->Data->CustomerReference){
                $promo_code_discount = $fCount['promo_code_discount'];
                $UpdateQuery = "UPDATE `coupon_usage_history` SET is_deleted = 1 where order_id = " .  $order_id;
                $UpdateResult = db_query($UpdateQuery);
            }
            header("location:".$fielderrorurl.$returnvals."?id=" . $returnId . "&msg=" . $ResponseMessage);
            exit();
        }else{
            

            if($json->Data->InvoiceStatus&& $json->Data->InvoiceStatus == 'Paid' ){  //success transaction
                #update Db here
                $PayTxnID = $_GET['paymentId'];
                $ReferenceNumber = $json->Data->InvoiceReference ;
                $Paymode = $json->Data->PaymentGateway;                
                $invoice_id = $json->Data->InvoiceId;              
                $CustomerEmail = $json->Data->CustomerEmail;                
                $packageDetails = $json->Data->InvoiceItems;              
                $package_name = '';
                $amt = $json->Data->InvoiceDisplayValue;
              if(!empty($packageDetails) && !empty($packageDetails[0]->ItemName)){
                    $package_name = $packageDetails[0]->ItemName;
                }
               $udf1 = $json->Data->CustomerReference;           
                $udf2 = $json->Data->InvoiceDisplayValue;                
                $Result = "Success";
                $Paymode=''; 
                foreach($json->Data->InvoiceTransactions as $inv){
                    if($inv->TransactionStatus=='Succss'){
                        $Paymode = $inv->PaymentGateway;
                    }
                } 
                //echo $Paymode;die;              
                $insert = "INSERT INTO `transcation_master`( `transaction_code`,reference_no, `payment_mode`, `transaction_date`, `is_deleted`, `transaction_status`,`invoice_id`)"
                        . " VALUES ('".@$PayTxnID."','$ReferenceNumber','".@$Paymode."','".date('Y-m-d h:i:s')."',0,'success','".$invoice_id."')";
                 
                $insert_id = db_query($insert); 
                if($package_name != 'upgradePackage'){
                   // $insert_id = mysqli_insert_id();
                    $sqlqry = "UPDATE order_master SET transaction_id ='" . $insert_id . "', order_status='success' where order_master_id ='" . @$json->Data->CustomerReference. "'";
                    $result = db_query($sqlqry);
                    $ResponseMessage = "Transaction Successfull.";
                
                }else{
                     $fQuery = "SELECT * FROM `order_package_upgrade_history`  where order_master_id = ". @$json->Data->CustomerReference." and is_deleted = 0  and added_flag = 'upgrade' order_by created_datetime DESC limit 0,1 ";
                    $connection = db_connect();
                    $fResult = mysqli_query($connection, $fQuery) or die(mysqli_error($connection));
                    $fCount = mysqli_fetch_assoc($fResult);

                    $sqlqry = "UPDATE order_package_upgrade_history SET transaction_id ='" . $insert_id . "', payment_status='success' where order_id ='" . @$json->Data->CustomerReference. "' and added_flag = 'upgrade' order_by created_datetime DESC limit 0,1 ";
                    $result = db_query($sqlqry);
                    $ResponseMessage = "Transaction ( of upgrade ) Successfull.";
                }
                #diaplay Table here done                
                $fielderrorurl='result.php';
                
                header("location:".$fielderrorurl.$returnvals."?Result=PAID&ReferenceNumber=" . $ReferenceNumber . "&msg=" .$ResponseMessage."&PayTxnID=".$PayTxnID."&udf1=".$udf1."&udf2=".$udf2."&Paymode=".$Paymode."&package_name=".$package_name."&CustomerEmail=".$CustomerEmail."&Amount=".$amt); 

            }else{
                $ReferenceNumber = !empty($json->Data->ReferenceId) ? $json->Data->ReferenceId: 0 ;
                $fielderrorurl='result.php';
                $ResponseMessage ='Transaction Failed'; 
                
               
                header("location:".$fielderrorurl.$returnvals."?id=" . $returnId . "&msg=" . $ResponseMessage."&Result=NOTCAPTURED&=ReferenceNumber".$ReferenceNumber); 
                exit();               
            }
        }
    }
?>