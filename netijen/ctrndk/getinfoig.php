<title>GET INFO INSTAGRAM by Username</title>

<?php
//if(isset($_GET['username'])){

$igusername = "".$_GET["username"]."";
$apinya =    file_get_contents('https://www.instagram.com/'.$igusername.'/?__a=1');
$data = json_decode($apinya, 1);
$chkusername = $data[user][username];
      if ($chkusername == null) {
        echo "<h2>USERNAME SALAH</h2>";
      } else {
echo "<b><h3>INFO ACCOUNT :</b></h3>";
echo "Username : ".$data[user][username]."<br>";
echo "ID : ".$data[user][id]."<br>";
$fullname = $data[user][full_name];
      if ($fullname == null) {
        echo "Fullname : Null<br>";
      } else {
      echo "Fullname : ".$fullname."<br>";
      }
echo "Totalmedia : ".$data[user][media][count]."<br>";
echo "Followers : ".$data[user][followed_by][count]."<br>";
echo "Following : ".$data[user][follows][count]."<br>";
$bio = $data[user][biography];
      if ($bio == null) {
        echo "Biography : Null<br>";
      } else {
      echo "Biography : ".$bio."<br>";
      }
$url = $data[user][external_url];
      if ($url == null) {
        echo "Url : Null<br>";
      } else {
      echo "Url : ".$url."<br><br>";
      }
echo "<b><h2>Catra Andika R</h2></b>";
}
//    }
  
?>