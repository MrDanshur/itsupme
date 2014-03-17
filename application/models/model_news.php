<?php

class Model_News extends Model
{
	public $total;
	public $start_row;
	public $per_page = PER_PAGE;
	public $num_page = NUM_PAGE;
	
	public function get_data()
	{
		require_once("application/views/class.page.php");
		/**
		 * @param integer $per_page - количество статей на странице
		 * @param integer $num_page - количество страниц
		 */


		DB::get()->handle();


/* Проверка URL */
$this->start_row = (!empty($_GET['p']))? intval($_GET['p']): 0;

/* Вызов функции для подсчёта количества новостей в БД */
$this->total=$this->count_news();

if($this->start_row < 0) $this->start_row = 0;
if($this->start_row > $this->total) $this->start_row = $this->total;

/* Извлечение определённого количества статей */
return $this->select_all_news($this->start_row,$this->per_page);
	}

/* Подсчёт кол-ва статей*/
	public function count_news()
		{
			$count=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS total FROM news"));
			return $count['total'];
		}

		
/* Функция выбора новостей согласно условию. Для постарничной навигации*/		
	public function select_all_news($start_row,$per_page)
		{		
				return mysql_query("SELECT id,title, date,left(text,100) as text FROM news ORDER BY id LIMIT $this->start_row,$this->per_page");
		}


	public function page_param()
		{		
				return array('total'=>$this->total,'per_page'=>$this->per_page,'num_page'=>$this->num_page,'start_row'=>$this->start_row);
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
