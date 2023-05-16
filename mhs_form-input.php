<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input</title>
</head>

<body>
    <form action="mhs_simpan.php" method="post">
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="text" onkeyup="isi_otomatis()" name="nim"></td>
            </tr>
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
                <td>JURUSAN</td>
                <td>
                    <select name="jurusan" id="">
                        <option value="TEKNIK INFORMATIKA">TEKNIK INFORMATIKA</option>
                        <option value="TEKNIK ELEKTRO">TEKNIK ELEKTRO</option>
                        <option value="REKAMEDIS">REKAMEDIS</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" value="simpan">SIMPAN</button></td>
            </tr>
        </table>
    </form>
</body>

</html>