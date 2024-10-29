<?php

header("Access-Control-Allow-Origin: header");
header("Access-Control-Allow-Origin: *");
include 'index.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $response = array();
    
    $id = $_POST['id'];
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $password = md5($_POST['password']); 


    $sql = "UPDATE tb_mahasiswa SET nama_mahasiswa = '$nama_mahasiswa', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', email = '$email', no_hp = '$no_hp', alamat = '$alamat', password = '$password' WHERE id = $id";
	$result = $con->query($sql);

    if ($result) {
        $cek = "SELECT * FROM tb_mahasiswa WHERE id = $id";
        $result = mysqli_fetch_array(mysqli_query($con, $cek));
        $response['is_success'] = true;
        $response['value'] = 1;
        $response['message'] = "mahasiswa Berhasil di Edit";
        $response['nama_mahasiswa'] = $result['nama_mahasiswa'];
        $response['tgl_lahir'] = $result['tgl_lahir'];
        $response['jenis_kelamin'] = $result['jenis_kelamin'];
        $response['email'] = $result['email'];
        $response['no_hp'] = $result['no_hp'];
        $response['alamat'] = $result['alamat'];
        $response['password'] = $result['password'];
        $response['id'] = $result['id'];
    } else {
        $response['is_success'] = false;
        $response['value'] = 0;
        $response['message'] = "Gagal Edit mahasiswa ";
    }

    echo json_encode($response);
}

?>
