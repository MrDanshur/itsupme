<?php
//Паттерн Singleton (синглтон)
class DB
{
	private $_handle = null;
	
	public static function get()
	  {
		static $db = null;
		if ( $db == null )
		  $db = new DB();
		return $db;
	  } 

	private function __construct()
	  {
		$bd=mysql_connect(HOST,LOGIN,PASS)or die('No connection');
		$this->_handle=mysql_select_db(DB_NAME,$bd)or die('No DB');
		mysql_query("SET NAMES 'utf8'");
	  }
  
	public function handle()
	  {
		return $this->_handle;
	  }
}