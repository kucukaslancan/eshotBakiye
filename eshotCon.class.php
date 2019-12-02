<?php

/**
 * Author: Can KÜÇÜKASLAN
 */
class Eshot  
{
	 
	 public function getCardInfo($cardNumber)
	 {
	 		$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://online.eshot.gov.tr/BakiyeSorgula/BakiyeSorgula/",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => "aliasNo=".$cardNumber."",
			  CURLOPT_HTTPHEADER => array(
			    "Accept: */*",
			    "Cache-Control: no-cache",
			    "Connection: keep-alive",
			    "Content-Type: application/x-www-form-urlencoded",
			    "Host: online.eshot.gov.tr",
			    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0",
			    "accept-encoding: gzip, deflate",
			    "cache-control: no-cache",
			    "content-length: 21",
			    "cookie: AspxAutoDetectCookieSupport=1"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "Error :" . $err;
			} else {
			  $obj = json_decode($response);
			  $cardInfo = 
			  [
			  	"MevcutBakiye" => $obj->{'MevcutBakiye'},
			  	"SonHarcananTutar" => $obj->{'SonHarcananTutar'},
			  	"SonYuklenenTutar" => $obj->{'SonYuklenenTutar'}
			  ];
			  return $cardInfo;
			 
			}

	 }
}