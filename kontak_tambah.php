<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Kontak</title>
</head>

<body>
    <form action="kontak_simpan.php" method="post">
        <table>
            <tr>
                <td>NAMA</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>JENIS KELAMIN</td>
                <td>
                    <input type="radio" name="jenis_kelamin" value="L">Laki Laki
                    <input type="radio" name="jenis_kelamin" value="P">Perempuan
                </td>
            </tr>
            <tr>
                <td>EMAIL</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td>KOTA</td>
                <td><input type="text" name="kota"></td>
            </tr>
            <tr>
                <td>PESAN</td>
                <td><input type="text" name="pesan"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" value="simpan">SIMPAN</button></td>
            </tr>
        </table>
    </form>
</body>

</html>