<?php

class Controller_Import extends Controller
{

	function __construct()
	{
		$this->model = new Model_Import();
		$this->view = new View();
	}
	
	function action_index()
	{
		if(!isset($_SESSION['id'])||$_SESSION['id']==1 )
			{
				$this->view->generate('import_view.php', 'template_view.php');
				$_SESSION['id']=0; 
				
			}	
		else 
			{
				$data = $this->model->set_data();
				$this->view->generate('import_xml_view.php', 'template_view.php',$data);	
				$_SESSION['id']=1; 	

					
			}
	}
}
