<?php
function read ($length='255') 
{ 
   if (!isset ($GLOBALS['StdinPointer'])) 
   { 
      $GLOBALS['StdinPointer'] = fopen ("php://stdin","r"); 
   } 
   $line = fgets ($GLOBALS['StdinPointer'],$length); 
   return trim ($line); 
} 
function rand2($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function visit(){
    $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://app.viral-loops.com/api/v2/events');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'OPTIONS');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
$headers = array();
$headers[] = 'Access-Control-Request-Method: POST';
$headers[] = 'Origin: https://primexbt.com';
$headers[] = 'Referer: https://primexbt.com/';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36';
$headers[] = 'Access-Control-Request-Headers: content-type';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
return $result;
}
function hpr($reff){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://app.viral-loops.com/api/v2/events');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"publicToken":"RlnFOgDUuNs_mkW38dAZJLG3_Fc","params":{"event":"registration","user":{"firstname":"'.rand2(15).'","email":"'.rand2(15).'@gmail.com"},"referrer":{"referralCode":"'.$reff.'"},"refSource":"copy"}}');\
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    
    $headers = array();
    $headers[] = 'Accept: application/json, text/plain, */*';
    $headers[] = 'Referer: https://primexbt.com/';
    $headers[] = 'Origin: https://primexbt.com';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36';
    $headers[] = 'Content-Type: application/json;charset=UTF-8';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    return $result;
}
echo "Reff : ";
$reff = read();
echo "Berapa Banyak? : ";
$banyak = read();
echo "\n============== START Tuyul ==============\n";
$x = 1;
while($x <= $banyak) {
    visit();
    $ekse = hpr($reff);
    if (stripos($ekse , "isNew")){
        echo "SUKSES SUNTIK - ".$reff." (Sleep 3s) ./HanungGanteng";echo PHP_EOL;
        sleep(5);
    } else if (stripos($ekse , "Access denied")){
        echo "ACCESS DENIED - Change IP ./HanungGanteng";echo PHP_EOL;
        break;
    } else if (stripos($ekse , "Too Many Requests")){
        echo "To Many Requests - (Sleep 20s) ./HanungGanteng";echo PHP_EOL;
        sleep(20);
    } else {
        echo "GAGAL SUNTIK - (Sleep 3s) ./HanungGanteng";echo PHP_EOL;
        sleep(5);
    }echo PHP_EOL;
$x++;
}
echo "================= Done ==================\n";
