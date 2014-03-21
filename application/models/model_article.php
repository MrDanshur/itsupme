<?php
//Модель класса новости
class Model_Article extends Model
{
	public $id;
	
	public function get_data()
	{
		DB::get()->handle();
		/* Проверка URL */
		$this->id = (!empty($_GET['id']))? intval($_GET['id']): 0;

		if($this->id!=0) 
		/* Извлечение статьи */
		return $this->select_article($this->id);
	}

	/* Выборка комментов */
	public function get_comments()
	{
		DB::get()->handle();
		/* Проверка URL */
		$this->id = (!empty($_GET['id']))? intval($_GET['id']): 0;

		if($this->id!=0) 
		/* Извлечение комментариев */
		return $this->select_comments($this->id);
	}
	
		
	/* Функция выбора новости согласно условию. */		
	public function select_article($id)
		{		
			return mysql_query("SELECT id,title, date,text FROM news WHERE id=$id");
		}

	/* Функция выбор комментов по id статьи */		
	public function select_comments($id)
		{		
			return mysql_query("SELECT id,article,author,date,text FROM comments WHERE article=$id");
		}	
}
