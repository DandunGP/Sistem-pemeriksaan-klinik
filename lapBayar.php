<h1>Tabel Bayar</h1>
<table class="table table-striped">
  <thead>
    <tr>
        <th scope="col">NO Bayar</th>
        <th scope="col">Nama Bayar</th>
    </tr>
  </thead>
  <?php
    if(isset($_GET['page'])){
        $page = ($_GET['page']-1)*10;
    } else {
        $page = 0;
    }
    $data_bayar = query("select * from pembayaran limit 10 offset $page")
  ?>
  <tbody>
    <?php foreach ($data_bayar as $bayar): ?>
    <tr>
        <td><?= $bayar['kd_bayar'] ?></td>
        <td><?= $bayar['nm_bayar'] ?></td>
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
