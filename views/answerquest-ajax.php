<?php
	header('Content-type:application/json;charset=utf-8');
    try {
        $my_dataBase->beginTransaction();
    	$query = $my_dataBase->update("tests")->where("userID",$key)->where("questionID",$_POST["id"])->where("testDate",date('Y-m-d'))->set([
            'answerResult' => $_POST['ans']
        ]);
    	if(!$query) {
            $my_dataBase->rollBack();
    		$data = ['status' => 'warning'];
    	} else {
            $my_dataBase->commit();
    		$data = ['status' => 'success'];
    	}
    	echo json_encode($data);
    } catch (RuntimeException $e) {
        http_response_code(400);

        echo json_encode([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
    }