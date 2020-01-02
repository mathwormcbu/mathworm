<?php
class Controllers {
	public $request = [];
	public function __construct() {

		global $settings, $files, $my_dataBase, $cache, $showthread, $key;
		$this->request['path'] = __PATH__ . 'views/';
		$this->request['uri'] = explode('/', rtrim($_SERVER['REQUEST_URI'], __DIRS__));
		$this->request['uri'] = array_map(function($key) { return strtolower($key); }, array_merge(array_filter($this->request['uri'], 'strlen')));
		$this->request['url'] = str_replace('?' . strtolower($_SERVER['REQUEST_URI']), null, trim(implode('/', $this->request['uri']), '/'));

		if(!empty($_COOKIE['key'])) {
			$key = $_COOKIE['key'];
			$query = $my_dataBase->from('users')->where('userID',$key)->all();
			foreach ($query as $row) {
				$fullName = $row['personFullname'];
				$level = $row['userLevel'];
			}
		}
		$testStatus = 0;
		if(!empty($_COOKIE['testStatus'])) {
			$testStatus = $_COOKIE['testStatus'];
		}

		$getLink = $this->request['url'];			
		if(empty($getLink))
		{
			if($level === 0)
				$getLink = 'index';
			else
				$getLink = 'ogretmen';
		}
		switch($url = $getLink) {
			case 'ogrenci':
			$title = 'Matematik Kurdu - Öğrenci Başarı Tablosu';
			$dates = $my_dataBase->from("usertest")->where("userID",$key)->all();
			break;
			case 'testal': 
			setcookie("testStatus",1);
			header("location:" . __URLS__ . "test");
			break;
			case 'index':
			if ($level === 1) {
				header("location:" . __URLS__ . "hata");
				break;
			}
			$title = 'Matematik Kurdu - Soru Çözüm Merkezi';
			$getLink = 'index';
			break;
			case 'login':
			$title = 'Matematik Kurdu - Giriş Sayfası';
			$getLink = 'login';
			break;
			case 'ogretmen':
			if ($level === 0) {
				header("location:" . __URLS__ . "hata");
			}
			$title = 'Matematik Kurdu - Soru Ekleme Sayfasi';
			$questionCategories = $my_dataBase->from("categories")->all();
			$getLink = 'ogretmen';
			break;
			case 'test':
			if($testStatus === 0) {
				header("location:" . __URLS__ . "hata");
			}
			$title = 'Matematik Kurdu - Test Sayfası';
			$questionCategories = $my_dataBase->from("categories")->all();
			$goldenQuestions = $my_dataBase->from("questions")->where("goldenQuestion",1)->orderby("rand()")->all();
			$otherQuestions = [];
			$x = 0;
			foreach ($goldenQuestions as $row) {
				$otherQuestions += [$x => $row];
				$x++;
			}
			$count = $my_dataBase->from("usertest")->select("count(id) as total")->total();
			$count = $count + 1;
			$questRate = [0,4,4,4,4,4,4,4,4,4,4];
			for ($i=1; $i < 11; $i++) { 
				if($count > 0) {
					$lasttest = $count - 1;
					$rate = $my_dataBase->from("tests")->select("count(id) as total")->where("testID",$count)->where("questionCategoryID",$i)->where("answerResult",1)->total();
					switch ($rate) {
						case '4':
						$questRate[$i] = 1;
						break;
						case '3':
						$questRate[$i] = 2;
						break;
						case '2':
						$questRate[$i] = 3;
						break;
						case '1':
						$questRate[$i] = 4;
						break;
						case '0':
						$questRate[$i] = 5;
						break;
					}
				}
				$query = $my_dataBase->from("questions")->where("goldenQuestion",0)->where("questionCategoryID",$i)->orderby("rand()")->limit(0,$questRate[$i])->all();
				foreach ($query as $row) {
					$otherQuestions += [$x => $row];
					$x++;
				}
			}
			for($i=0; $i < count($otherQuestions); $i++) {
				$query = $my_dataBase->insert("tests")->set([
					'userID' => $key,
					'questionID' => $otherQuestions[$i]['questionID'],
					'questionCategoryID' => $otherQuestions[$i]['questionCategoryID'],
					'testDate' => date("Y-m-d"),
					'isGolden' => $otherQuestions[$i]['goldenQuestion'],
					'testID' => $count
				]);
			}
			$query = $my_dataBase->insert("usertest")->set([
				'userID' => $key,
				'testID' => $count,
				'testDate' => date("Y-m-d")
			]);
			$getLink = 'test';
			break;
			case 'cikis':
			$title = 'Matematik Kurdu - Çıkış Sayfası';
			$key = 0;
			setcookie("key","0");	
			header("location:" . __URLS__ . "login");
			break;
		}
		if(!file_exists($this->request['path'] . $getLink . '.php')) {
			$getLink = 'error';
			$title = '404';
		}

		$this->request['dir'] = $this->request['path'] . $getLink . '.php';
		
		require_once($this->request['dir']);
	}
}