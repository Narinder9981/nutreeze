<?php 

error_reporting(E_ALL & ~E_NOTICE);

include('settings.php');

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

if(isset($_GET['paymentId'])){
         $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,'https://apidemo.myfatoorah.com/Token');
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array('grant_type' => 'password','username' => $merchantusername,'password' => $merchantpassword)));
        $result = curl_exec($curl);
        $error= curl_error($curl);
        $info = curl_getinfo($curl);
        curl_close($curl);
        $json = json_decode($result, true);
        $access_token= $json['access_token'];
        $token_type= $json['token_type'];
       if(isset($_GET['paymentId']))
        {
            $id=$_GET['paymentId'];
        }
        $password= $merchantpassword;
        $url = 'https://apidemo.myfatoorah.com/ApiInvoices/Transaction/'.$id;
        $soap_do1 = curl_init();
        curl_setopt($soap_do1, CURLOPT_URL,$url );
        curl_setopt($soap_do1, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($soap_do1, CURLOPT_TIMEOUT, 10);
        curl_setopt($soap_do1, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($soap_do1, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($soap_do1, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($soap_do1, CURLOPT_POST, false );
        curl_setopt($soap_do1, CURLOPT_POST, 0);
        curl_setopt($soap_do1, CURLOPT_HTTPGET, 1);
        curl_setopt($soap_do1, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Accept: application/json','Authorization: Bearer '.$access_token));
        $result_in = curl_exec($soap_do1);
        $err_in = curl_error($soap_do1);
        $file_contents = htmlspecialchars(curl_exec($soap_do1));
        curl_close($soap_do1);
        $getRecorById = json_decode($result_in, true);
        
        $udf1 = $getRecorById['ApiCustomFileds'] ; 
        $order_id = $udf1 ;
        $fQuery = "SELECT * FROM `order_master`  where order_master_id = ".$order_id." and is_deleted = 0 ";
        $connection = db_connect();
        $fResult = mysqli_query($connection, $fQuery) or die(mysqli_error($connection));
        $fCount = mysqli_fetch_assoc($fResult);
        $promo_code_discount = 0 ; 
        if($fCount['order_master_id'] == $order_id){
            $promo_code_discount = $fCount['promo_code_discount'];
            $UpdateQuery = "UPDATE `coupon_usage_history` SET is_deleted = 1 where order_id = " .  $order_id;
            $UpdateResult = db_query($UpdateQuery);
        }
        
        if(isset($getRecorById['TransactionStatus']) && $getRecorById['TransactionStatus'] == 3 ){  //failed transaction
            
            $fielderrorurl='result.php';            
            $ResponseMessage ='Transaction Failed';            
            header("location:".$fielderrorurl.$returnvals."?id=" . $returnId . "&msg=" . $ResponseMessage); 
            
            exit();
        }else{
            $fielderrorurl='result.php';            
            $ResponseMessage ='Transaction Failed';
            header("location:".$fielderrorurl.$returnvals."?id=" . $returnId . "&msg=" . $ResponseMessage); 
            
            exit();
        }
    }
?>
