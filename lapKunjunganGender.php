<h1>Laporan Per Gender</h1>
    <form id="formTanggal" action="" method="post" class="float-right">
    <div class="">
        <label for="gender">Umur</label>
        <select name="gender" class="ml-3">
            <option class="submitGender" value="all">Semua</option>
            <option class="submitGender" value="Laki-laki">Laki-Laki</option>
            <option class="submitGender" value="Perempuan">Perempuan</option>
        </select>
        <br>
        <input type="submit" name="submitGender" class="btn btn-primary w-100" value="Cek" >
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
    if(isset($_POST['submitGender'])){
        $gender = $_POST['gender'];
        if($gender == 'all'){
            $data_jadwal = query("select pendaftaran.*, pasien.*, dokter.*, pembayaran.*, poliklinik.* from pendaftaran join pasien on pasien.norm=pendaftaran.norm join dokter on dokter.kode_dokter=pendaftaran.kode_dokter join pembayaran on pembayaran.kd_bayar=pendaftaran.kd_bayar join poliklinik on poliklinik.kd_poli=pendaftaran.kd_poli order by tgl_reg desc limit 10 offset $page");
        } else {
            $data_gender = query("SELECT norm FROM pasien where jenis_kelamin='$gender'");
            $list_gender = "";
            foreach ($data_gender as $norm) {
                $list_gender = "{$list_gender}{$norm['norm']},";
            }
            if($list_gender != null){
                $list_gender = substr($list_gender, 0, strlen($list_gender)-1);

                $data_jadwal = query("select pendaftaran.*, pasien.*, dokter.*, pembayaran.*, poliklinik.* from pendaftaran join pasien on pasien.norm=pendaftaran.norm join dokter on dokter.kode_dokter=pendaftaran.kode_dokter join pembayaran on pembayaran.kd_bayar=pendaftaran.kd_bayar join poliklinik on poliklinik.kd_poli=pendaftaran.kd_poli where pendaftaran.norm in ($list_gender)");
            } else {
                $data_jadwal = array();
            }
        }
    } else {
        $data_jadwal = query("select pendaftaran.*, pasien.*, dokter.*, pembayaran.*, poliklinik.* from pendaftaran join pasien on pasien.norm=pendaftaran.norm join dokter on dokter.kode_dokter=pendaftaran.kode_dokter join pembayaran on pembayaran.kd_bayar=pendaftaran.kd_bayar join poliklinik on poliklinik.kd_poli=pendaftaran.kd_poli order by tgl_reg desc");
    }
  ?>
  <tbody>
    <?php foreach ($data_jadwal as $jadwal): ?>
    <tr>
        <td><?= $jadwal['noreg'] ?></td>
        <td><?= $jadwal['tgl_reg'] ?></td>
        <td><?= "{$jadwal['norm']} -- {$jadwal['nama']}" ?></td>
        <td><?= $jadwal['nama_dokter'] ?></td>
        <td><?php 
            if($jadwal['kd_bayar']=='B000'){
                echo rupiah($jadwal['nominal']);
            } else {
                echo $jadwal['nm_bayar'];
            }
        ?></td>
        <td><?= $jadwal['nm_poli'] ?></td>
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
    <a href="dashboard.php?tab=lapJadwal&page=<?= $i ?>">
        <div class="page-item px-2 py-1 bg-white text-black border border-1"><?= $i ?></div>
    </a>
    <?php endfor; ?>
    <?php endif; ?>
</div>