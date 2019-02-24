<?php 

/*
 * Core 
 * 
 * 路由規則＆載入控制器
 * 
 */
class Core 
{
	public $currentController = 'Pages';
	public $currentMethod = 'index';
	public $params = [];

	public function __construct()
	{
		$url = $this->getUrl();

		//載入控制器
		if (file_exists(APPROOT . '/controllers/' . $url[0] . '.php')) {
			$this->currentController = $url[0];

			//移除該項，讓陣列剩方法和參數
			unset($url[0]);
		}

		require_once(APPROOT . '/controllers/' . $this->currentController . '.php');

		$app = new $this->currentController;

		//檢查呼叫方法
		if (isset($url[1])) {
			if(method_exists($this->currentController, $url[1])) {
				$this->currentMethod = $url[1];

				//移除該項，讓陣列剩參數
				unset($url[1]);
			}
		} 

		//指定參數
		$this->params = empty($url) ? [] : array_values($url);

		//呼叫調回函式
		call_user_func_array([$app, $this->currentMethod], $this->params);
	}

	public function getUrl()
	{
		if (isset($_GET['url'])) {
			//過濾不合法字符
			$url = filter_var($_GET['url'], FILTER_SANITIZE_URL);

			//分解字串
			return explode('/', rtrim($_GET['url'], '/'));
		}
	}

}