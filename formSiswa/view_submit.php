<?php
    require 'db_peserta-didik.php';
    require_once 'auth.php';

    echo "<pre>";
    print_r($_SESSION['form_bag1']);
    print_r($_SESSION['form_bag2']);
    print_r($_SESSION['form_bag3']);
    print_r($_SESSION['form_bag4']);
    echo "</pre>";

    if (isset($_POST['submit'])) {
        // Pengambilan isi session form_bag1
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

        // Pengambilan isi session form_bag2
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

        // Pengambilan isi session form_bag3
        $nama_ayah = $_SESSION['form_bag3']['nama_ayah'];
        $tahun_lahir_ayah = $_SESSION['form_bag3']['tahun_lahir_ayah'];
        $pendidikan_ayah = $_SESSION['form_bag3']['pendidikan_ayah'];
        $pekerjaan_ayah = $_SESSION['form_bag3']['pekerjaan_ayah'];
        $penghasilan_ayah = $_SESSION['form_bag3']['penghasilan_ayah'];
        $kebutuhan_khusus_ayah = $_SESSION['form_bag3']['kebutuhan_khusus_ayah'];

        // Pengambilan isi session form_bag4
        $nama_ibu = $_SESSION['form_bag4']['nama_ibu'];
        $tahun_lahir_ibu = $_SESSION['form_bag4']['ibu_tahun_lahir'];
        $pendidikan_ibu = $_SESSION['form_bag4']['ibu_pendidikan_ortu'];
        $pekerjaan_ibu = $_SESSION['form_bag4']['ibu_pekerjaan_ortu'];
        $penghasilan_ibu = $_SESSION['form_bag4']['ibu_penghasilan_ortu'];
        $kebutuhan_khusus_ibu = $_SESSION['form_bag4']['ibu_berkebutuhan_khusus'];

        // Insert into tabel alamat
        $query = "INSERT INTO alamat (alamat_jalan, rt_rw, dusun, kelurahan_desa, kecamatan, kode_pos)
        VALUES ('$alamat_jalan', '$rt_rw', '$dusun', '$kelurahan_desa', '$kecamatan', '$kode_pos')";
        $result = mysqli_query($koneksi, $query);
        // ambil id alamat
        $id_alamat_pr = mysqli_insert_id($koneksi);

        $unique_id_siswa = substr(uniqid(), 0, 10);
        // Insert into tabel siswa (data pribadi kecuali alamat)
        $query = "INSERT INTO siswa (id_siswa, nama_lengkap, kode_jenis_kelamin, nisn, nik, tempat_lahir, tgl_lahir, id_agama, id_kebutuhan_khusus, 
        id_alamat, id_tempat_tinggal, id_moda_transportasi, no_hp, email, kode_kps_kks_pkh_kip, no_kps_kks_pkh_kip, kode_kewarganegaraan)
        VALUES ('$unique_id_siswa', '$nama_lengkap', '$jenis_kelamin', '$nisn', '$nik', '$tempat_lahir', '$tgl_lahir', '$agama', '$kebutuhan_khusus', '$id_alamat_pr', 
        '$tempat_tinggal', '$moda_transportasi', '$no_hp', '$email', '$kps_kks_pkh_kip', '$no_kps_kks_pkh_kip', '$kewarganegaraan')";
        $result = mysqli_query($koneksi, $query);

        $unique_ortu_ayah = substr(uniqid(), 0, 10);
        // Insert into tabel ayah
        $query = "INSERT INTO ortu_ayah (id_ortu_ayah, nama_ayah, tahun_lahir, id_pendidikan_ortu, id_pekerjaan_ortu, id_penghasilan_ortu, id_kebutuhan_khusus, id_siswa)
        VALUES ('$unique_ortu_ayah', '$nama_ayah', '$tahun_lahir_ayah', '$pendidikan_ayah', '$pekerjaan_ayah', '$penghasilan_ayah', '$kebutuhan_khusus_ayah', '$unique_id_siswa')";
        $result = mysqli_query($koneksi, $query);

        $unique_ortu_ibu = substr(uniqid(), 0, 10);
        // Insert into tabel ibu
        $query = "INSERT INTO ortu_ibu (id_ortu_ibu, nama_ibu, tahun_lahir, id_pendidikan_ortu, id_pekerjaan_ortu, id_penghasilan_ortu, id_kebutuhan_khusus, id_siswa)
        VALUES ('$unique_ortu_ibu', '$nama_ibu', '$tahun_lahir_ibu', '$pendidikan_ibu', '$pekerjaan_ibu', '$penghasilan_ibu', '$kebutuhan_khusus_ibu', '$unique_id_siswa')";
        $result = mysqli_query($koneksi, $query);

        $unique_id = substr(uniqid(), 0, 10);
        $_SESSION['unique_id'] = $unique_id;
        // masukkan kedalam tabel registrasi
        $query = "INSERT INTO registrasi (id_registrasi, id_pendaftaran, tgl_masuk_sekolah, nis, no_peserta_ujian, kode_paud, kode_tk, no_skhun, no_ijazah, id_hobi, id_cita,
        id_siswa) 
        VALUES ('$unique_id', '$pendaftaran', '$tgl_masuk ', '$nis', '$no_ujian', '$paud', '$tk', '$no_skhun', '$no_ijazah', '$hobi', '$cita', '$unique_id_siswa')";

        $result = mysqli_query($koneksi, $query);
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_error($koneksi));
        } else {
            // ambil id registrasi
            $id_registrasi = mysqli_insert_id($koneksi);
        }

        // alert sukses
        echo "<script>alert('Data berhasil disimpan.');</script>";
    }

    // Kembali ke halaman sebelumnya
    if (isset($_POST['back'])) {
        header('Location: form_bag4.php');
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
    <div class="container">
        <form action="" method="post">
            <!-- button untuk lanjut -->
            <button type="submit" class="btn btn-primary float-right" id="submit" name="submit">Simpan ke database</button>
            <!-- button untuk kembali -->
            <button type="submit" class="btn btn-primary float-right mr-2" id="back" name="back">Back</button>
        </form>
    </div>
</body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

</html>