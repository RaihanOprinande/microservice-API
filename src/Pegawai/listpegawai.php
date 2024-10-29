<?php

header("Access-Control-Allow-Origin: header");
header("Access-Control-Allow-Origin: *");

include '../index.php';

	$sql = "SELECT * FROM tb_pegawai";
	$result = $con->query($sql);

	if($result->num_rows > 0) {
		$response['isSuccess'] = true;
		$response['message'] = "Berhasil Menampilkan pegawai";
		$response['data'] = array();
		while ($row = $result->fetch_assoc()) {
			$response['data'][] = $row;
		}
	} else {
		$response['isSuccess'] = false;
		$response['message'] = "Gagal menampilkan pegawai";
		$response['data'] = null;
	}
	echo json_encode($response);


?>