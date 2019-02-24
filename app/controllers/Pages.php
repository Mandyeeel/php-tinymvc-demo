<?php
	
class Pages extends Controller
{
	public function __construct()
	{
		$this->postModel = $this->model('post');
		$posts = $this->postModel->getAll();
	}

	public function index()
	{
		$data = array(
			'title' => '首頁'
		);

		$this->view('pages/index', $data);
	}

	public function about($id = null)
	{
		$this->view('he');
	}
}