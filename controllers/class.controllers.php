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
			$query = $my_dataBase->from('users')->where('id',$key)->all();
			foreach ($query as $row) {
				$fullName = $row['pFullname'];
				$level = $row['uLevel'];
			}
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
			case 'index':
			if ($level === 1) {
				$getLink = 'error';
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
				$getLink = 'error';
				break;
			}
			$title = 'Matematik Kurdu - Soru Ekleme Sayfasi';
			$questionCategories = $my_dataBase->from("categories")->all();
			$getLink = 'ogretmen';
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