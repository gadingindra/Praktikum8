<?php
    session_start();
    require 'db_peserta-didik.php';

    // Penyimpanan data sementara di dalam session
    if (isset($_POST['submit'])) {
        // Menyimpan data ke dalam variabel session
        $_SESSION['form_bag2'] = [
            'nama_lengkap' => $_POST['nama_lengkap'],
            'jenis_kelamin' => $_POST['jenis_kelamin'],
            'nisn' => $_POST['nisn'],
            'nik' => $_POST['nik'],
            'tempat_lahir' => $_POST['tempat_lahir'],
            'tgl_lahir' => $_POST['tgl_lahir'],
            'agama' => $_POST['agama'],
            'kebutuhan_khusus' => $_POST['kebutuhan_khusus'],
            'alamat_jalan' => $_POST['alamat_jalan'],
            'rt_rw' => $_POST['rt_rw'],
            'dusun' => $_POST['dusun'],
            'kelurahan_desa' => $_POST['kelurahan_desa'],
            'kecamatan' => $_POST['kecamatan'],
            'kode_pos' => $_POST['kode_pos'],
            'tempat_tinggal' => $_POST['tempat_tinggal'],
            'moda_transportasi' => $_POST['moda_transportasi'],
            'no_hp' => $_POST['no_hp'],
            'email' => $_POST['email'],
            'kps_kks_pkh_kip' => $_POST['kps_kks_pkh_kip'],
            'no_kps_kks_pkh_kip' => $_POST['no_kps_kks_pkh_kip'],
            'kewarganegaraan' => $_POST['kewarganegaraan']
        ];

        // Meneruskan ke halaman form bagian 3 : form data ayah
        header('Location: form_bag3.php');
        exit;
    }

    // Pengecekan isi data dalam session
    if (isset($_SESSION['form_bag2'])) {
        $nama_lengkap = $_SESSION['form_bag2']['nama_lengkap'];
        $jenis_kelamin = $_SESSION['form_bag2']['jenis_kelamin'];
        $nisn = $_SESSION['form_bag2']['nisn'];
        $nik = $_SESSION['form_bag2']['nik'];
        $tempat_lahir = $_SESSION['form_bag2']['tempat_lahir'];
        $tgl_lahir = $_SESSION['form_bag2']['tgl_lahir'];
        $agama = $_SESSION['form_bag2']['agama'];
        $kebutuhan_khusus = $_SESSION['form_bag2']['kebutuhan_khusus'];
        $alamat_jalan = $_SESSION['form_bag2']['alamat_jalan'];
        $rt_rw = $_SESSION['form_bag2']['rt_rw'];
        $dusun = $_SESSION['form_bag2']['dusun'];
        $kelurahan_desa = $_SESSION['form_bag2']['kelurahan_desa'];
        $kecamatan = $_SESSION['form_bag2']['kecamatan'];
        $kode_pos = $_SESSION['form_bag2']['kode_pos'];
        $tempat_tinggal = $_SESSION['form_bag2']['tempat_tinggal'];
        $moda_transportasi = $_SESSION['form_bag2']['moda_transportasi'];
        $no_hp = $_SESSION['form_bag2']['no_hp'];
        $email = $_SESSION['form_bag2']['email'];
        $kps_kks_pkh_kip = $_SESSION['form_bag2']['kps_kks_pkh_kip'];
        $no_kps_kks_pkh_kip = $_SESSION['form_bag2']['no_kps_kks_pkh_kip'];
        $kewarganegaraan = $_SESSION['form_bag2']['kewarganegaraan'];
    } else {
        $nama_lengkap = '';
        $jenis_kelamin = '';
        $nisn = '';
        $nik = '';
        $tempat_lahir = '';
        $tgl_lahir = '';
        $agama = '';
        $kebutuhan_khusus = '';
        $alamat_jalan = '';
        $rt_rw = '';
        $dusun = '';
        $kelurahan_desa = '';
        $kecamatan = '';
        $kode_pos = '';
        $tempat_tinggal = '';
        $moda_transportasi = '';
        $no_hp = '';
        $email = '';
        $kps_kks_pkh_kip = '';
        $no_kps_kks_pkh_kip = '';
        $kewarganegaraan = '';
    }

    // Kembali ke halaman sebelumnya
    if (isset($_POST['back'])) {
        header('Location: form_bag1.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Peserta Didik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Pribadi</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                        <div class="mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="<?php echo isset($nama_lengkap) ? $nama_lengkap : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin">
                                    <option value="">- Pilih Jenis Kelamin -</option>
                                    <?php $query_jenis_kelamin = "SELECT * FROM jenis_kelamin";
                                        $result_jenis_kelamin = mysqli_query($koneksi, $query_jenis_kelamin);
                                        while ($row_jenis_kelamin = mysqli_fetch_assoc($result_jenis_kelamin)) { 
                                    $kode_jenis_kelamin = $row_jenis_kelamin['kode_jenis_kelamin']; ?>
                                        <option value="<?php echo $row_jenis_kelamin['kode_jenis_kelamin']; ?>" <?php if ($jenis_kelamin == $kode_jenis_kelamin) echo 'selected'; ?> name="jenis_kelamin">
                                            <?php echo $row_jenis_kelamin['nama_jenis_kelamin']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>NISN</label>
                                <input type="text" name="nisn" class="form-control" value="<?php echo isset($nisn) ? $nisn : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>NIK</label>
                                <input type="text" name="nik" class="form-control" value="<?php echo isset($nik) ? $nik : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" value="<?php echo isset($tempat_lahir) ? $tempat_lahir : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" value="<?php echo isset($tgl_lahir) ? $tgl_lahir : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Agama</label>
                                <select class="form-control" name="agama">
                                    <option value="">- Pilih Agama -</option>
                                    <?php $query_agama = "SELECT * FROM agama";
                                        $result_agama = mysqli_query($koneksi, $query_agama);
                                        while ($row_agama = mysqli_fetch_assoc($result_agama)) { 
                                    $id_agama = $row_agama['id_agama']; ?>
                                        <option value="<?php echo $row_agama['id_agama']; ?>" <?php if ($agama == $id_agama) echo 'selected'; ?> name="agama">   
                                        <?php echo $row_agama['nama_agama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Berkebutuhan Khusus</label>
                                <select class="form-control" name="kebutuhan_khusus">
                                    <option value="">- Keterangan -</option>
                                    <?php $query_kebutuhan_khusus = "SELECT * FROM kebutuhan_khusus";
                                        $result_kebutuhan_khusus = mysqli_query($koneksi, $query_kebutuhan_khusus);
                                        while ($row_kebutuhan_khusus = mysqli_fetch_assoc($result_kebutuhan_khusus)) { 
                                    $id_kebutuhan_khusus = $row_kebutuhan_khusus['id_kebutuhan_khusus'];?>
                                        <option value="<?php echo $row_kebutuhan_khusus['id_kebutuhan_khusus']; ?>" <?php if ($kebutuhan_khusus == $id_kebutuhan_khusus) echo 'selected'; ?> name="kebutuhan_khusus">   
                                        <?php echo $row_kebutuhan_khusus['nama_kebutuhan_khusus']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Alamat Jalan</label>
                                <input type="text" name="alamat_jalan" class="form-control" value="<?php echo isset($alamat_jalan) ? $alamat_jalan : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>RT/RW</label>
                                <input type="text" name="rt_rw" class="form-control" value="<?php echo isset($rt_rw) ? $rt_rw : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Nama Dusun</label>
                                <input type="text" name="dusun" class="form-control" value="<?php echo isset($dusun) ? $dusun : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Nama Kelurahan/Desa</label>
                                <input type="text" name="kelurahan_desa" class="form-control" value="<?php echo isset($kelurahan_desa) ? $kelurahan_desa : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control" value="<?php echo isset($kecamatan) ? $kecamatan : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Kode Pos</label>
                                <input type="text" name="kode_pos" class="form-control" value="<?php echo isset($kode_pos) ? $kode_pos : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Tempat Tinggal</label>
                                <select class="form-control" name="tempat_tinggal">
                                    <option value="">- Pilih Tempat Tinggal -</option>
                                    <?php $query_tempat_tinggal = "SELECT * FROM tempat_tinggal";
                                        $result_tempat_tinggal = mysqli_query($koneksi, $query_tempat_tinggal);
                                        while ($row_tempat_tinggal = mysqli_fetch_assoc($result_tempat_tinggal)) { 
                                    $id_tempat_tinggal = $row_tempat_tinggal['id_tempat_tinggal'];?>
                                        <option value="<?php echo $row_tempat_tinggal['id_tempat_tinggal']; ?>" <?php if ($tempat_tinggal == $id_tempat_tinggal) echo 'selected'; ?> name="tempat_tinggal">   
                                        <?php echo $row_tempat_tinggal['nama_tempat_tinggal']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Moda Transportasi</label>
                                <select class="form-control" name="moda_transportasi">
                                    <option value="">- Pilih Moda Transportasi -</option>
                                    <?php $query_moda_transportasi = "SELECT * FROM moda_transportasi";
                                        $result_moda_transportasi = mysqli_query($koneksi, $query_moda_transportasi);
                                        while ($row_moda_transportasi = mysqli_fetch_assoc($result_moda_transportasi)) { 
                                    $id_moda_transportasi = $row_moda_transportasi['id_moda_transportasi'];?>
                                        <option value="<?php echo $row_moda_transportasi['id_moda_transportasi']; ?>" <?php if ($moda_transportasi == $id_moda_transportasi) echo 'selected'; ?> name="moda_transportasi">
                                        <?php echo $row_moda_transportasi['nama_moda_transportasi']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>No. HP</label>
                                <input type="text" name="no_hp" class="form-control" value="<?php echo isset($no_hp) ? $no_hp : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo isset($email) ? $email : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Penerima KPS/KKS/PKH/KIP?</label>
                                <select class="form-control" name="kps_kks_pkh_kip">
                                    <option value="">- Keterangan -</option>
                                    <?php $query_kps_kks_pkh_kip = "SELECT * FROM kps_kks_pkh_kip";
                                        $result_kps_kks_pkh_kip = mysqli_query($koneksi, $query_kps_kks_pkh_kip);
                                        while ($row_kps_kks_pkh_kip = mysqli_fetch_assoc($result_kps_kks_pkh_kip)) { 
                                    $id_kps = $row_kps_kks_pkh_kip['kode_kps_kks_pkh_kip'];?>
                                        <option value="<?php echo $row_kps_kks_pkh_kip['kode_kps_kks_pkh_kip']; ?>" <?php if ($kps_kks_pkh_kip == $id_kps) echo 'selected'; ?> name="kps_kks_pkh_kip">
                                        <?php echo $row_kps_kks_pkh_kip['keterangan']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>No. KPS/KKS/PKH/KIP</label>
                                <input type="text" name="no_kps_kks_pkh_kip" class="form-control" value="<?php echo isset($kps_kks_pkh_kip) ? $kps_kks_pkh_kip : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Kewarganegaraan</label>
                                <select class="form-control" name="kewarganegaraan">
                                    <option value="">- Pilih Kewarganegaraan -</option>
                                    <?php $query_kewarganegaraan = "SELECT * FROM kewarganegaraan";
                                        $result_kewarganegaraan = mysqli_query($koneksi, $query_kewarganegaraan);
                                        while ($row_kewarganegaraan = mysqli_fetch_assoc($result_kewarganegaraan)) { 
                                    $id_kewarganegaraan = $row_kewarganegaraan['kode_kewarganegaraan'];?>
                                        <option value="<?php echo $row_kewarganegaraan['kode_kewarganegaraan']; ?>" <?php if ($kewarganegaraan == $id_kewarganegaraan) echo 'selected'; ?> name="kewarganegaraan"> 
                                        <?php echo $row_kewarganegaraan['keterangan']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <!-- button untuk kembali -->
                                <button type="submit" class="btn btn-primary float-start" id="back"
                                    name="back">Back</button>
                                <!-- button untuk lanjut -->
                                <button type="submit" class="btn btn-primary float-end mx-1" id="submit"
                                    name="submit">Next</button>
                                <!-- button reset -->
                                <button type="reset" class="btn btn-danger float-end" name="reset">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

</html>