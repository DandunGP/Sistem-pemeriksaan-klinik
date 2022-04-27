<h1>Laporan Kunjungan PerBulan</h1>
    <form id="formTanggal" action="" method="post" class="float-right">
    <?php
        $data_tanggal = ["Januari", "Februari", "Maret", "April", "Mei", "June", "July", "Augustus", "September", "Oktober", "November", "Desember"];
    ?>
    <div class="">
        <label for="tanggal">Bulan</label>
        <select name="tanggal" class="ml-3">
            <option class="submitTanggal" value="all">Semua</option>
            <?php for($i=0;$i<count($data_tanggal);$i++): ?>
            <option class="submitTanggal" value="<?= $i+1 ?>"><?= $data_tanggal[$i] ?></option>
            <?php endfor; ?>
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
        if($tanggal == 'all'){
            $data_jadwal = query("select pendaftaran.*, pasien.*, dokter.*, pembayaran.*, poliklinik.* from pendaftaran join pasien on pasien.norm=pendaftaran.norm join dokter on dokter.kode_dokter=pendaftaran.kode_dokter join pembayaran on pembayaran.kd_bayar=pendaftaran.kd_bayar join poliklinik on poliklinik.kd_poli=pendaftaran.kd_poli order by tgl_reg desc limit 10 offset $page");
        } else {
            $tanggall = $tanggal +1;
            $data_jadwal = query("select pendaftaran.*, pasien.*, dokter.*, pembayaran.*, poliklinik.* from pendaftaran join pasien on pasien.norm=pendaftaran.norm join dokter on dokter.kode_dokter=pendaftaran.kode_dokter join pembayaran on pembayaran.kd_bayar=pendaftaran.kd_bayar join poliklinik on poliklinik.kd_poli=pendaftaran.kd_poli where tgl_reg between '2022-$tanggal-01' and '2022-$tanggall-01' limit 10 offset $page");
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
        <td><?= $jadwal['nama'] ?></td>
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