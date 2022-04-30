<h1>Tabel Pasien</h1>
<form class="float-right" method="post" action="">
  <label for="search">Kata Kunci</label>
  <input type="text" name="search" placeholder="Type 'NORM' or 'Nama'" class="px-2">
  <br>
  <input type="submit" name="cari" class="btn btn-primary w-100" value="Cari">
</form>
<a href="dashboard.php?tab=formPasien" class="btn btn-primary pl-3 py-1"><i
    class="fa-solid fa-user-plus pr-2"></i>Tambah
  Pasien</a>
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
      <th scope="col">Keterangan</th>
    </tr>
  </thead>
  <?php
    if(isset($_POST['cari'])){
      $kunci = $_POST['search'];
      if($kunci == ''){
        $data_pasien = query("select * from pasien");
      } else {
        $data_pasien = query("select * from pasien where norm like '%$kunci%' or nama like '%$kunci%'");
      }
    } else {
      $data_pasien = query("select * from pasien");
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
        <a href="dashboard.php?tab=editPasien&norm=<?= $pasien['norm'] ?>" class="btn btn-success pl-3 py-0"><i
            class="fa-solid fa-pen pr-2"></i>Edit</a>
            <?php
              $cekPasien = query("select * from pendaftaran where norm='{$pasien['norm']}'");

              if($cekPasien == null):
            ?>
        <a href="dashboard.php?tab=controlPasien&norm=<?= $pasien['norm'] ?>" class="btn btn-danger pl-3 py-0"><i
            class="fa-solid fa-heart-circle-plus pr-2"></i>Kontrol</a>
            <?php else: ?>
              <a href="dashboard.php?tab=formPendaftaran&norm=<?= $pasien['norm'] ?>" class="btn btn-info pl-3 py-0"><i
            class="fa-solid fa-calendar-plus pr-2"></i>Daftar</a>
            <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>