<?php
	header('Content-type:application/json;charset=utf-8');
    try {
    	$postDizi = ['qTxt','qAnsA','qAnsB','qAnsC','qAnsD','qCat','qAns'];
    	for($i=0;$i<count($postDizi);$i++)
    	{
    		if(strlen(trim(strip_tags($_POST[$postDizi[$i]]))) === 0)
    		{
    			$data = ['status'=>'warning','message'=>'Lütfen boş kısımları doldurunuz.'];
    			echo json_encode($data);
    			return;
    		}
    	}
    	$my_dataBase->beginTransaction();
    	if(empty($_POST["gold"])) {
	    	$query = $my_dataBase->insert("questions")->set([
	    		'questionText' => $_POST[$postDizi[0]],
	    		'answerA' => $_POST[$postDizi[1]],
	    		'answerB' => $_POST[$postDizi[2]],
	    		'answerC' => $_POST[$postDizi[3]],
	    		'answerD' => $_POST[$postDizi[4]],
	    		'trueAnswer' => $_POST[$postDizi[6]],
	    		'questionCategoryID' => $_POST[$postDizi[5]]
	    	]);
	    } else {
	    	$belong = $my_dataBase->from("questions")->where('questionCategoryID',$_POST[$postDizi[5]])->where('goldenQuestion',1)->all();
	    	if(!$belong) {
		    	$query = $my_dataBase->insert("questions")->set([
		    		'questionText' => $_POST[$postDizi[0]],
		    		'answerA' => $_POST[$postDizi[1]],
		    		'answerB' => $_POST[$postDizi[2]],
		    		'answerC' => $_POST[$postDizi[3]],
		    		'answerD' => $_POST[$postDizi[4]],
		    		'trueAnswer' => $_POST[$postDizi[6]],
		    		'questionCategoryID' => $_POST[$postDizi[5]],
		    		'goldenQuestion' => 1
		    	]);
		    } else {
		    	$data = ['status'=>'warning','message'=>'Bu konuda zaten bir altın soru mevcut.Lütfen kutucuktaki seçimi kaldırınız.'];
		    	echo json_encode($data);
		    	return;
		    }
	    }
    	if($query)
    	{
    		$my_dataBase->commit();
    		$data = ['status'=>'success','message'=>'İşlem Başarılı','link' => __URLS__ . 'ogretmen'];
    	} else {
    		$my_dataBase->rollBack();
    		$data = ['status'=>'danger','message'=>'İşlem Başarısız'];
    	}
    	echo json_encode($data);
    } catch (RuntimeException $e) {
        http_response_code(400);

        echo json_encode([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
    }