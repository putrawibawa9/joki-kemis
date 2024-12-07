<?php
require "koneksi.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $file_name = $_FILES["foto"]["name"];
    $target_dir = "foto/";
    $target_file = $target_dir . basename($_FILES['foto']['name']);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $upoladOK = 1;

    //cek jika file sudah ada
    if(file_exists($target_file)){
        echo "<script>alert('nama file yang sama sudah ada')</script>";
        $upoladOK = 0;
    }

    //cek jenis file
    if($fileType != 'jpg' && $fileType != 'png' && $fileType != 'jpeg'){
        echo "<script>alert('file tidak sesuai ketentuan (jpg,png,jpeg)')</script>";
        $upoladOK = 0;
    }

    if($upoladOK == 1){
        //upload file
        if(move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)){
            //insert nama foto
            $qry = mysqli_query($con, "INSERT INTO foto (nama_foto) 
            VALUES ('$file_name')");
            if($qry){
                echo "<script>alert('Foto berhasil di-upload'); 
                window.location='index.php'</script>";
            }else{
                echo "<script>alert('Foto berhasil di-upload Gagal insert'); 
                window.location='index.php'</script>";
            }
        }else{
            echo "Gagal upload foto";
        }
    }else{
        echo "<script>alert('Foto gagal di-upload'); 
            window.location='index.php'</script>";
    }

}