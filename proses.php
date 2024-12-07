<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['nohp'];
    $email = $_POST['email'];

    // Handle file upload
    $file_name = $_FILES["foto"]["name"];
    $target_dir = "foto/";
    $target_file = $target_dir . basename($file_name);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOK = 1;

    // Validate file type
    if ($fileType != 'jpg' && $fileType != 'png' && $fileType != 'jpeg') {
        echo "<script>alert('File harus berupa jpg, png, atau jpeg'); window.history.back();</script>";
        $uploadOK = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<script>alert('Nama file sudah ada. Ganti nama file dan coba lagi.'); window.history.back();</script>";
        $uploadOK = 0;
    }
    echo $uploadOK;
    // Proceed if file validation passed
    if ($uploadOK == 1) {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            // Database connection
            include "koneksi.php";

            // Insert student data along with the photo file name
            $qry = "INSERT INTO mahasiswa (nim, nama_mhs, kode_jurusan, gender, alamat, no_hp, email, foto)
                    VALUES ('$nim', '$nama_mhs', '$jurusan', '$gender', '$alamat', '$no_hp', '$email', '$file_name')";

            $exec = mysqli_query($con, $qry);

            // Check if insertion was successful
            if ($exec) {
                echo "<script>alert('Data berhasil disimpan. Foto berhasil di-upload.'); window.location = 'latihan.php';</script>";
            } else {
                // Rollback photo upload if database insertion fails
                unlink($target_file); // Delete the uploaded file
                echo "<script>alert('Data gagal disimpan. Foto dihapus.'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Gagal meng-upload foto.'); window.history.back();</script>";
        }
    }
}
