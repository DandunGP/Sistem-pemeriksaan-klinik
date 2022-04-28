<h1>Tabel Bayar</h1>
<table class="table table-striped">
  <thead>
    <tr>
        <th scope="col">Tanggal</th>
        <th scope="col">No Rekam Medis</th>
        <th scope="col">Pasien</th>
        <th scope="col">Nominal</th>
    </tr>
  </thead>
  <?php
    if(isset($_GET['page'])){
        $page = ($_GET['page']-1)*10;
    } else {
        $page = 0;
    }
    $data_bayar = query("select pendaftaran.*, pasien.*, pembayaran.* from pendaftaran join pasien on pasien.norm=pendaftaran.norm join pembayaran on pembayaran.kd_bayar=pendaftaran.kd_bayar limit 10 offset $page")
  ?>
  <tbody>
    <?php foreach ($data_bayar as $bayar): ?>
    <tr>
        <td><?= $bayar['tgl_reg'] ?></td>
        <td><?= $bayar['norm'] ?></td>
        <td><?= $bayar['nama'] ?></td>
        <td>
          <?php
            if($bayar['kd_bayar']=="B001"){
              echo $bayar['nm_bayar'];
            } else {
              echo rupiah($bayar['nominal']);
            }
          ?>
        </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div class="page position-relative d-flex justify-content-center">
    <?php
        $total = query("select count(kd_bayar) as 'total' from pembayaran")[0]['total'];
        $total = round($total[0]/10)+1;
        if($page>$total){
            echo "<script>location.href='dashboard.php'</script>";
        }

    ?>
    <?php for($i=1; $i<=$total; $i++): ?>
    <a href="dashboard.php?tab=lapBayar&page=<?= $i ?>">
        <div class="page-item px-2 py-1 bg-white text-black border border-1"><?= $i ?></div>
    </a>
    <?php endfor; ?>
</div>
