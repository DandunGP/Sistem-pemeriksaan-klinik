
    <h1>Tabel Pembayaran</h1>
    <a href="dashboard.php?tab=formBayar" class="btn btn-primary pl-3 py-1"><i class="fa-solid fa-user-plus pr-2"></i>Tambah Pembayaran</a>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">NO Bayar</th>
            <th scope="col">Nama Bayar</th>
            <th scope="col">Keterangan</th>
          </tr>
        </thead>
        <?php
          $data_bayar = query("select * from pembayaran")
        ?>
        <tbody>
          <?php foreach ($data_bayar as $bayar): ?>
         <tr>
             <td><?= $bayar['kd_bayar'] ?></td>
             <td><?= $bayar['nm_bayar'] ?></td>
             <td>
               <a href="dashboard.php?tab=editBayar&kd_bayar=<?= $bayar['kd_bayar'] ?>" class="btn btn-success pl-3 py-0"><i class="fa-solid fa-pen pr-2"></i>Edit</a>
               <a href="dashboard.php?tab=deleteBayar&kd_bayar=<?= $bayar['kd_bayar'] ?>" class="btn btn-danger pl-3 py-0" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash pr-2"></i>Delete</a>
             </td>
         </tr>
         <?php endforeach; ?>
        </tbody>
      </table>
