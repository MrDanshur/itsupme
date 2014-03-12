<?php

class Model_Import extends Model
{		
	
public function set_data()
	{
	   $catalog = "tmp/"; // Наш каталог 
	   if (is_dir($catalog)&&isset($_FILES["f"])) // Если такой каталог есть 
	   { 
		 $myfile = $_FILES["f"]["tmp_name"]; // Времменый файл 
		 $myf = $_FILES["f"]["name"]; // Имя файла 
		 $myfile_name = md5($_FILES["f"]["name"]); // Имя файла 
		 $kol_suc=0;
		 $kol_err=0;
			 if(!copy($myfile, $catalog.$myfile_name)) return "Copy not possible"; // Если неудалось скопировать файл 
			   else
				   {
						$xml = simplexml_load_file($catalog.$myfile_name);
						if (parent::connect())
					{	
							foreach($xml as $key=>$val)
							{
							$content="";	
							unset($fields);	
							
							if (!isset($fields))
								{
									$fields="(";
									foreach($val as $k=>$v)
										{	
											$fields.="`".$k."`,";
										}
									$fields=substr($fields,0,-1);
									$fields.=")";
								}
							$content.="(";
								foreach($val as $k=>$v)
								{
									$content.="'".str_replace("'","\'",$v)."',";
								}
								$content=substr($content,0,-1);
								$content.="),";
							$content=substr($content,0,-1);
							$query= "INSERT INTO ".$key." ".$fields." VALUES ".$content;
				$res=parent::insert($query);
					if ($res==1) $kol_suc++;
						else { $kol_err++; }
						}	

						
				$text="Successful added: ".$kol_suc." string\n";
				$text.="Error: ".$kol_err." string\n";
						return $text;		

				}
			}	
		} else return "Not directory or files not selected";

	}

}
