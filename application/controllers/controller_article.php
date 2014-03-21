<?php
// Контроллер отдельной статьи
class Controller_Article extends Controller
{

	function __construct()
	{
		$this->model = new Model_Article();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();	
		//Получение списка комментов
		$adv = $this->model->get_comments();	
		$this->view->generate('article_view.php', 'template_view.php', $data, $adv);		
	}
}
