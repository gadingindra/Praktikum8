<?php
    session_start();
    require 'db_peserta-didik.php';

    // Penyimpanan data sementara di dalam session
    if (isset($_POST['submit'])) {
        // Menyimpan data ke dalam variabel session
        $_SESSION['form_bag1'] = [
            'pendaftaran' => $_POST['pendaftaran'],
            'tgl_masuk' => $_POST['tgl_masuk'],
            'nis' => $_POST['nis'],
            'no_ujian' => $_POST['no_ujian'],
            'paud' => $_POST['paud'],
            'tk' => $_POST['tk'],
            'no_skhun' => $_POST['no_skhun'],
            'no_ijazah' => $_POST['no_ijazah'],
            'hobi' => $_POST['hobi'],
            'cita' => $_POST['cita']
        ];
        
        // Meneruskan ke halaman form bagian 2 : form data pribadi
        header('Location: form_bag2.php');
        exit;
    }

    // Pengecekan isi data dalam session
    if (isset($_SESSION['form_bag1'])) {
        $pendaftaran = $_SESSION['form_bag1']['pendaftaran'];
        $tgl_masuk = $_SESSION['form_bag1']['tgl_masuk'];
        $nis = $_SESSION['form_bag1']['nis'];
        $no_ujian = $_SESSION['form_bag1']['no_ujian'];
        $paud = $_SESSION['form_bag1']['paud'];
        $tk = $_SESSION['form_bag1']['tk'];
        $no_skhun = $_SESSION['form_bag1']['no_skhun'];
        $no_ijazah = $_SESSION['form_bag1']['no_ijazah'];
        $hobi = $_SESSION['form_bag1']['hobi'];
        $cita = $_SESSION['form_bag1']['cita'];
    } else {
        $tgl_registrasi = '';
        $pendaftaran = '';
        $tgl_masuk = '';
        $nis = '';
        $no_ujian = '';
        $paud = '';
        $tk = '';
        $no_skhun = '';
        $no_ijazah = '';
        $hobi = '';
        $cita = '';
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
                        <h4>Registrasi Peserta Didik
                            <a href="login.php" class="btn btn-danger float-end">LOG OUT</a>
                        </h4>
                        <?php date_default_timezone_set("Asia/Jakarta");?>
                    </div>
                    <div class="card-body">
                        <form id="" action="" method="POST">
                            <div class="mb-3">
                                <label>Tanggal Dibuat</label>
                                <input type="text" name="tgl_dibuat" class="form-control" readonly value="<?php echo date("D d-F-Y, g:i:s a") ?>">
                            </div>
                            <div class="mb-3">
                                <label>Jenis Pendaftaran</label>
                                <select class="form-control" name="pendaftaran">
                                    <option value="">- Pilih Jenis Pendaftaran -</option>
                                    <?php $query_pendaftaran = "SELECT * FROM jenis_pendaftaran";
                                         $result_pendaftaran = mysqli_query($koneksi, $query_pendaftaran);
                                        while ($row_pendaftaran = mysqli_fetch_assoc($result_pendaftaran)) { 
                                    $id_pendaftaran = $row_jenis_pendaftaran['id_pendaftaran'];?>
                                        <option value="<?php echo $row_pendaftaran['id_pendaftaran']; ?>" <?php if ($pendaftaran == $id_pendaftaran) echo 'selected'; ?> name="pendaftaran">
                                            <?php echo $row_pendaftaran['keterangan_pendaftaran']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Tanggal Masuk</label>
                                <input type="date" name="tgl_masuk" class="form-control" value="<?php echo isset($tgl_masuk) ? $tgl_masuk : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>NIS</label>
                                <input type="text" name="nis" class="form-control" value="<?php echo isset($nis) ? $nis : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>No. Peserta Ujian</label>
                                <input type="text" name="no_ujian" class="form-control" value="<?php echo isset($no_ujian) ? $no_ujian : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Pernah PAUD?</label>
                                <select class="form-control" name="paud">
                                    <option value="">- Keterangan -</option>
                                    <?php $query_paud = "SELECT * FROM paud";
                                        $result_paud = mysqli_query($koneksi, $query_paud);
                                        while ($row_paud = mysqli_fetch_assoc($result_paud)) { 
                                    $kode_paud = $row_paud['kode_paud'];?>
                                        <option value="<?php echo $row_paud['kode_paud']; ?>" <?php if ($paud == $kode_paud) echo 'selected'; ?> name="paud">   
                                        <?php echo $row_paud['keterangan']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Pernah TK?</label>
                                <select class="form-control" name="tk">
                                    <option value="">- Keterangan -</option>
                                    <?php $query_tk = "SELECT * FROM tk";
                                        $result_tk = mysqli_query($koneksi, $query_tk);
                                        while ($row_tk = mysqli_fetch_assoc($result_tk)) { 
                                    $kode_tk = $row_tk['kode_tk'];?>
                                        <option value="<?php echo $row_tk['kode_tk']; ?>" <?php if ($tk == $kode_tk) echo 'selected'; ?> name="tk"> 
                                        <?php echo $row_tk['keterangan']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>No. Seri SKHUN</label>
                                <input type="text" name="no_skhun" class="form-control" value="<?php echo isset($no_skhun) ? $no_skhun : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>No. Ijazah</label>
                                <input type="text" name="no_ijazah" class="form-control" value="<?php echo isset($no_ijazah) ? $no_ijazah : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Hobi</label>
                                <select class="form-control" name="hobi">
                                    <option value="">- Pilih Hobi -</option>
                                    <?php $query_hobi = "SELECT * FROM hobi";
                                        $result_hobi = mysqli_query($koneksi, $query_hobi);
                                        while ($row_hobi = mysqli_fetch_assoc($result_hobi)) { 
                                    $id_hobi = $row_hobi['id_hobi'];?>
                                        <option value="<?php echo $row_hobi['id_hobi']; ?>" <?php if ($hobi == $id_hobi) echo 'selected'; ?> name="hobi">   
                                        <?php echo $row_hobi['nama_hobi']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Cita-cita</label>
                                <select class="form-control" name="cita">
                                    <option value="">- Pilih Cita-cita -</option>
                                    <?php $query_cita = "SELECT * FROM cita";
                                        $result_cita = mysqli_query($koneksi, $query_cita);
                                        while ($row_cita = mysqli_fetch_assoc($result_cita)) { 
                                    $id_cita = $row_cita_cita['id_cita'];?>
                                        <option value="<?php echo $row_cita['id_cita']; ?>" <?php if ($cita == $id_cita) echo 'selected'; ?> name="cita"> 
                                        <?php echo $row_cita['nama_cita']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <!-- button submit -->
                                <button type="submit" class="btn btn-primary float-end mx-1" id="submit" name="submit">Next</button>
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