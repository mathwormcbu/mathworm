<?php
	header('Content-type:application/json;charset=utf-8');
    try {
    	if($_POST["val"] == '0')
        {
            return;
        }
        if($_POST["val"] != 'all') {
            $questCounts = [];
            for($i=1;$i<11;$i++) {
                $count = $my_dataBase->from("tests")->select('count(id) as total')->where("testID",$_POST["val"])->where("questionCategoryID",$i)->total();
                $correctCount = $my_dataBase->from("tests")->select('count(id) as total')->where("testID",$_POST["val"])->where("questionCategoryID",$i)->where("answerResult",1)->total();
                $rate = ($correctCount/$count)*100;
                $questCounts += [$i => $rate];
            }
            $data = ['status' => 'success','rates' => $questCounts];
        } else {
            $questCounts = [];
            for($i=1;$i<11;$i++) {
                $count = $my_dataBase->from("tests")->select('count(id) as total')->where("questionCategoryID",$i)->total();
                $correctCount = $my_dataBase->from("tests")->select('count(id) as total')->where("questionCategoryID",$i)->where("answerResult",1)->total();
                $rate = ($correctCount/$count)*100;
                $questCounts += [$i => $rate];
            }
            $data = ['status' => 'success','rates' => $questCounts];
        }
        echo json_encode($data);
    } catch (RuntimeException $e) {
        http_response_code(400);

        echo json_encode([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
    }