<?php 
	$tm =time();
	if (isset($_GET['Verb']) == true) { //生成下载串
		
        		$user_verb= $_GET['Verb']; 
	}
	if (isset($_GET['Path']) == true){
			$user_path = $_GET['Path'];
	}
	if ($user_verb == "PUT"){
		$ct = "text/plain";
	}
	$StringToSign = $user_verb . "\n" .
                 "\n" .
                 $ct."\n" .
		 $tm . "\n".
		 "/testali/".$user_path;
$mySecretKey = "b8ffea14046b50d7b731042c30a57cfeb63a0b64";

$ssig = substr( base64_encode( hash_hmac( "sha1", $StringToSign, $mySecretKey, true ) ), 5, 10); ;
 
echo "?KID=sina,11in8xr1SBawEXvRNX7m&Expires=".$tm."&ssig=".urlencode($ssig);
?>

