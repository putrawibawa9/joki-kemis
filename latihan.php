<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        fieldset {
            border: 2px solid #0078D7;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
        }

        legend {
            font-size: 1.2em;
            font-weight: bold;
            color: #0078D7;
        }

        h2 {
            color: #444;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #0078D7;
            color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .tabel {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border-radius: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="file"],
        select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #0078D7;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #005BB5;
        }

        a button {
            background-color: #ff6b6b;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        a button:hover {
            background-color: #d23f3f;
        }

        .actions button:first-child {
            background-color: #28a745;
        }

        .actions button:first-child:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <form action="proses.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Form Input Data Mahasiswa</legend>
            <h2>Lengkapi biodata dengan benar</h2>
            <table>
                <tr>
                    <td>NIM (Nomor induk mahasiswa)</td>
                    <td><input type="number" name="nim" placeholder="Masukkan NIM"></td>
                </tr>
                <tr>
                    <td>Nama mahasiswa</td>
                    <td><input type="text" name="nama" placeholder="Masukkan Nama"></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>
                        <select name="jurusan">
                            <option value="001">Sistem Komputer</option>
                            <option value="002">Sistem Informasi</option>
                            <option value="003">Teknologi Informasi</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <input type="radio" name="gender" value="1"> Laki-laki
                        <input type="radio" name="gender" value="2"> Perempuan
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" placeholder="Masukkan Alamat"></td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td><input type="text" name="nohp" placeholder="Masukkan No. HP"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" placeholder="Masukkan Email"></td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td><input type="file" name="foto"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Simpan"></td>
                </tr>
            </table>
        </fieldset>
    </form>

    <h2>Data Mahasiswa</h2>
    <table class="tabel">
        <tr>
            <th>NIM</th>
            <th>Nama Mhs</th>
            <th>Jurusan</th>
            <th>Gender</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php
        include "koneksi.php";
        $qry = "SELECT * FROM mahasiswa";
        $exec = mysqli_query($con, $qry);

        while ($data = mysqli_fetch_assoc($exec)) {
        ?>
            <tr>
                <td><?= $data['nim'] ?></td>
                <td><?= $data['nama_mhs'] ?></td>
                <td><?= $data['kode_jurusan'] ?></td>
                <td><?= $data['gender'] == 1 ? "Laki-Laki" : "Perempuan" ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['no_hp'] ?></td>
                <td><?= $data['email'] ?></td>
                <td><img src="foto/<?= $data['foto'] ?>" alt="Foto" style="width: 50px; height: 50px; object-fit: cover;"></td>
                <td class="actions">
                    <a href="edit.php?nim=<?= $data['nim'] ?>"><button>Edit</button></a>
                    <a href="delete.php?nim=<?= $data['nim'] ?>"><button>Delete</button></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>
