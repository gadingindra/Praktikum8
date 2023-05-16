<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Kontak</title>
</head>

<body>
    <h2>List Kontak</h2>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>JENIS KELAMIN</th>
            <th>EMAIL</th>
            <th>ALAMAT</th>
            <th>KOTA</th>
            <th>PESAN</th>
        </tr>
        <?php
        include "koneksi.php";
        $kontak = mysqli_query($koneksi, "SELECT * FROM kontak");
        $no = 1;
        foreach ($kontak as $row) {
            $jenis_kelamin = $row['jkel'] == 'P' ? 'Perempuan' : 'Laki-laki';
            echo "<tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['Nama'] . "</td>
            <td>" . $jenis_kelamin . "</td>
            <td>" . $row['Email'] . "</td>
            <td>" . $row['Alamat'] . "</td>
            <td>" . $row['Kota'] . "</td>
            <td>" . $row['Pesan'] . "</td>
        </tr>";
            $no++;
        }
        ?>
    </table>
</body>

</html>