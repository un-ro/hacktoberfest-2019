<?php include "app/header.php"; ?>
<?php
if(empty($_POST['q'])){
echo '<center>
          <img src="img/logo.png" width="30%" height="30%">
      </center><br>';
    }
?>
<form method="post"  id="form-search" action="">
   <div class="form-group">
      <div class="input-group mb-3">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i class="fa fa-search"></i>
            </span>
         </div>
         <input type="text" class="form-control" id="search" name="q" placeholder="" value="<?php if(!empty($_POST['q'])){ echo $_POST['q']; } ?>">
         <div class="input-group-append">
            <button class="btn btn-info" id="submit" name="submit">Search</button>
         </div>
      </div>
   </div>
</form>

<?php
if(isset($_POST['submit']) && $_POST['q'] !== '' && $_POST['q'] !== ' '){
  include "app/config.php";
  include "app/token().php";
  include "app/stem().php";


#STOPWORDS LIST ARRAY

$stopwords = array("ajak", "akan", "lulusan", "tahun", "beliau", "kena", "kenapa", "yang", "dan", "tidak", "agak", "kata", "bilang", "sejak", "kagak", "cukup", "jua", "cuma", "hanya", "karena", "oleh", "lain", "setiap", "untuk", "dari", "dapat", "dapet", "sudah", "udah", "selesai", "punya", "belum", "boleh", "gue", "gua", "aku", "kamu", "dia", "mereka", "kami", "kita", "jika", "bila", "kalo", "kalau", "dalam", "nya", "atau", "seperti", "mungkin", "sering", "kerap", "acap", "harus", "banyak", "doang", "kemudian", "nyala", "mati", "milik", "juga", "mau", "dimana", "apa", "kapan", "kemana", "selama", "siapa", "mengapa", "dengan", "kalian", "bakal", "bakalan", "tentang", "setelah", "hadap", "semua", "hampir", "antara", "sebuah", "apapun", "sebagai", "di", "tapi", "lainnya", "bagaimana", "namun", "tetapi", "biar", "pun", "itu", "ini", "suka", "paling", "mari", "ayo", "barangkali", "mudah", "kali", "sangat", "banget", "disana", "disini", "terlalu", "lalu", "terus", "trus", "sungguh", "telah", "mana", "apanya", "ada", "adanya", "adalah", "adapun", "agaknya", "agar", "akankah", "akhirnya", "akulah", "amat", "amatlah", "anda", "andalah", "antar", "diantaranya", "antaranya", "diantara", "apaan", "apabila", "apakah", "apalagi", "apatah", "ataukah", "ataupun", "bagai", "bagaikan", "sebagainya", "bagaimanapun", "sebagaimana", "bagaimanakah", "bagi", "bahkan", "bahwa", "bahwasanya", "sebaliknya", "sebanyak", "beberapa", "seberapa", "begini", "beginian", "beginikah", "beginilah", "sebegini", "begitu", "begitukah", "begitulah", "begitupun", "sebegitu", "belumlah", "sebelum", "sebelumnya", "sebenarnya", "berapa", "berapakah", "berapalah", "berapapun", "betulkah", "sebetulnya", "biasa", "biasanya", "bilakah", "bisa", "bisakah", "sebisanya", "bolehkah", "bolehlah", "buat", "bukan", "bukankah", "bukanlah", "bukannya", "percuma", "dahulu", "daripada", "dekat", "demi", "demikian", "demikianlah", "sedemikian", "depan", "dialah", "dini", "diri", "dirinya", "terdiri", "dulu", "enggak", "enggaknya", "entah", "entahlah", "terhadap", "terhadapnya", "hal", "hanyalah", "haruslah", "harusnya", "seharusnya", "hendak", "hendaklah", "hendaknya", "hingga", "sehingga", "ia", "ialah", "ibarat", "ingin", "inginkah", "inginkan", "inikah", "inilah", "itukah", "itulah", "jangan", "jangankan", "janganlah", "jikalau", "justru", "kala", "kalaulah", "kalaupun", "kamilah", "kamulah", "kan", "kau", "kapankah", "kapanpun", "dikarenakan", "karenanya", "ke", "kecil", "kepada", "kepadanya", "ketika", "seketika", "khususnya", "kini", "kinilah", "kiranya", "sekiranya", "kitalah", "kok", "lagi", "lagian", "selagi", "melainkan", "selaku", "melalui", "lama", "lamanya", "selamanya", "lebih", "terlebih", "bermacam", "macam", "semacam", "maka", "makanya", "makin", "malah", "malahan", "mampu", "mampukah", "manakala", "manalagi", "masih", "masihkah", "semasih", "masing", "maupun", "semaunya", "memang", "merekalah", "meski", "meskipun", "semula", "mungkinkah", "nah", "nanti", "nantinya", "nyaris", "olehnya", "seorang", "seseorang", "pada", "padanya", "padahal", "sepanjang", "pantas", "sepantasnya", "sepantasnyalah", "para", "pasti", "pastilah", "per", "pernah", "pula", "merupakan", "rupanya", "serupa", "saat", "saatnya", "sesaat", "aja", "saja", "sajalah", "saling", "bersama", "sama", "sesama", "sambil", "sampai", "sana", "sangatlah", "saya", "sayalah", "sebab", "sebabnya", "tersebut", "tersebutlah", "sedang", "sedangkan", "sedikit", "sedikitnya", "segala", "segalanya", "segera", "sesegera", "sejenak", "sekali", "sekalian", "sekalipun", "sesekali", "sekaligus", "sekarang", "sekitar", "sekitarnya", "sela", "selain", "selalu", "seluruh", "seluruhnya", "semakin", "sementara", "sempat", "semuanya", "sendiri", "sendirinya", "seolah", "sepertinya", "seringnya", "serta", "siapakah", "siapapun", "disinilah", "sini", "sinilah", "sesuatu", "sesuatunya", "suatu", "sesudah", "sesudahnya", "sudahkah", "sudahlah", "supaya", "tadi", "tadinya", "tak", "tanpa", "tentu", "tentulah", "tertentu", "seterusnya", "tiap", "setidaknya", "tidakkah", "tidaklah", "toh", "waduh", "wah", "wahai", "sewaktu", "walau", "walaupun", "wong", "yaitu", "yakni");

$awal = microtime(true);


#TOKENIZE
$kunci  = mysqli_escape_string($koneksi, $_POST['q']);

$result = str_ireplace($stopwords, "", $kunci);
//var_dump($result);

$numtok = explode(" ", $kunci);
$key = explode(" ", $result);
//var_dump($key);


$q = mysqli_escape_string($koneksi, $_POST['q']);
$query ="SELECT tb_alumni.name AS NAME, tb_dept.name AS DEPARTMENT, tb_alumni.graduation AS GRADUATION_YEAR, tb_alumni.phone AS PHONE, tb_alumni.email AS EMAIL, tb_alumni.address AS ADDRESS FROM tb_alumni INNER JOIN tb_dept ON tb_alumni.id_dept=tb_dept.id_dept WHERE tb_dept.name LIKE '%".$key[0]."%' OR tb_dept.code LIKE '%".$key[0]."%' OR tb_alumni.name LIKE '%".$key[0]."%' OR tb_alumni.graduation LIKE  '%".$key[0]."%' OR tb_alumni.phone LIKE '%".$key[0]."%' OR tb_alumni.email LIKE '%".$key[0]."%'OR tb_alumni.address LIKE '%".$key[0]."%'";

 for($i = 1; $i < count($key); $i++) {
        if(!empty($key[$i])) {
            $query .= "OR tb_dept.code LIKE '%".$key[$i]."%' OR tb_alumni.name LIKE '%".$key[$i]."%' OR tb_alumni.graduation LIKE  '%".$key[$i]."%' OR tb_alumni.phone LIKE '%".$key[$i]."%' OR tb_alumni.email LIKE '%".$key[$i]."%'OR tb_alumni.address LIKE '%".$key[$i]."%'";
        }
      }

  $data = mysqli_query($koneksi, $query);

     if(mysqli_num_rows($data) == 0){
      echo '<center>No search result for <b>"'.$q.'"</b></center>';
    }else{

      echo '<center><h4>Search Results : for <b>"'.$q.'"</b></h4></center>';
      echo '<div class="alert alert-warning" role="alert">';
      echo "<center><b>TOKENIZE :</b> Keywords =>";


      for($u=0;$u<count($numtok);$u++){
        echo "<code>[".$u."]".$numtok[$u]." </code>";
      }

      echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>';
      echo "</center></div>";

      echo '<div class="alert alert-warning" role="alert">';
      echo "<center><b>REMOVING STOPWORDS :</b> ";


      for($u=0;$u<count($key);$u++){
        if($key[$u] !== ""){
        echo "<code>[".$u."]".$key[$u]." </code>";
      }
      }

      echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>';
      echo "</center></div>";

      $rows = mysqli_num_rows($data);
    while ($r = mysqli_fetch_array($data)) {

      echo "<b>Name :</b> ".$r['NAME']."<br><b>Department :</b> ".$r['DEPARTMENT']."<br><b>Passed : </b>".$r['GRADUATION_YEAR']."<br> <b>Phone: </b>".$r['PHONE']."<br><b>Email :</b> ".$r['EMAIL']."<br> <b>Address : </b>".$r['ADDRESS']."<br><hr>"; 
    }
    $akhir = microtime(true);
    $lama = $akhir-$awal;
    echo "<center><div class='alert alert-success' role='alert' aria-label='Close'><b>".$rows."</b> Results<br>Proccessing Time <b>".round($lama,5)."</b> Second</div></center>";

  }

}
?>
<?php include "app/footer.php"; ?>