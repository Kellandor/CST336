        
<?php
$data = array("zip_code" => $_GET['zip_code']);
//$data = array("state" => $_GET['state']);
//$link = "http://hosting.otterlabs.org/laramiguel/ajax/zip.php";
$link = $_GET['url'];
$curl = curl_init();

$link = sprintf("%s?%s", $link, http_build_query($data));
//echo $link;
curl_setopt($curl, CURLOPT_URL, $link);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);

curl_close($curl);
echo $result;

?>