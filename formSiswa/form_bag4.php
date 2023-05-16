<?php
    session_start();
    require 'db_peserta-didik.php';

    // Penyimpanan data sementara di dalam session
    if (isset($_POST['submit'])) {
        // Menyimpan data ke dalam variabel session
        $_SESSION['form_bag4'] = [
            'nama_ibu' => $_POST['nama_ibu'],
            'ibu_tahun_lahir' => $_POST['tahun_lahir_ibu'],
            'ibu_pendidikan_ortu' => $_POST['pendidikan_ibu'],
            'ibu_pekerjaan_ortu' => $_POST['pekerjaan_ibu'],
            'ibu_penghasilan_ortu' => $_POST['penghasilan_ibu'],
            'ibu_berkebutuhan_khusus' => $_POST['kebutuhan_khusus_ibu']
        ];

        // Meneruskan ke halaman lihat inputan dan button submit ke database
        header('Location: view_submit.php');
        exit;
    }

    // Pengecekan isi data dalam session
    if (isset($_SESSION['form_bag4'])) {
        $nama_ibu = $_SESSION['form_bag4']['nama_ibu'];
        $tahun_lahir_ibu = $_SESSION['form_bag4']['ibu_tahun_lahir'];
        $pendidikan_ibu = $_SESSION['form_bag4']['ibu_pendidikan_ortu'];
        $pekerjaan_ibu = $_SESSION['form_bag4']['ibu_pekerjaan_ortu'];
        $penghasilan_ibu = $_SESSION['form_bag4']['ibu_penghasilan_ortu'];
        $kebutuhan_khusus_ibu = $_SESSION['form_bag4']['ibu_berkebutuhan_khusus'];
    } else {
        $nama_ibu = '';
        $tahun_lahir_ibu = '';
        $pendidikan_ibu = '';
        $pekerjaan_ibu = '';
        $penghasilan_ibu = '';
        $kebutuhan_khusus_ibu = '';
    }

    // Kembali ke halaman sebelumnya
    if (isset($_POST['back'])) {
        header('Location: form_bag2.php');
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
                        <h4>Data Ibu Kandung</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                        <div class="mb-3">
                                <label>Nama Ibu Kandung</label>
                                <input type="text" name="nama_ibu" class="form-control" value="<?php echo isset($nama_ibu) ? $nama_ibu : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Tahun Lahir</label>
                                <input type="text" name="tahun_lahir_ibu" class="form-control" value="<?php echo isset($tahun_lahir_ibu) ? $tahun_lahir_ibu : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Pendidikan Ibu</label>
                                <select class="form-control" name="pendidikan_ibu">
                                    <option value="">- Pilih Pendidikan -</option>
                                    <?php $query_pendidikan = "SELECT * FROM pendidikan_ortu";
                                        $result_pendidikan = mysqli_query($koneksi, $query_pendidikan);
                                        while ($row_pendidikan = mysqli_fetch_assoc($result_pendidikan)) { 
                                    $id_pendidikan_ortu = $row_pendidikan['id_pendidikan_ortu'];?>
                                        <option value="<?php echo $row_pendidikan['id_pendidikan_ortu']; ?>" <?php if ($pendidikan_ibu == $id_pendidikan_ortu) echo 'selected'; ?> name="pendidikan_ibu">
                                            <?php echo $row_pendidikan['nama_pendidikan_ortu']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Pekerjaan Ibu</label>
                                <select class="form-control" name="pekerjaan_ibu">
                                    <option value="">- Pilih Pekerjaan -</option>
                                    <?php $query_pekerjaan = "SELECT * FROM pekerjaan_ortu";
                                        $result_pekerjaan = mysqli_query($koneksi, $query_pekerjaan);
                                        while ($row_pekerjaan = mysqli_fetch_assoc($result_pekerjaan)) { 
                                    $id_pekerjaan_ortu = $row_pekerjaan['id_pekerjaan_ortu'];  ?>
                                        <option value="<?php echo $row_pekerjaan['id_pekerjaan_ortu']; ?>" <?php if ($pekerjaan_ibu == $id_pekerjaan_ortu) echo 'selected'; ?> name="pekerjaan_ibu">  
                                        <?php echo $row_pekerjaan['nama_pekerjaan_ortu']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Penghasilan Bulanan</label>
                                <select class="form-control" name="penghasilan_ibu">
                                    <option value="">- Pilih Penghasilan -</option>
                                    <?php $query_penghasilan = "SELECT * FROM penghasilan_ortu";
                                        $result_penghasilan = mysqli_query($koneksi, $query_penghasilan);
                                        while ($row_penghasilan = mysqli_fetch_assoc($result_penghasilan)) { 
                                    $id_penghasilan_ortu = $row_penghasilan_ortu['id_penghasilan_ortu']; ?>
                                        <option value="<?php echo $row_penghasilan['id_penghasilan_ortu']; ?>" <?php if ($penghasilan_ibu == $id_penghasilan_ortu) echo 'selected'; ?> name="penghasilan_ibu">  
                                        <?php echo $row_penghasilan['jumlah_penghasilan_ortu']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Berkebutuhan Khusus</label>
                                <select class="form-control" name="kebutuhan_khusus_ibu">
                                    <option value="">- Keterangan -</option>
                                    <?php $query_kebutuhan_khusus = "SELECT * FROM kebutuhan_khusus";
                                        $result_kebutuhan_khusus = mysqli_query($koneksi, $query_kebutuhan_khusus);
                                        while ($row_kebutuhan_khusus = mysqli_fetch_assoc($result_kebutuhan_khusus)) { 
                                    $id_kebutuhan_khusus = $row_kebutuhan_khusus['id_kebutuhan_khusus']; ?>
                                        <option value="<?php echo $row_kebutuhan_khusus['id_kebutuhan_khusus']; ?>" <?php if ($kebutuhan_khusus_ibu == $id_kebutuhan_khusus) echo 'selected'; ?> name="kebutuhan_khusus_ibu">  
                                        <?php echo $row_kebutuhan_khusus['nama_kebutuhan_khusus']; ?></option>
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