<?php

/* ------------------------ Configurations ---------------------------------- */
//Test
//$apiURL = 'https://apitest.myfatoorah.com';
//$apiKey = 'rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL'; //Test token value to be placed here: https://myfatoorah.readme.io/docs/test-token

//Live
$apiURL = 'https://api.myfatoorah.com';
$apiKey = 'm0l5pwmk8o4IksWjQiYESp3-9fuIBrcAzxLs7Zi8rbXoeQhDdz3dxwvRTV_M1GxiuYf6R5J5BkTlknJ10WwohIkSHgD8QEtYr0AY7xDz5s_u5SH-x2CvjBjy6xWZXfHvb2E-5jYTp7LzRfFIxft4zWXo7s0gb0GVJK2AzcAzZa_luSnYEcsxcbDpxWg9CTOei5aBCjVA5z6WQjbx0kidkRIjilc-5P9xeSFsuuk2euImY4l0RYlm3bpoRhU4SLpAqePeQlOVyRjvBMFD67Hqp5DsCZ0F8h2na9FJ6GtXOfb-5GvfDUTj0_4o6jkEWtAmd48Od3xLdwKsdOpSxuXws5dNG_bmM9i54jSt2O-I8oL2lcweBZV6N4U2LwnduQTbTKtu7l59cWrOQbhQ-m8-o63kcKD-rB1cDf9Ed7p-ruC87q0HfK4WZ1IsIzOeZvsVpHObtAsm5nGcAnL4A0o2lL3WuzrUapKUGoabtht49mrWKAX0A2BRJUY1oZs7v4_QXseOADW8RmgUA8WghzXJjmAohKSz0QrLLljOt0bwZYe7CQ4mWTbYDjo8E9clm27qEAu9E7jfl3j2bOIwSbuJocHdhPmUv3f3xJPH57QCRFNM-crEOsSRFlQ7l_03sE3JoZkagDQjRlmW_bexYO8ycD5Wb5oDSVJxxuTs5R150fUwQQQxQaLhmLgIc6_R9l3NpeK_QA'; //Live token value to be placed here: https://myfatoorah.readme.io/docs/live-token


/* ------------------------ Call SendPayment Endpoint ----------------------- */
//Fill customer address array
/* $customerAddress = array(
  'Block'               => 'Blk #', //optional
  'Street'              => 'Str', //optional
  'HouseBuildingNo'     => 'Bldng #', //optional
  'Address'             => 'Addr', //optional
  'AddressInstructions' => 'More Address Instructions', //optional
  ); */

//Fill invoice item array
/* $invoiceItems[] = [
  'ItemName'  => 'Item Name', //ISBAN, or SKU
  'Quantity'  => '2', //Item's quantity
  'UnitPrice' => '25', //Price per item
  ]; */
$custname  = @strip_tags($_REQUEST['custname']);

$custemail = @strip_tags($_REQUEST['custemail']);

$custemobile = @strip_tags($_REQUEST['phone']);

$totAmount =  @strip_tags($_REQUEST['totAmount']);

$productnames =  @strip_tags($_REQUEST['productnames']);

$membership_id =  @strip_tags($_REQUEST['membership_id']);

$user_id =  @strip_tags($_REQUEST['user_id']);

$insid = @strip_tags($_REQUEST['order_id_app']);

$udf1 =  @$insid;

$udf2 =  @$totAmount;
 $invoiceItems[] = [
  'ItemName'  => $productnames, //ISBAN, or SKU
  'Quantity'  => '1', //Item's quantity
  'UnitPrice' => $totAmount, //Price per item
  ];
//Fill POST fields array
$postFields = [
    //Fill required data
    'NotificationOption' => 'Lnk', //'SMS', 'EML', or 'ALL'
    'InvoiceValue'       => $totAmount,
    'CustomerName'       => $custname,
        //Fill optional data
        'DisplayCurrencyIso' => 'KWD',
        'MobileCountryCode'  => '+965',
        'CustomerMobile'     => $custemobile,
        'CustomerEmail'      => $custemail,
        'CallBackUrl'        => 'http://anonadiet.com/admin/payment/returnFromPayment.php',
        'ErrorUrl'           => 'http://anonadiet.com/admin/payment/returnFromPayment.php', //or 'https://example.com/error.php'
        'Language'           => 'en', //or 'ar'
        'CustomerReference'  => $insid,
        //'CustomerCivilId'    => 'CivilId',
        //'UserDefinedField'   => 'This could be string, number, or array',
        //'ExpiryDate'         => '', //The Invoice expires after 3 days by default. Use 'Y-m-d\TH:i:s' format in the 'Asia/Kuwait' time zone.
        //'SourceInfo'         => 'Pure PHP', //For example: (Laravel/Yii API Ver2.0 integration)
        //'CustomerAddress'    => $customerAddress,
        'InvoiceItems'       => $invoiceItems,
];

//Call endpoint
$data = sendPayment($apiURL, $apiKey, $postFields);

//You can save payment data in database as per your needs
$invoiceId   = $data->InvoiceId;
$paymentLink = $data->InvoiceURL;

//Redirect your customer to the invoice page to complete the payment process
//Display the payment link to your customer
 header("location:".$paymentLink); 
//echo "Click on <a href='$paymentLink' target='_blank'>$paymentLink</a> to pay with invoiceID $invoiceId.";
die;


/* ------------------------ Functions --------------------------------------- */
/*
 * Send Payment Endpoint Function 
 */

function sendPayment($apiURL, $apiKey, $postFields) {

    $json = callAPI("$apiURL/v2/SendPayment", $apiKey, $postFields);
    return $json->Data;
}

//------------------------------------------------------------------------------
/*
 * Call API Endpoint Function
 */

function callAPI($endpointURL, $apiKey, $postFields = [], $requestType = 'POST') {

    $curl = curl_init($endpointURL);
    curl_setopt_array($curl, array(
        CURLOPT_CUSTOMREQUEST  => $requestType,
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

/* -------------------------------------------------------------------------- */
