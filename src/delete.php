<?php

header("Access-Control-Allow-Origin: *");
include 'index.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $response = array();
    $id = $_POST['id'];

    $sql = "DELETE FROM tb_mahasiswa  WHERE id = $id";
    $result = $con->query($sql);

    if ($result) {
        $response['isSuccess'] = true;
        // $response['value'] = 1;
        $response['message'] = "mahasiswa Berhasil di hapus";
    }
        else{
            $response['isSuccess'] = false;
            // $response['value'] = 0;
            $response['message'] = "Gagal Hapus mahasiswa";
        }

    echo json_encode($response);
}

?>