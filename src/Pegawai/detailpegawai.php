<?php

header("Access-Control-Allow-Origin: header");
header("Access-Control-Allow-Origin: *");
include '../index.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$id = $_POST['id'];

	$sql = "SELECT * FROM tb_pegawai WHERE id = $id";
	$result = $con->query($sql);

	if($result->num_rows > 0) {
		$response['isSuccess'] = true;
		$response['message'] = "Berhasil Menampilkan data pegawai";
		$response['data'] = array();
		while ($row = $result->fetch_assoc()) {
			$response['data'][] = $row;
		}
	} else {
		$response['isSuccess'] = false;
		$response['message'] = "Gagal menampilkan data pegawai";
		$response['data'] = null;
	}
	echo json_encode($response);
}

?>