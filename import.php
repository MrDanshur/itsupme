<?php
session_start();
function import_xml()
{
require_once 'config.php';
require_once 'application/core/model.php';

   $catalog = "tmp/"; // Наш каталог 
   if (is_dir($catalog)) // Если такой каталог есть 
   { 
     $myfile = $_FILES["f"]["tmp_name"]; // Времменый файл 
     $myf = $_FILES["f"]["name"]; // Имя файла 
     $myfile_name = md5($_FILES["f"]["name"]); // Имя файла 
	 $kol_suc=0;
	 $kol_err=0;
	// echo $myfile_name.$myfile;
     if(!copy($myfile, $catalog.$myfile_name)) echo 'Ошибка при копировании файла '; // Если неудалось скопировать файл 
  } 
	$s=new Model();
	$s->connect();
		$xml = simplexml_load_file($catalog.$myfile_name);
		echo "<pre>";
		//print_r($xml);
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
		//	echo $query;
$res=$s->insert($query);
	if ($res==1) $kol_suc++;
		else { $kol_err++; echo $query."\n"; }
		}	
echo "Successful added: ".$kol_suc." string\n";
echo "Error: ".$kol_err." string\n";
	//insert($_FILES["f"]["name"],$xml->$_FILES["f"]["name"]);			

session_unset();
}

if(isset($_FILES["f"])&&isset($_SESSION['id'])) { import_xml(); }
else {
?>
<div id="form">
  <form enctype="multipart/form-data" method="post" action="import.php">
   <p><input type="file" name="f"><input type="hidden" name="secret" value="1">
   <input type="submit" value="Загрузить"></p>
  </form> 
		</div>
<?php $_SESSION['id']=0; } ?>		