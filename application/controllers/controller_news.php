<?php

class Controller_News extends Controller
{

	function __construct()
	{
		$this->model = new Model_News();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();	
		$pag = $this->model->page_param();	
		$this->view->generate('news_view.php', 'template_view.php', $data, $pag);		
		//$data = $this->model->javascript();	
	}
}
