<?php
require("../../config.php"); 
require("../core/db.php"); 
//$m=new Model();
//$m->connect();
DB::get()->handle();
header('Content-Type: text/html; charset=utf-8'); 
if( $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest')
	die( 'Ошибка запроса!' );
else 
	{ 	
//ИЗВЛЕЧЕНИЕ ТИПОВ ОПЕРАЦИЙ ПО id КАТЕГОРИЙ
if(isset($_POST['author']) && !empty($_POST['author'])&&isset($_POST['text']) && !empty($_POST['text'])&&isset($_POST['id']) && !empty($_POST['id'])) 
			{ 
$author = mysql_real_escape_string($_POST['author']);		
$text = mysql_real_escape_string($_POST['text']);
$id = mysql_real_escape_string($_POST['id']);
				$result = mysql_query("INSERT INTO `comments` (`article`,`text`,`author`) VALUES ('$id','$text','$author') ");
					if ($result=='true')
						{
							$cat_add='{'.'"status": "OK"'.'}';
							echo $cat_add;
						}
						else {
							$cat_add='{'.'"status": "False"'.'}';
							echo $cat_add;
						}
				unset($author);
				unset($text);
				unset($id);
			}
	
//ИЗВЛЕЧЕНИЕ ТИПОВ ОПЕРАЦИЙ ПО id КАТЕГОРИЙ
else if(isset($_GET['id_stud']) && !empty($_GET['id_stud'])) 
			{ 
$id_stud = $_GET['id_stud'];		
				$result_work=mysql_query("SELECT * FROM students,s_doctype WHERE students.IdStudent='$id_stud' AND students.IdDocType=s_doctype.IdDocType");				
				$fields=mysql_query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'students' OR table_name = 's_doctype'");				
				$data_work = '{"student":['."\n";
				$arr;
				if(mysql_num_rows($fields)>0)
					while ($field = mysql_fetch_array($fields))
						{$arr[]=$field[0];}
					if(mysql_num_rows($result_work)>0)
					{
						while ($par_work = mysql_fetch_array($result_work))
							{		
								$i=1;
								$data_work.= "\n".'{'.'"'.$arr[0].'": "'.$par_work[$arr[0]].'",';
									while(count($arr)>$i)
									{
										$data_work.=  '"'.$arr[$i].'": "'.$par_work[$arr[$i]].'",';
										$i++;
									}
								$data_work = substr($data_work, 0,-1);	
									
									
								/*
								$data_work.= "\n".'{'.'"SurnameRus": "'.$par_work[$arr[5]].'",';	
								$data_work.=  '"NameRus": "'.$par_work['NameRus'].'",';
								$data_work.=  '"PatronymicRus": "'.$par_work['PatronymicRus'].'",';
								$data_work.=  '"SurnameBel": "'.$par_work['SurnameBel'].'",';
								$data_work.=  '"NameBel": "'.$par_work['NameBel'].'",';
								$data_work.=  '"PatronymicBel": "'.$par_work['PatronymicBel'].'",';
								$data_work.=  '"FIOlatin": "'.$par_work['FIOlatin'].'"';	
								*/							
								$data_work.= '},';						 
							} 
						$data_work = substr($data_work, 0,-1);						 
						echo  $data_work;						 
						echo '], ', "\n" ,'"status": "OK"',  "\n", '}';
 				}
				else
					{
						echo '{"status": "false"}';
					}
				unset($categories_id);
			}

			
			else  die('Неверны параметры запроса!');
	}
?>
