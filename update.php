<?php

$nim = $_POST['nim'];
$nama_mhs = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$gender = $_POST['gender'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['nohp'];
$email = $_POST['email'];

include "koneksi.php";

// Check if a new picture is uploaded
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $file_name = $_FILES["foto"]["name"];
    $target_dir = "foto/";
    $target_file = $target_dir . basename($_FILES['foto']['name']);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOK = 1;

    // Validate file type
    if ($fileType != 'jpg' && $fileType != 'png' && $fileType != 'jpeg') {
        echo "<script>alert('File harus berupa gambar dengan format jpg, png, atau jpeg'); window.history.back();</script>";
        $uploadOK = 0;
    }

    // If the file is valid, proceed to upload
    if ($uploadOK == 1) {
        // Move uploaded file to the target directory
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            // Update data along with the new picture
            $qry = "UPDATE mahasiswa SET 
                    nama_mhs = '$nama_mhs',
                    kode_jurusan = '$jurusan',
                    gender = '$gender',
                    alamat = '$alamat',
                    no_hp = '$no_hp',
                    email = '$email',
                    foto = '$file_name'
                    WHERE nim = '$nim'";

            $exec = mysqli_query($con, $qry);

            if ($exec) {
                echo "<script>alert('Data dan foto berhasil diupdate'); window.location = 'latihan.php';</script>";
            } else {
                echo "<script>alert('Gagal mengupdate data'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Gagal mengupload foto'); window.history.back();</script>";
        }
    }
} else {
    // Update data without changing the picture
    $qry = "UPDATE mahasiswa SET 
            nama_mhs = '$nama_mhs',
            kode_jurusan = '$jurusan',
            gender = '$gender',
            alamat = '$alamat',
            no_hp = '$no_hp',
            email = '$email'
            WHERE nim = '$nim'";

    $exec = mysqli_query($con, $qry);

    if ($exec) {
        echo "<script>alert('Data berhasil diupdate'); window.location = 'latihan.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data'); window.history.back();</script>";
    }
}

?>
