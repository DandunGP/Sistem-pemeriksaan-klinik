<h1>Tabel Pasien</h1>
<form class="float-right" method="post" action="">
  <label for="search">Kata Kunci</label>
  <input type="text" name="search" placeholder="Type 'NORM' or 'Nama'" class="px-2">
  <br>
  <input type="submit" name="cari" class="btn btn-primary w-100" value="Cari">
</form>
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
      <th scope="col">Cetak</th>
    </tr>
  </thead>
  <?php
    if(isset($_GET['page'])){
        $page = ($_GET['page']-1)*10;
    } else {
        $page = 0;
    }
    if(isset($_POST['cari'])){
      $kunci = $_POST['search'];
      if($kunci == ''){
        $data_pasien = query("select * from pasien limit 10 offset $page");
      } else {
        $data_pasien = query("select * from pasien where norm like '%$kunci%' or nama like '%$kunci%'");
      }
    } else {
      $data_pasien = query("select * from pasien limit 10 offset $page");
    }
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
      <td>
        <a href="print-data.php?norm=<?= $pasien['norm']?>" target="_blank"
        class="btn btn-warning text-white">
        <i class="fa-solid fa-print fw-bold"></i>
          Cetak
        </a>
      </td>
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
