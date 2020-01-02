<?php
	header('Content-type:application/json;charset=utf-8');
    try {
    	setcookie("testStatus",0);
    	$data = ['link' => __URLS__ . 'index'];
    	echo json_encode($data);
    } catch (RuntimeException $e) {
        http_response_code(400);

        echo json_encode([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
    }