<?php

header("Access-Control-Allow-Origin: header");
header("Access-Control-Allow-Origin: *");
include '../index.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $response = array();
    
    $id = $_POST['id'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    // $password = md5($_POST['password']); 


    $sql = "UPDATE tb_pegawai SET nama_pegawai = '$nama_pegawai', no_hp = '$no_hp', alamat = '$alamat', email = '$email', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin' WHERE id = $id";
	$result = $con->query($sql);

    if ($result) {
        $cek = "SELECT * FROM tb_pegawai WHERE id = $id";
        $result = mysqli_fetch_array(mysqli_query($con, $cek));
        $response['is_success'] = true;
        $response['value'] = 1;
        $response['message'] = "pegawai Berhasil di Edit";
        $response['nama_pegawai'] = $result['nama_pegawai'];
        $response['tgl_lahir'] = $result['tgl_lahir'];
        $response['jenis_kelamin'] = $result['jenis_kelamin'];
        $response['email'] = $result['email'];
        $response['no_hp'] = $result['no_hp'];
        $response['alamat'] = $result['alamat'];
        // $response['password'] = $result['password'];
        $response['id'] = $result['id'];
    } else {
        $response['is_success'] = false;
        $response['value'] = 0;
        $response['message'] = "Gagal Edit pegawai ";
    }

    echo json_encode($response);
}

?>
