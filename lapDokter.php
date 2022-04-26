<h1>Tabel Dokter</h1>
<table class="table table-striped">
  <thead>
    <tr>
        <th scope="col">Kode Dokter</th>
        <th scope="col">Nama Dokter</th>
        <th scope="col">Alamat Dokter</th>
        <th scope="col">Spesialis</th>
        <th scope="col">Username</th>
    </tr>
  </thead>
  <?php
    if(isset($_GET['page'])){
        $page = ($_GET['page']-1)*10;
    } else {
        $page = 0;
    }
    $data_dokter = query("select * from dokter limit 10 offset $page")
  ?>
  <tbody>
    <?php foreach ($data_dokter as $dokter): ?>
    <tr>
        <td><?= $dokter['kode_dokter'] ?></td>
        <td><?= $dokter['nama_dokter'] ?></td>
        <td><?= $dokter['alamat_dokter'] ?></td>
        <td><?= $dokter['spesialis'] ?></td>
        <td><?= $dokter['username'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div class="page position-relative d-flex justify-content-center">
    <?php
        $total = query("select count(kode_dokter) as 'total' from dokter")[0]['total'];
        $total = round($total[0]/10)+1;
        if($page>$total){
            echo "<script>location.href='dashboard.php'</script>";
        }

    ?>
    <?php for($i=1; $i<=$total; $i++): ?>
    <a href="dashboard.php?tab=lapDokter&page=<?= $i ?>">
        <div class="page-item px-2 py-1 bg-white text-black border border-1"><?= $i ?></div>
    </a>
    <?php endfor; ?>
</div>
