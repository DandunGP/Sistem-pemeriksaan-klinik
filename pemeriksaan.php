<h1>Tabel Pemeriksaan</h1>
<a href="dashboard.php?tab=formPemeriksaan" class="btn btn-primary pl-3 py-1"><i class="fa-solid fa-user-plus pr-2"></i>Tambah Pemeriksaan</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Tanggal Pemeriksaan</th>
      <th scope="col">Pasien</th>
      <th scope="col">Dokter</th>
      <th scope="col">Anamnesa</th>
      <th scope="col">Tinggi Badan</th>
      <th scope="col">Berat Badan</th>
      <th scope="col">TD</th>
      <th scope="col">SH</th>
      <th scope="col">ND</th>
      <th scope="col">Diagnosa</th>
      <th scope="col">Tindakan</th>
      <th scope="col">Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = "select pemeriksaan.*, pasien.*, dokter.* from pemeriksaan join pasien on pasien.norm=pemeriksaan.norm join dokter on pemeriksaan.kode_dokter = dokter.kode_dokter";
    $data = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($data)) {
    ?>
      <tr>
        <td><?= $row['tgl_per'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['nama_dokter'] ?></td>
        <td><?= $row['anamnesa'] ?></td>
        <td><?= $row['tb'] ?></td>
        <td><?= $row['bb'] ?></td>
        <td><?= $row['td'] ?></td>
        <td><?= $row['sh'] ?></td>
        <td><?= $row['nd'] ?></td>
        <td><?= $row['diagnosa'] ?></td>
        <td><?= $row['tindakan'] ?></td>
        <td>
          <a href="dashboard.php?tab=editPemeriksaan&id=<?= $row['no_per'] ?>" class="btn btn-success pl-3 py-0"><i class="fa-solid fa-pen pr-2"></i>Edit</a>
          <a href="deletePemeriksaan.php?id=<?= $row['no_per'] ?>" class="btn btn-danger pl-3 py-0" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash pr-2"></i>Delete</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>