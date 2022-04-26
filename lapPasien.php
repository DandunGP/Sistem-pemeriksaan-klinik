<h1>Tabel Pasien</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">NO Rekam Medis</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Agama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Telepon</th>
    </tr>
  </thead>
  <?php
    if(isset($_GET['page'])){
        $page = ($_GET['page']-1)*10;
    } else {
        $page = 0;
    }
    $data_pasien = query("select * from pasien limit 10 offset $page")
  ?>
  <tbody>
    <?php foreach ($data_pasien as $pasien): ?>
    <tr>
      <td><?= $pasien['norm'] ?></td>
      <td><?= $pasien['nama'] ?></td>
      <td><?= $pasien['jenis_kelamin'] ?></td>
      <td><?= $pasien['tgl_lahir'] ?></td>
      <td><?= $pasien['agama'] ?></td>
      <td><?= $pasien['alamat'] ?></td>
      <td><?= $pasien['telepon'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div class="page position-relative d-flex justify-content-center">
    <?php
        $total = query("select count(username) as 'total' from user where not type_user='admin'")[0]['total'];
        $total = round($total[0]/10)+1;
        if($page>$total){
            echo "<script>location.href='dashboard.php'</script>";
        }

    ?>
    <?php for($i=1; $i<=$total; $i++): ?>
    <a href="dashboard.php?tab=lapPasien&page=<?= $i ?>">
        <div class="page-item px-2 py-1 bg-white text-black border border-1"><?= $i ?></div>
    </a>
    <?php endfor; ?>
</div>
