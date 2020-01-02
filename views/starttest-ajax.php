<?php
	header('Content-type:application/json;charset=utf-8');
    try {
    	$belong = $my_dataBase->from("usertest")->where("userID",$key)->where("testDate",date('Y-m-d'))->all();
    	if($belong) {
    		$data = ['status' => 'warning'];
    	} else {
    		setcookie("teststatus",1);
    		$data = ['status' => 'success','link' => __URLS__ . 'test'];
    	}
    	echo json_encode($data);
    } catch (RuntimeException $e) {
        http_response_code(400);

        echo json_encode([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
    }