<?php
error_reporting(0);
$working_key = '7F0876900816421A9BAC221F7FACE121'; //Shared by CCAVENUES
$access_code = 'AVBI92HE42CJ30IBJC';
$merchant_json_data =
 array(
   'order_no' => '1630584469570',// 1621856896272  this order id is not working ofter successfull transaction
   'merchant_id' => '260186',
);


$merchant_data = json_encode($merchant_json_data);
$encrypted_data = encrypt($merchant_data, $working_key);

$final_data ='enc_request='.$encrypted_data.'&access_code='.$access_code.'&command=orderStatusTracker&request_type=JSON&response_type=JSON';
$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, "https://api.ccavenue.com/apis/servlet/DoWebTrans");
curl_setopt($ch, CURLOPT_URL, "http://logintest.ccavenue.com/apis/servlet/DoWebTrans");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER,'Content-Type: application/json') ;
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $final_data);
// Get server response ...
$result = curl_exec($ch);
curl_close($ch);
$status = '';
$information = explode('&', $result);

$dataSize = sizeof($information);
for ($i = 0; $i < $dataSize; $i++) {
    $info_value = explode('=', $information[$i]);
    if ($info_value[0] == 'enc_response') {
	$status = decrypt(trim($info_value[1]), $working_key);
}
}

echo '<pre>';
 $obj = json_decode($status); 
 print_r($obj);
 //$obj->Order_Status_Result->order_bank_response;

?>

<?php
//********** Hexadecimal to Binary function for php 4.0 version ********
 error_reporting(0);

function encrypt($plainText,$key)
{
	$key = hextobin(md5($key));
	$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
	$openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
	$encryptedText = bin2hex($openMode);
	return $encryptedText;
}

/*
* @param1 : Encrypted String
* @param2 : Working key provided by CCAvenue
* @return : Plain String
*/
function decrypt($encryptedText,$key)
{
	$key = hextobin(md5($key));
	$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
	$encryptedText = hextobin($encryptedText);
	$decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
	return $decryptedText;
}

function hextobin($hexString) 
 { 
	$length = strlen($hexString); 
	$binString="";   
	$count=0; 
	while($count<$length) 
	{       
	    $subString =substr($hexString,$count,2);           
	    $packedString = pack("H*",$subString); 
	    if ($count==0)
	    {
			$binString=$packedString;
	    } 
	    
	    else 
	    {
			$binString.=$packedString;
	    } 
	    
	    $count+=2; 
	} 
        return $binString; 
  } 
?>