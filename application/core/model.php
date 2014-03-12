<?php

class Model
{

	// метод выборки данных
	public function get_data()
	{		
	}
	
	//Метод установки данных
	public function set_data()
	{		
	}


	public function insert($query)
		{
			return mysql_query($query);	
		}	
}