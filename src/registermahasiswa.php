<?php

header("Access-Control-Allow-Origin: header");
header("Access-Control-Allow-Origin: *");
include 'index.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $response = array();
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $password = md5($_POST['password']); 

    $cek = "SELECT * FROM tb_mahasiswa WHERE nama_mahasiswa = '$nama_mahasiswa' OR email = '$email'"; 
    $result = mysqli_query($con, $cek);

    if(mysqli_num_rows($result) > 0){ 
        $response['value'] = 2;
        $response['message'] = "nama mahasiswa atau email telah digunakan";
        echo json_encode($response);
    } else {
        $insert = "INSERT INTO tb_mahasiswa VALUES (NULL,'$nama_mahasiswa','$tgl_lahir','$jenis_kelamin', '$email','$nohp','$alamat','$password')";
        
        if(mysqli_query($con, $insert)){
            $response['value'] = 1;
            $response['message'] = "Registrasi Berhasil";
            echo json_encode($response);
        } else {
            $response['value'] = 0;
            $response['message'] = "Gagal Registrasi";
            echo json_encode($response);
        }
    }
}

?>
