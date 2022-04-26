<h1>Tabel Poliklinik</h1>
<table class="table table-striped">
  <thead>
    <tr>
        <th scope="col">Kode Poliklinik</th>
        <th scope="col">Nama Poliklinik</th>
    </tr>
  </thead>
  <?php
    if(isset($_GET['page'])){
        $page = ($_GET['page']-1)*10;
    } else {
        $page = 0;
    }
    $data_poliklinik = query("select * from poliklinik limit 10 offset $page")
  ?>
  <tbody>
    <?php foreach ($data_poliklinik as $poliklinik): ?>
    <tr>
      <td><?= $poliklinik['kd_poli'] ?></td>
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
