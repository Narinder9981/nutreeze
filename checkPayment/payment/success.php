<?php
error_reporting(E_ALL & ~E_NOTICE);
include('settings.php');
 $returnId = strip_tags(trim(@$_REQUEST['id']));
 if(!isset($returnId)){

	$fielderrorurl ='result.php';
	$ResponseMessage ='Transasction failed';
    // Rest of the code here

  header("location:".$fielderrorurl."?msg=" . $ResponseMessage);
  exit();



 }
//Decode Response:::
//  $url = "https://www.myfatoorah.com/pg/PayGatewayService.asmx";
$user = $merchantusername; //-- Will Be Provided by Myfatoorah
$password = $merchantpassword; //-- Will Be Provided by Myfatoorah
$post_string = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <GetOrderStatusRequest xmlns="http://tempuri.org/">
      <getOrderStatusRequestDC>
        <merchant_code>'.$merchantcode.'</merchant_code>
        <merchant_username>'.$merchantusername.'</merchant_username>
        <merchant_password>'.$merchantpassword.'</merchant_password>
        <referenceID>'.$returnId.'</referenceID>
      </getOrderStatusRequestDC>
    </GetOrderStatusRequest>
  </soap:Body>
</soap:Envelope>';
$soap_do = curl_init();
curl_setopt($soap_do, CURLOPT_URL,$url );
curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($soap_do, CURLOPT_TIMEOUT, 10);
curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true );
curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($soap_do, CURLOPT_POST, true );
curl_setopt($soap_do, CURLOPT_POSTFIELDS, $post_string);
curl_setopt($soap_do, CURLOPT_HTTPHEADER, array('Content-Type: text/xml; charset=utf-8', 'Content-Length: '.strlen($post_string) ));
curl_setopt($soap_do, CURLOPT_USERPWD, $user . ":" . $password);
$result = curl_exec($soap_do);
	$err = curl_error($soap_do);

	$file_contents = htmlspecialchars(curl_exec($soap_do));
	curl_close($soap_do);

	$doc = new DOMDocument();
        $doc->loadXML(html_entity_decode($file_contents));
		/* echo "-----<pre> ";
		 print_r($file_contents);
		 echo "</pre> ";
		 exit();*/



        $ResponseCode = $doc->getElementsByTagName("ResponseCode");
        $ResponseCode = $ResponseCode->item(0)->nodeValue;

        $ResponseMessage = $doc->getElementsByTagName("ResponseMessage");
        $ResponseMessage = $ResponseMessage->item(0)->nodeValue;

		$Paymode = $doc->getElementsByTagName("Paymode");
		$Paymode = $Paymode->item(0)->nodeValue;

		$PayTxnID = $doc->getElementsByTagName("PayTxnID");
		$PayTxnID = $PayTxnID->item(0)->nodeValue;

		$Result = $doc->getElementsByTagName("result");
	 	$Result = $Result->item(0)->nodeValue;

	    $net_amount = $doc->getElementsByTagName("net_amount");
	 	$net_amount = $net_amount->item(0)->nodeValue;


		$udf1 = $doc->getElementsByTagName("udf1");
	 	$udf1 = $udf1->item(0)->nodeValue;

		$udf2 = $doc->getElementsByTagName("udf2");
	 	$udf2 = $udf2->item(0)->nodeValue;


		date_default_timezone_set('Asia/Kuwait');
		$current_date = date("Y-m-d H:i:s");

		  $xmlinserttodb=html_entity_decode($file_contents);

		$returnvals='?ReferenceNumber='.$returnId.'&udf1='.$udf1.'&udf2='.$udf2.'&ResponseCode='.$ResponseCode.'&ResponseMessage='.$ResponseMessage.'&Paymode='.$Paymode.'&PayTxnID='.$PayTxnID.'&net_amount='.$net_amount.'&result='.$Result;

		$mailmattershow="<table width='70%' align='center'  border='0' cellspacing='0' cellpadding='5' style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size:12px; border:double;	border-color:#ccc; padding:20px 10px;'>
          <tr>
            <td colspan='4' align='center'   style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size:14px;'><strong class='text'>$webappname Transaction Details</strong></td>
            </tr>
          <tr>
            <td colspan='4' align='left'>&nbsp;</td>
          </tr>
          <tr>
            <td colspan='4' align='left'  style='padding-left: 10px;'><p> <br>
              Reference Number :". @$returnId ."</p>
			  <p> ResponseCode :". @$ResponseCode."</p>
              <p> PayTxnID :". @$ReceiptNo."  </p>
              <p> ResponseMessage :".  @$ResponseMessage  ." </p>
			  <p> Paymode :". @$Paymode  ."   </p>
			  <p> PayTxnID :".  @$PayTxnID  ." </p>
              <p> Result :".  @$Result ."   </p>
			  <p> Net amount:".  @$net_amount ."   </p>
			   <p> udf1:".  @$udf1 ."   </p>
			   <p> udf2:".  @$udf2 ."   </p>
            </td>
          </tr>
          <tr>
            <td width='20%'>&nbsp;</td>
            <td width='28%'>&nbsp;</td>
            <td width='26%'>&nbsp;</td>
            <td width='26%'>&nbsp;</td>
          </tr>
          </table>";

		$header ="From: $webappfromemail \n";
		$header    .= "MIME-Version: 1.0\n";
		$header    .= "Content-type: text/html; charset=iso-8859-1\n";
		$header    .= " X-Mailer: PHP 5 .x";
		$subject = "$webappname Transaction summary";
		$tomail= 'rejeesh@design-master.com';
		@mail($tomail, $subject, $mailmattershow, $header);


        if ($ResponseCode == 0) {

			/*echo "-----<pre> ";
		 print_r($file_contents);
		 echo "</pre> ";//exit();*/

		  //INSERT INTO PAYMENTTABLE WITH THE SUCCESS STATUS

		 $ResponseMessage ='Transaction Success';
		$successurl='result.php';
		header("location:".$successurl.$returnvals."&msg=" . $ResponseMessage);
		exit();
        }
        else {
		$fielderrorurl='result.php';
		$ResponseMessage ='Transaction Failed';
    // Rest of the code here
	  //INSERT INTO PAYMENTTABLE WITH THE ERROR STATUS
		 header("location:".$fielderrorurl.$returnvals."&msg=" . $ResponseMessage);
		exit();
         }
//print_r($data);
       // return $data;
		/*echo "-----<pre> ";
	print_r($data);
	echo "</pre> ";*/

?>
