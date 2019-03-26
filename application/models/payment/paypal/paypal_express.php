 
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  
  
class Paypal_express extends CI_Model {


function PPHttpPost($methodName_, $nvpStr_, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode) {
			// Set up your API credentials, PayPal end point, and API version.
			$API_UserName = urlencode($PayPalApiUsername);
			$API_Password = urlencode($PayPalApiPassword);
			$API_Signature = urlencode($PayPalApiSignature);
			
			$paypalmode = ($PayPalMode=='sandbox') ? '.sandbox' : '';
	
			$API_Endpoint = "https://api-3t".$paypalmode.".paypal.com/nvp";
			$version = urlencode('109.0');
		
			// Set the curl parameters.
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
			curl_setopt($ch, CURLOPT_VERBOSE, 1);
		
			// Turn off the server and peer verification (TrustManager Concept).
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
		
			// Set the API operation, version, and API signature in the request.
			$nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";
		
			// Set the request as a POST FIELD for curl.
			curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
		
			// Get response from the server.
			$httpResponse = curl_exec($ch);
		
			if(!$httpResponse) {
				exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
			}
		
			// Extract the response details.
			$httpResponseAr = explode("&", $httpResponse);
		
			$httpParsedResponseAr = array();
			foreach ($httpResponseAr as $i => $value) {
				$tmpAr = explode("=", $value);
				if(sizeof($tmpAr) > 1) {
					$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
				}
			}
		
			if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
				exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
			}
		
		return $httpParsedResponseAr;
	}






function run(){
 
 //start session in all pages
session_start();  //PHP >= 5.4.0
//if(session_id() == '') { session_start(); } //uncomment this line if PHP < 5.4.0 and comment out line above

$PayPalMode 			= 'sandbox'; // sandbox or live
$PayPalApiUsername 		= 'korayzorluoglu1-facilitator_api1.hotmail.com'; //PayPal API Username
$PayPalApiPassword 		= '1394582264'; //Paypal API password
$PayPalApiSignature 	= 'AFcWxV21C7fd0v3bYYYRCpSSRl31AMo4Sr5CuFAYAsMOj.Mc4vQaYcSn'; //Paypal API Signature
$PayPalCurrencyCode 	= 'USD'; //Paypal Currency Code
$PayPalReturnURL 		= 'http://jolyjokerz.com/payment/paypal/complete'; //Point to process.php page
$PayPalCancelURL 		= 'http://jolyjokerz.com/payment/paypal/error'; //Cancel URL if user clicks cancel



$paypalmode = ($PayPalMode=='sandbox') ? '.sandbox' : '';

if($_POST) //Post Data received from product list page.
{
	//Mainly we need 4 variables from product page Item Name, Item Price, Item Number and Item Quantity.
	
	//Please Note : People can manipulate hidden field amounts in form,
	//In practical world you must fetch actual price from database using item id. Eg: 
	//$ItemPrice = $mysqli->query("SELECT item_price FROM products WHERE id = Product_Number");

	$ItemName 		= "test"; //Item Name
	$ItemPrice 		= 321312; //Item Price
	$ItemNumber 	= 13213123; //Item Number
	$ItemDesc 		= "test"; //Item Number
	$ItemQty 		= 2; // Item Quantity
	$ItemTotalPrice = ($ItemPrice*$ItemQty); //(Item Price x Quantity = Total) Get total amount of product; 
	
	//Other important variables like tax, shipping cost
	$TotalTaxAmount 	= 2.58;  //Sum of tax for all items in this order. 
	$HandalingCost 		= 2.00;  //Handling cost for this order.
	$InsuranceCost 		= 1.00;  //shipping insurance cost for this order.
	$ShippinDiscount 	= -3.00; //Shipping discount for this order. Specify this as negative number.
	$ShippinCost 		= 3.00; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
	
	//Grand total including all tax, insurance, shipping cost and discount
	$GrandTotal = ($ItemTotalPrice + $TotalTaxAmount + $HandalingCost + $InsuranceCost + $ShippinCost + $ShippinDiscount);
	
	//Parameters for SetExpressCheckout, which will be sent to PayPal
	$padata = 	'&METHOD=SetExpressCheckout'.
				'&RETURNURL='.urlencode($PayPalReturnURL ).
				'&CANCELURL='.urlencode($PayPalCancelURL).
				'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
				
				'&L_PAYMENTREQUEST_0_NAME0='.urlencode($ItemName).
				'&L_PAYMENTREQUEST_0_NUMBER0='.urlencode($ItemNumber).
				'&L_PAYMENTREQUEST_0_DESC0='.urlencode($ItemDesc).
				'&L_PAYMENTREQUEST_0_AMT0='.urlencode($ItemPrice).
				'&L_PAYMENTREQUEST_0_QTY0='. urlencode($ItemQty).
				
				/* 
				//Additional products (L_PAYMENTREQUEST_0_NAME0 becomes L_PAYMENTREQUEST_0_NAME1 and so on)
				'&L_PAYMENTREQUEST_0_NAME1='.urlencode($ItemName2).
				'&L_PAYMENTREQUEST_0_NUMBER1='.urlencode($ItemNumber2).
				'&L_PAYMENTREQUEST_0_DESC1='.urlencode($ItemDesc2).
				'&L_PAYMENTREQUEST_0_AMT1='.urlencode($ItemPrice2).
				'&L_PAYMENTREQUEST_0_QTY1='. urlencode($ItemQty2).
				*/
				
				/* 
				//Override the buyer's shipping address stored on PayPal, The buyer cannot edit the overridden address.
				'&ADDROVERRIDE=1'.
				'&PAYMENTREQUEST_0_SHIPTONAME=J Smith'.
				'&PAYMENTREQUEST_0_SHIPTOSTREET=1 Main St'.
				'&PAYMENTREQUEST_0_SHIPTOCITY=San Jose'.
				'&PAYMENTREQUEST_0_SHIPTOSTATE=CA'.
				'&PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE=US'.
				'&PAYMENTREQUEST_0_SHIPTOZIP=95131'.
				'&PAYMENTREQUEST_0_SHIPTOPHONENUM=408-967-4444'.
				*/
				
				'&NOSHIPPING=0'. //set 1 to hide buyer's shipping address, in-case products that does not require shipping
				
				'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
				'&PAYMENTREQUEST_0_TAXAMT='.urlencode($TotalTaxAmount).
				'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($ShippinCost).
				'&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($HandalingCost).
				'&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($ShippinDiscount).
				'&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($InsuranceCost).
				'&PAYMENTREQUEST_0_AMT='.urlencode($GrandTotal).
				'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode).
				'&LOCALECODE=GB'. //PayPal pages to match the language on your website.
				'&LOGOIMG=http://www.sanwebe.com/wp-content/themes/sanwebe/img/logo.png'. //site logo
				'&CARTBORDERCOLOR=FFFFFF'. //border color of cart
				'&ALLOWNOTE=1';
				
				############# set session variable we need later for "DoExpressCheckoutPayment" #######
				$_SESSION['ItemName'] 			=  $ItemName; //Item Name
				$_SESSION['ItemPrice'] 			=  $ItemPrice; //Item Price
				$_SESSION['ItemNumber'] 		=  $ItemNumber; //Item Number
				$_SESSION['ItemDesc'] 			=  $ItemDesc; //Item Number
				$_SESSION['ItemQty'] 			=  $ItemQty; // Item Quantity
				$_SESSION['ItemTotalPrice'] 	=  $ItemTotalPrice; //(Item Price x Quantity = Total) Get total amount of product; 
				$_SESSION['TotalTaxAmount'] 	=  $TotalTaxAmount;  //Sum of tax for all items in this order. 
				$_SESSION['HandalingCost'] 		=  $HandalingCost;  //Handling cost for this order.
				$_SESSION['InsuranceCost'] 		=  $InsuranceCost;  //shipping insurance cost for this order.
				$_SESSION['ShippinDiscount'] 	=  $ShippinDiscount; //Shipping discount for this order. Specify this as negative number.
				$_SESSION['ShippinCost'] 		=   $ShippinCost; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
				$_SESSION['GrandTotal'] 		=  $GrandTotal;


		//We need to execute the "SetExpressCheckOut" method to obtain paypal token
 		$httpParsedResponseAr = $this->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
		
		//Respond according to message we receive from Paypal
		if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
		{

				//Redirect user to PayPal store with Token received.
			 	$paypalurl ='https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$httpParsedResponseAr["TOKEN"].'';
				header('Location: '.$paypalurl);
			 
		}else{
			//Show error message
			echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
			echo '<pre>';
			print_r($httpParsedResponseAr);
			echo '</pre>';
		}

}

//Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
if(isset($_GET["token"]) && isset($_GET["PayerID"]))
{
	//we will be using these two variables to execute the "DoExpressCheckoutPayment"
	//Note: we haven't received any payment yet.
	
	$token = $_GET["token"];
	$payer_id = $_GET["PayerID"];
	
	//get session variables
	$ItemName 			= $_SESSION['ItemName']; //Item Name
	$ItemPrice 			= $_SESSION['ItemPrice'] ; //Item Price
	$ItemNumber 		= $_SESSION['ItemNumber']; //Item Number
	$ItemDesc 			= $_SESSION['ItemDesc']; //Item Number
	$ItemQty 			= $_SESSION['ItemQty']; // Item Quantity
	$ItemTotalPrice 	= $_SESSION['ItemTotalPrice']; //(Item Price x Quantity = Total) Get total amount of product; 
	$TotalTaxAmount 	= $_SESSION['TotalTaxAmount'] ;  //Sum of tax for all items in this order. 
	$HandalingCost 		= $_SESSION['HandalingCost'];  //Handling cost for this order.
	$InsuranceCost 		= $_SESSION['InsuranceCost'];  //shipping insurance cost for this order.
	$ShippinDiscount 	= $_SESSION['ShippinDiscount']; //Shipping discount for this order. Specify this as negative number.
	$ShippinCost 		= $_SESSION['ShippinCost']; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
	$GrandTotal 		= $_SESSION['GrandTotal'];

	$padata = 	'&TOKEN='.urlencode($token).
				'&PAYERID='.urlencode($payer_id).
				'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
				
				//set item info here, otherwise we won't see product details later	
				'&L_PAYMENTREQUEST_0_NAME0='.urlencode($ItemName).
				'&L_PAYMENTREQUEST_0_NUMBER0='.urlencode($ItemNumber).
				'&L_PAYMENTREQUEST_0_DESC0='.urlencode($ItemDesc).
				'&L_PAYMENTREQUEST_0_AMT0='.urlencode($ItemPrice).
				'&L_PAYMENTREQUEST_0_QTY0='. urlencode($ItemQty).

				/* 
				//Additional products (L_PAYMENTREQUEST_0_NAME0 becomes L_PAYMENTREQUEST_0_NAME1 and so on)
				'&L_PAYMENTREQUEST_0_NAME1='.urlencode($ItemName2).
				'&L_PAYMENTREQUEST_0_NUMBER1='.urlencode($ItemNumber2).
				'&L_PAYMENTREQUEST_0_DESC1=Description text'.
				'&L_PAYMENTREQUEST_0_AMT1='.urlencode($ItemPrice2).
				'&L_PAYMENTREQUEST_0_QTY1='. urlencode($ItemQty2).
				*/

				'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
				'&PAYMENTREQUEST_0_TAXAMT='.urlencode($TotalTaxAmount).
				'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($ShippinCost).
				'&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($HandalingCost).
				'&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($ShippinDiscount).
				'&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($InsuranceCost).
				'&PAYMENTREQUEST_0_AMT='.urlencode($GrandTotal).
				'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode);
	
	//We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
	$paypal= new MyPayPal();
	$httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
	
	//Check if everything went ok..
	if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
	{

			echo '<h2>Success</h2>';
			echo 'Your Transaction ID : '.urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);
			
				/*
				//Sometimes Payment are kept pending even when transaction is complete. 
				//hence we need to notify user about it and ask him manually approve the transiction
				*/
				
				if('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
				{
					echo '<div style="color:green">Payment Received! Your product will be sent to you very soon!</div>';
				}
				elseif('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
				{
					echo '<div style="color:red">Transaction Complete, but payment is still pending! '.
					'You need to manually authorize this payment in your <a target="_new" href="http://www.paypal.com">Paypal Account</a></div>';
				}

				// we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
				// GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
				$padata = 	'&TOKEN='.urlencode($token);
				$paypal= new MyPayPal();
				$httpParsedResponseAr = $paypal->PPHttpPost('GetExpressCheckoutDetails', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

				if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
				{
					
					echo '<br /><b>Stuff to store in database :</b><br /><pre>';
					/*
					#### SAVE BUYER INFORMATION IN DATABASE ###
					//see (http://www.sanwebe.com/2013/03/basic-php-mysqli-usage) for mysqli usage
					
					$buyerName = $httpParsedResponseAr["FIRSTNAME"].' '.$httpParsedResponseAr["LASTNAME"];
					$buyerEmail = $httpParsedResponseAr["EMAIL"];
					
					//Open a new connection to the MySQL server
					$mysqli = new mysqli('host','username','password','database_name');
					
					//Output any connection error
					if ($mysqli->connect_error) {
						die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
					}		
					
					$insert_row = $mysqli->query("INSERT INTO BuyerTable 
					(BuyerName,BuyerEmail,TransactionID,ItemName,ItemNumber, ItemAmount,ItemQTY)
					VALUES ('$buyerName','$buyerEmail','$transactionID','$ItemName',$ItemNumber, $ItemTotalPrice,$ItemQTY)");
					
					if($insert_row){
						print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />'; 
					}else{
						die('Error : ('. $mysqli->errno .') '. $mysqli->error);
					}
					
					*/
					
					echo '<pre>';
					print_r($httpParsedResponseAr);
					echo '</pre>';
				} else  {
					echo '<div style="color:red"><b>GetTransactionDetails failed:</b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
					echo '<pre>';
					print_r($httpParsedResponseAr);
					echo '</pre>';

				}
	
	}else{
			echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
			echo '<pre>';
			print_r($httpParsedResponseAr);
			echo '</pre>';
	}
}
 
	

}




}
?>