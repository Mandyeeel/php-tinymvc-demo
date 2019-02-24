<?php 

class Controller
{
	public function model($model)
	{
		if (file_exists(APPROOT . '/models/' . $model . '.php')) {
			require_once(APPROOT . '/models/' . $model . '.php');
			$model = new $model;
			return $model;
		}
	}

	public function view($view, $data = [])
	{
		if (file_exists(APPROOT . '/views/' . $view . '.php')) {
			require_once(APPROOT . '/views/' . $view . '.php');
		} else {
			die('view is not exists');
		}
	}
}