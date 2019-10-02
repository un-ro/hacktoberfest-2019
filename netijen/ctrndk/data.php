<?php include "app/header.php"; ?>

<div class="container">
  <div class="rows">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Department</th>
      <th scope="col">Graduation</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <tbody>

<?php
include_once "app/config.php";
$no = 1;
    $data = mysqli_query($koneksi,"SELECT tb_alumni.name AS NAME, tb_dept.name AS DEPARTMENT, tb_alumni.graduation AS GRADUATION_YEAR, tb_alumni.phone AS PHONE, tb_alumni.email AS EMAIL, tb_alumni.address AS ADDRESS FROM tb_alumni INNER JOIN tb_dept ON tb_alumni.id_dept=tb_dept.id_dept ORDER BY tb_alumni.name");

    while($d = mysqli_fetch_array($data)){
?>

    <tr>
      <th scope="row"><?php echo $no++; ?></th>
      <td><?php echo $d['NAME']; ?></td>
      <td><?php echo $d['DEPARTMENT']; ?></td>
      <td><?php echo $d['GRADUATION_YEAR']; ?></td>
      <td><?php echo $d['PHONE']; ?></td>
      <td><?php echo $d['EMAIL']; ?></td>
      <td><?php echo $d['ADDRESS']; ?></td>
    </tr>
    
      <?php 
    }
    ?>
  </tbody>
</table>
  </div>
</div>

<?php include "app/footer.php"; ?>