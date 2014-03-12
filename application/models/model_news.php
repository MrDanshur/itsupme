<?php

class Model_News extends Model
{
	
	public function get_data()
	{
		// Здесь мы просто сэмулируем реальные данные.
			//$datas=parent::connect();
			DB::get()->handle();
			return mysql_query("SELECT * FROM students");
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
