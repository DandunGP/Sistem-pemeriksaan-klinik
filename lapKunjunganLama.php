<h1>Tabel Kunjungan Baru</h1>
    <form id="formTanggal" action="" method="post" class="float-right">
    <?php
        $data_tanggal = query("select tgl_reg from pendaftaran group by tgl_reg");
    ?>
    <div class="">
        <label for="tanggal">Tanggal</label>
        <select name="tanggal" class="ml-3">
            <?php foreach ($data_tanggal as $tgl): ?>
            <option class="submitTanggal" value="<?= $tgl['tgl_reg'] ?>" onclick=""><?= $tgl['tgl_reg'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <input type="submit" name="submitTanggal" class="btn btn-primary w-100" value="Cek" >
    </div>
    </form>
<table class="table table-striped">
  <thead>
    <tr>
        <th scope="col">No Registrasi</th>
        <th scope="col">Tanggal Registrasi</th>
        <th scope="col">Pasien</th>
        <th scope="col">Dokter</th>
        <th scope="col">Bayar</th>
        <th scope="col">Poli</th>
    </tr>
  </thead>
  <?php
    if(isset($_GET['page'])){
        $page = ($_GET['page']-1)*10;
    } else {
        $page = 0;
    }
    if(isset($_POST['submitTanggal'])){
        $tanggal = $_POST['tanggal'];
        $arrayBaru = array();
        $cekPasien = query("select norm from pendaftaran where tgl_reg='$tanggal'");
        foreach($cekPasien as $pasien){
            $norm = $pasien['norm'];
            $cekBaru = query("select norm from pendaftaran where norm='$norm' and tgl_reg<'$tanggal'");
            if($cekBaru != null){
                array_push($arrayBaru, $norm);
            }
        }
        $pasienBaru = "";
        if($arrayBaru != null){
            foreach ($arrayBaru as $baru){
                $pasienBaru = "'$pasienBaru$baru',";
            }
            $pasienBaru = substr($pasienBaru, 0, strlen($pasienBaru)-1);
            $data_baru = query("select pendaftaran.*, pasien.*, dokter.*, pembayaran.*, poliklinik.* from pendaftaran join pasien on pasien.norm=pendaftaran.norm join dokter on dokter.kode_dokter=pendaftaran.kode_dokter join pembayaran on pembayaran.kd_bayar=pendaftaran.kd_bayar join poliklinik on poliklinik.kd_poli=pendaftaran.kd_poli where pendaftaran.norm in ($pasienBaru)");
        } else {
            $data_baru = query("select pendaftaran.*, pasien.*, dokter.*, pembayaran.*, poliklinik.* from pendaftaran join pasien on pasien.norm=pendaftaran.norm join dokter on dokter.kode_dokter=pendaftaran.kode_dokter join pembayaran on pembayaran.kd_bayar=pendaftaran.kd_bayar join poliklinik on poliklinik.kd_poli=pendaftaran.kd_poli where noreg=''");
        }
    } else {
        $data_baru = query("select pendaftaran.*, pasien.*, dokter.*, pembayaran.*, poliklinik.* from pendaftaran join pasien on pasien.norm=pendaftaran.norm join dokter on dokter.kode_dokter=pendaftaran.kode_dokter join pembayaran on pembayaran.kd_bayar=pendaftaran.kd_bayar join poliklinik on poliklinik.kd_poli=pendaftaran.kd_poli where noreg=''");
    }
  ?>
  <tbody>
    <?php foreach ($data_baru as $baru): ?>
    <tr>
        <td><?= $baru['noreg'] ?></td>
        <td><?= $baru['tgl_reg'] ?></td>
        <td><?= $baru['nama'] ?></td>
        <td><?= $baru['nama_dokter'] ?></td>
        <td><?= $baru['nm_bayar'] ?></td>
        <td><?= $baru['nm_poli'] ?></td>
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
    <?php if(!isset($_POST['tanggal']) || $_POST['tanggal'] == 'all'): ?>
    <?php for($i=1; $i<=$total; $i++): ?>
    <a href="dashboard.php?tab=lapKunjunganLama&page=<?= $i ?>">
        <div class="page-item px-2 py-1 bg-white text-black border border-1"><?= $i ?></div>
    </a>
    <?php endfor; ?>
    <?php endif; ?>
</div>