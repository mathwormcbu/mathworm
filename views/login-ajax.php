<?php
    header('Content-type:application/json;charset=utf-8');
    try {
    	if(empty($_POST["inputUsername"]) || empty($_POST["inputPassword"]))
    	{
    		$data = [ 'status' => 'error', 'message' => 'Lütfen boş alanları doldurunuz.'];
    		echo json_encode($data);
    		return;
    	} else if(strlen($_POST["inputUsername"]) < 3 || strlen($_POST["inputPassword"]) < 3) {
    		$data = [ 'status' => 'error', 'message' => 'Kullanıcı adı ve Şifre en az 3 karakterden oluşmalıdır.'];
    		echo json_encode($data);
    		return;
    	} else if(strlen($_POST["inputUsername"]) > 20 || strlen($_POST["inputPassword"]) > 20) {
    		$data = [ 'status' => 'error', 'message' => 'Kullanıcı adı ve Şifre en fazla 20 karakterden oluşmalıdır.'];
    		echo json_encode($data);
    		return;
    	}
    	$my_dataBase->beginTransaction();
    	$belong = $my_dataBase->from("users")->where('userName',$_POST["inputUsername"])->all();
    	if($belong) {
    		foreach ($belong as $row) {
    			$logincheck = password_verify($_POST["inputPassword"], $row["userPass"]);
    			if($logincheck) {
					$my_dataBase->commit();
                    if ($row['userLevel'] === 0) {
                        $data = [ 'status' => 'success', 'message' => 'Giriş başarı ile tamamlandı.3 saniye içerisinde yönlendirileceksiniz.','link' => __URLS__ . 'index'];
                    } else {
                        $data = [ 'status' => 'success', 'message' => 'Giriş başarı ile tamamlandı.3 saniye içerisinde yönlendirileceksiniz.','link' => __URLS__ . 'ogretmen'];
                    }
	                setcookie("key",$row['userID']);
				} else {
					$my_dataBase->rollback();
					$data = [ 'status' => 'error', 'message' => 'Yanlış şifre girdiniz.'];
				}
    		}
		} else {
			$data = [ 'status' => 'warning', 'message' => 'Bu kullanıcı adına sahip bir hesap bulunmamaktadır.'];
		}
        echo json_encode($data);
    } catch (RuntimeException $e) {
        http_response_code(400);

        echo json_encode([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
    }
