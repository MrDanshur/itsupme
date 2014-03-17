<?php

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

		
/* Функция выбора новости согласно условию. */		
	public function select_article($id)
		{		
			return mysql_query("SELECT id,title, date,text FROM news WHERE id=$id");
		}


	
	public function javascript()
	{
	?><script type="text/javascript">
	$('#stud_list option').bind('click', function (){
//		$(this).css('display','none'); 	
		var id_stud=$(this).attr('id');
			//alert(id_stud);
		$.getJSON("application/models/sql.php", {id_stud:id_stud}, function(data)
			{		//alert(id_stud);
				if(data.status=='OK')
					{
						info(data);

					}
			})					


	} );
		
	</script><?php
	}
	
}
