<?php 
include 'app/config.php';
include 'app/header.php';
?>

<div class="container">
  <div class="rows">
    <center>
    <small>
      <font color="red">
        *Please make sure all required fields are filled out correctly.
      </font>
    </small>
    </center>

<?php
if(isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['department']) && !empty($_POST['graduation']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['address'])){

  $name       = mysqli_escape_string($koneksi, $_POST['name']);
  $dept       = mysqli_escape_string($koneksi, $_POST['department']);
  $graduation = mysqli_escape_string($koneksi, $_POST['graduation']);
  $phone      = mysqli_escape_string($koneksi, $_POST['phone']);
  $email      = mysqli_escape_string($koneksi, $_POST['email']);
  $address    = mysqli_escape_string($koneksi, $_POST['address']);

    $query  = "INSERT INTO `tb_alumni` (`id`, `name`, `id_dept`, `graduation`, `phone`, `email`, `address`) VALUES (NULL, '$name', '$dept', '$graduation', '$phone', '$email', '$address')"; 
    $data   = mysqli_query($koneksi, $query);

          if($data){
            echo "
           <script type='text/javascript'>
            setTimeout(function () {  
             swal({ title: 'Success', text:  'Your Work has been Saved', type: 'success', timer: 5000, showConfirmButton: true });  
            },10); 
            window.setTimeout(function(){ window.location.replace('data.php');
            } ,5000); 
           </script>"; 
          }else{
            echo "
           <script type='text/javascript'>
            setTimeout(function () {  
             swal({ title: 'Failed', text:  'Failed to save your work', type: 'failed',
              timer: 3000, showConfirmButton: true });  
            },10); 
            window.setTimeout(function(){ 
             window.location.replace('data.php');
            } ,3000); 
           </script>";
            }
}
?>
    <form method="POST" action="">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="Nama" placeholder="Name">
      </div>

      <div class="form-group">
        <label>Department</label>
        <select class="custom-select" name="department">
          <option selected>Department of</option>
            <?php 
             $data = mysqli_query($koneksi,"SELECT * FROM tb_dept");
                while($d = mysqli_fetch_array($data)){
            ?>
                        <option value="<?php echo $d['id_dept']; ?>"><?php echo $d['name']; ?></option>
            <?php } ?>
        </select>
      </div>

      <div class="form-group">
        <label>Graduation year</label>
        <input type="number" name="graduation" class="form-control" id="graduation" placeholder="Graduation Year">
      </div>

      <div class="form-group">
        <label>Phone</label>
        <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone">
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
      </div>

      <div class="form-group">
        <label>Address</label>
        <textarea class="form-control" name="address" rows="5" id="address" placeholder="Address"></textarea>
      </div>

      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<?php include "app/footer.php"; ?>