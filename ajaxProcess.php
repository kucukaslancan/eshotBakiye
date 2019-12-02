<?php
session_start();
require_once("eshotCon.class.php");
$eshot = new Eshot();
 
if ($_POST) {
	$_SESSION["gecmisKart"] = $_POST["kartNumarasi"];
	  $info = $eshot->getCardInfo($_POST["kartNumarasi"]);
	   echo "Mevcut Bakiye: " .$info["MevcutBakiye"]."<br>";
	   echo "Son Harcanan Tutar: ".$info["SonHarcananTutar"]."<br>";
	   echo "Son Yüklenen Tutar: ".$info["SonYuklenenTutar"];
}


