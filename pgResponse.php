<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
require('bot.php');
require('sublib.php');
require('config.php');
$bot = new telegram_bot($token);

$db = mysqli_connect('localhost', "$dbusr", "$dbpas", "$dbnam");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		
	$credit = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM count WHERE id='1'"));
        $cdt = $credit['credit'];
        $add = $cdt + $_POST["TXNAMOUNT"];
        
        mysqli_query($db, "UPDATE count SET credit = '".$add."' WHERE id = '1'");
        $bot->send_message(ADMIN_CHAT_ID, "<b>🤖Bot has been credited with ".$_POST["TXNAMOUNT"]."₹\nTotal Credits: ".$add."₹</b>", null, null, 'HTML');
        }
	
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}
mysqli_close($db);
?>