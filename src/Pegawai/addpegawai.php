<?php

header("Access-Control-Allow-Origin: header");
header("Access-Control-Allow-Origin: *");
include '../index.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $response = array();
    $nama_pegawai = $_POST['nama_pegawai'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $password = md5($_POST['password']); 
 

    $cek = "SELECT * FROM tb_pegawai WHERE email = '$email'"; 
    $result = mysqli_query($con, $cek);

    if(mysqli_num_rows($result) > 0){ 
        $response['value'] = 2;
        $response['message'] = "email telah digunakan";
        echo json_encode($response);
    } else {
        $insert = "INSERT INTO tb_pegawai VALUES (NULL,'$nama_pegawai','$no_hp','$alamat', '$email', '$tgl_lahir', '$jenis_kelamin','$password')";
        
        if(mysqli_query($con, $insert)){
            $response['value'] = 1;
            $response['message'] = "pegawail Berhasil ditambahkan";
            echo json_encode($response);
        } else {
            $response['value'] = 0;
            $response['message'] = "Gagal menambahkan pegawai";
            echo json_encode($response);
        }
    }
}

?>
