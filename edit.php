<?php
$nim = $_GET['nim'];
include "koneksi.php";

$qry = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
$exec = mysqli_query($con, $qry);
$data = mysqli_fetch_assoc($exec);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            padding: 20px;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }

        form table {
            width: 100%;
            border-spacing: 0;
        }

        form table td {
            padding: 10px 5px;
            vertical-align: top;
        }

        form table td:first-child {
            text-align: right;
            font-weight: bold;
            width: 40%;
        }

        form table td:last-child {
            width: 60%;
        }

        input, select {
            width: calc(100% - 10px);
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="radio"] {
            width: auto;
        }

        input[type="submit"] {
            width: auto;
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        h2 {
            text-align: center;
            color: #444;
        }

        legend {
            font-size: 1.2em;
            font-weight: bold;
            color: #007BFF;
        }

        .back-btn {
            display: block;
            margin: 20px auto;
            text-align: center;
        }

        .back-btn a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            transition: color 0.3s;
        }

        .back-btn a:hover {
            color: #0056b3;
        }

        .current-image img {
            max-width: 100px;
            height: auto;
            margin-top: 10px;
            display: block;
        }
    </style>
    <script>
        function confirmSubmission() {
            return confirm("Apakah Anda yakin ingin menyimpan perubahan?");
        }
    </script>
</head>
<body>
    <form action="update.php" method="POST" enctype="multipart/form-data" onsubmit="return confirmSubmission();">
        <fieldset>
            <legend>Form Edit Data Mahasiswa</legend>
            <h2>Lengkapi Biodata dengan Benar</h2>
            <table>
                <tr>
                    <td>NIM (Nomor Induk Mahasiswa)</td>
                    <td>:</td>
                    <td><input type="number" name="nim" value="<?= $data['nim'] ?>" readonly></td>
                </tr>
                <tr>
                    <td>Nama Mahasiswa</td>
                    <td>:</td>
                    <td><input type="text" name="nama" value="<?= $data['nama_mhs'] ?>"></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>:</td>
                    <td>
                        <select name="jurusan">
                            <option value="001" <?= $data['kode_jurusan'] == '001' ? 'selected' : '' ?>>Sistem Komputer</option>
                            <option value="002" <?= $data['kode_jurusan'] == '002' ? 'selected' : '' ?>>Sistem Informasi</option>
                            <option value="003" <?= $data['kode_jurusan'] == '003' ? 'selected' : '' ?>>Teknologi Informasi</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="gender" value="1" <?= $data['gender'] == 1 ? 'checked' : '' ?>> Laki-laki
                        <input type="radio" name="gender" value="2" <?= $data['gender'] == 2 ? 'checked' : '' ?>> Perempuan
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><input type="text" name="alamat" value="<?= $data['alamat'] ?>"></td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td>:</td>
                    <td><input type="text" name="nohp" value="<?= $data['no_hp'] ?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input type="email" name="email" value="<?= $data['email'] ?>"></td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td>:</td>
                    <td>
                        <input type="file" name="foto">
                        <div class="current-image">
                            <p>Foto Saat Ini:</p>
                            <img src="foto/<?= $data['foto'] ?>" alt="Foto Mahasiswa">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" value="Simpan"></td>
                </tr>
            </table>
        </fieldset>
    </form>
    <div class="back-btn">
        <a href="latihan.php">&larr; Kembali ke Halaman Sebelumnya</a>
    </div>
</body>
</html>
