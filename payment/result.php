<!DOCTYPE html>
<html>
<head>
<title>Anona</title>
 <link rel='shortcut icon' type='image/x-icon'  href="./favicon.ico">

 <!-- Google Tag Manager -->
 <script>
 
 
 (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-THN4PJN'); 
  
  </script>
  <!-- End Google Tag Manager -->


  
<meta name="facebook-domain-verification" content="vlwdhn0p9smh5y3kwy9wew5kurag7n" />

<script type='text/javascript'>
(function(e,t,n){if(e.snaptr)return;var a=e.snaptr=function()
{a.handleRequest?a.handleRequest.apply(a,arguments):a.queue.push(arguments)};
a.queue=[];var s='script';r=t.createElement(s);r.async=!0;
r.src=n;var u=t.getElementsByTagName(s)[0];
u.parentNode.insertBefore(r,u);})(window,document,
'https://sc-static.net/scevent.min.js');

snaptr('init', '176f432b-ffcf-4bf2-b784-5c3abaa55b58', {
	'user_email': '__INSERT_USER_EMAIL__'
});

snaptr('track', 'PURCHASE',{
	'transaction_id':`${@$PayTxnID}`,

});

</script>

 
</head>


<body>
	   <!-- Google Tag Manager (noscript) -->
<noscript>
<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-THN4PJN"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

<div style="width: 100%;text-align: center;">
	<img src="./anona.svg" style="width:250px;height: 100px;text-align: center;">
</div>

<h1 style="font-weight:400;font-family: 'Brush Script MT','Brush Script Std',cursive;text-align: center;">Thank You For Your Order....</h1>
<div style="width:50%;background:rgb(252, 214, 191);margin-left: 25%;">
	<?php

error_reporting(E_ALL & ~E_NOTICE);

include('settings.php');

if(!empty($_GET)) extract($_GET);

if(!empty($_POST)) extract($_POST); 


echo $dispaly_message = "<table width='70%' align='center'  border='0' cellspacing='0' cellpadding='5' style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size:12px; border:double;	border-color:#ccc; padding:20px 10px;border:none;'>

				  <tr>

					<td colspan='4' align='center'   style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size:14px;'><strong class='text'>$webappname Transaction Details</strong></td>

					</tr>

				  <tr>

					<td colspan='4' align='left'  style='padding-left: 10px;'><p> <br>   

					  Reference Number :". @$ReferenceNumber ."</p>

					       

					  <p> PayTxnID :". @$PayTxnID."  </p>

					

					  <p> Paymode :". @$Paymode  ."   </p>

					  <p> PayTxnID :".  @$PayTxnID  ." </p>

					  <p> Result :".  @$Result ."   </p>

					   <p> Package Name :". @$package_name."</p>             

					  <p> Message:".  @$msg ."   </p>

					  <p> Order Track ID:".  @$udf1 ."   </p>

					   <p> Order Amount:".  @$udf2 ." KWD   </p>

					</td>

				  </tr>

				  <tr><td width='26%' colspan='2'>&nbsp;</td>

					<td width='20%' colspan='2'><a href='http://anonadiet.com/#/dashboard' style=' background-color:#fcc9ad;
  color: #000;
  padding: 15px 25px;
  text-decoration: none;'>Back</a></td>

					

					

				  </tr>

				  </table>";



if (@$Result == "CAPTURED") {
	$message = $dispaly_message;
    $to = @$CustomerEmail;
//    $to = "phpdev1@infoware.ws";
    $from = "admin@musclefuelkw.com";

            
    $subject = "Lifestyle - Payment Successfull";
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$to."\r\n".
    'X-Mailer: PHP/'.phpversion();

	$response = true;

	@mail($to,$subject,$message,$headers);
    
}

?>
</div>

</body>
</html>