<h1>Tabel Poliklinik</h1>
<table class="table table-striped">
  <thead>
    <tr>
        <th scope="col">Tanggal</th>
        <th scope="col">No Rekam Medis</th>
        <th scope="col">Pasien</th>
        <th scope="col">Usia</th>
        <th scope="col">Poli</th>
    </tr>
  </thead>
  <?php
    if(isset($_GET['page'])){
        $page = ($_GET['page']-1)*10;
    } else {
        $page = 0;
    }
    $data_poliklinik = query("select pendaftaran.*, pasien.*, poliklinik.*, round(DATEDIFF(CURRENT_DATE, STR_TO_DATE(pasien.tgl_lahir, '%Y-%m-%d'))/365) as 'umur' from pendaftaran join pasien on pasien.norm=pendaftaran.norm join poliklinik on poliklinik.kd_poli=pendaftaran.kd_poli limit 10 offset $page")
  ?>
  <tbody>
    <?php foreach ($data_poliklinik as $poliklinik): ?>
    <tr>
      <td><?= $poliklinik['tgl_reg'] ?></td>
      <td><?= $poliklinik['norm'] ?></td>
      <td><?= $poliklinik['nama'] ?></td>
      <td><?= $poliklinik['umur'] ?></td>
      <td><?= $poliklinik['nm_poli'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div class="page position-relative d-flex justify-content-center">
    <?php
        $total = query("select count(kd_poli) as 'total' from poliklinik")[0]['total'];
        $total = round($total[0]/10)+1;
        if($page>$total){
            echo "<script>location.href='dashboard.php'</script>";
        }

    ?>
    <?php for($i=1; $i<=$total; $i++): ?>
    <a href="dashboard.php?tab=lapPoliklinik&page=<?= $i ?>">
        <div class="page-item px-2 py-1 bg-white text-black border border-1"><?= $i ?></div>
    </a>
    <?php endfor; ?>
</div>
