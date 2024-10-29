<?php

header("Access-Control-Allow-Origin: header");
header("Access-Control-Allow-Origin: *");

include '../index.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $response = array();
    $nama_pegawai = $_POST['nama_pegawai'];
    $password = md5($_POST['password']);

    $cek = "SELECT * FROM tb_pegawai WHERE nama_pegawai = '$nama_pegawai' AND password = '$password'";
    $result = mysqli_fetch_array(mysqli_query($con, $cek));

    if(isset($result)){
        $response['value'] = 1;
        $response['message'] = "berhasil login";
        $response['nama_pegawai'] = $result['nama_pegawai'];
        $response['email'] = $result['email'];
        // $response['fullname'] = $result['fullname'];
        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "Gagal login";
        echo json_encode($response);
    }
}

?>