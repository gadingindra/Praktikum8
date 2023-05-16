<?php
    session_start();
    require 'db_peserta-didik.php';

    // Penyimpanan data sementara di dalam session
    if (isset($_POST['submit'])) {
        // Menyimpan data ke dalam variabel session
        $_SESSION['form_bag3'] = [
            'nama_ayah' => $_POST['nama_ayah'],
            'tahun_lahir_ayah' => $_POST['tahun_lahir_ayah'],
            'pendidikan_ayah' => $_POST['pendidikan_ayah'],
            'pekerjaan_ayah' => $_POST['pekerjaan_ayah'],
            'penghasilan_ayah' => $_POST['penghasilan_ayah'],
            'kebutuhan_khusus_ayah' => $_POST['kebutuhan_khusus_ayah']
        ];

        // Meneruskan ke halaman form bagian 4 : form data ibu
        header('Location: form_bag4.php');
        exit;
    }

    // Pengecekan isi data dalam session
    if (isset($_SESSION['form_bag3'])) {
        $nama_ayah = $_SESSION['form_bag3']['nama_ayah'];
        $tahun_lahir_ayah = $_SESSION['form_bag3']['tahun_lahir_ayah'];
        $pendidikan_ayah = $_SESSION['form_bag3']['pendidikan_ayah'];
        $pekerjaan_ayah = $_SESSION['form_bag3']['pekerjaan_ayah'];
        $penghasilan_ayah = $_SESSION['form_bag3']['penghasilan_ayah'];
        $kebutuhan_khusus_ayah = $_SESSION['form_bag3']['kebutuhan_khusus_ayah'];
    } else {
        $nama_ayah = '';
        $tahun_lahir_ayah = '';
        $pendidikan_ayah = '';
        $pekerjaan_ayah = '';
        $penghasilan_ayah = '';
        $kebutuhan_khusus_ayah = '';
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
                        <h4>Data Ayah Kandung</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                        <div class="mb-3">
                                <label>Nama Ayah Kandung</label>
                                <input type="text" name="nama_ayah" class="form-control" value="<?php echo isset($nama_ayah) ? $nama_ayah : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Tahun Lahir</label>
                                <input type="text" name="tahun_lahir_ayah" class="form-control" value="<?php echo isset($tahun_lahir_ayah) ? $tahun_lahir_ayah : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Pendidikan Ayah</label>
                                <select class="form-control" name="pendidikan_ayah">
                                    <option value="">- Pilih Pendidikan -</option>
                                    <?php $query_pendidikan = "SELECT * FROM pendidikan_ortu";
                                        $result_pendidikan = mysqli_query($koneksi, $query_pendidikan);
                                        while ($row_pendidikan = mysqli_fetch_assoc($result_pendidikan)) { 
                                    $id_pendidikan_ortu = $row_pendidikan_ortu['id_pendidikan_ortu'];?>
                                        <option value="<?php echo $row_pendidikan['id_pendidikan_ortu']; ?>" <?php if ($pendidikan_ayah == $id_pendidikan_ortu) echo 'selected'; ?> name="pendidikan_ayah">
                                            <?php echo $row_pendidikan['nama_pendidikan_ortu']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Pekerjaan Ayah</label>
                                <select class="form-control" name="pekerjaan_ayah">
                                    <option value="">- Pilih Pekerjaan -</option>
                                    <?php $query_pekerjaan = "SELECT * FROM pekerjaan_ortu";
                                        $result_pekerjaan = mysqli_query($koneksi, $query_pekerjaan);
                                        while ($row_pekerjaan = mysqli_fetch_assoc($result_pekerjaan)) { 
                                    $id_pekerjaan_ortu = $row_pekerjaan['id_pekerjaan_ortu'];?>
                                        <option value="<?php echo $row_pekerjaan['id_pekerjaan_ortu']; ?>" <?php if ($pekerjaan_ayah == $id_pekerjaan_ortu) echo 'selected'; ?> name="pekerjaan_ayah">  
                                        <?php echo $row_pekerjaan['nama_pekerjaan_ortu']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Penghasilan Bulanan</label>
                                <select class="form-control" name="penghasilan_ayah">
                                    <option value="">- Pilih Penghasilan -</option>
                                    <?php $query_penghasilan = "SELECT * FROM penghasilan_ortu";
                                        $result_penghasilan = mysqli_query($koneksi, $query_penghasilan);
                                        while ($row_penghasilan = mysqli_fetch_assoc($result_penghasilan)) { 
                                    $id_penghasilan_ortu = $row_penghasilan_ortu['id_penghasilan_ortu'];?>
                                        <option value="<?php echo $row_penghasilan['id_penghasilan_ortu']; ?>" <?php if ($penghasilan_ayah == $id_penghasilan_ortu) echo 'selected'; ?> name="penghasilan_ayah">
                                        <!-- menampilkan isi kolom berupa nama departemen -->    
                                        <?php echo $row_penghasilan['jumlah_penghasilan_ortu']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Berkebutuhan Khusus</label>
                                <select class="form-control" name="kebutuhan_khusus_ayah">
                                    <option value="">- Keterangan -</option>
                                    <?php $query_kebutuhan_khusus = "SELECT * FROM kebutuhan_khusus";
                                        $result_kebutuhan_khusus = mysqli_query($koneksi, $query_kebutuhan_khusus);
                                        while ($row_kebutuhan_khusus = mysqli_fetch_assoc($result_kebutuhan_khusus)) { 
                                    $id_kebutuhan_khusus = $row_kebutuhan_khusus['id_kebutuhan_khusus'];?>
                                        <option value="<?php echo $row_kebutuhan_khusus['id_kebutuhan_khusus']; ?>" <?php if ($kebutuhan_khusus_ayah == $id_kebutuhan_khusus) echo 'selected'; ?> name="kebutuhan_khusus_ayah">
                                        <!-- menampilkan isi kolom berupa nama departemen -->    
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