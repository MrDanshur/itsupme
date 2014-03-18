<?
require("../../config.php"); 
require("../core/db.php"); 
DB::get()->handle();

// Запрет на кэширование
header("Expires: Mon, 23 May 1995 02:00:00 GTM");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GTM");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
//****

$log ="";
$error="no"; //флаг наличия ошибки



//Короткие имена переменных и обрезка пробелов img_title
$text = trim($_POST['text']);
$author = trim($_POST['author']);
$id = trim($_POST['id']);

//Проверка email адреса

if($author == ''){
	$log .= "Please, input your name<br>";
	$error = "yes";
}

//Проверка наличия введенного текста комментария
if (empty($text)){
	$log .= "require input the text<br>";
	$error = "yes";
}


//Проверка длины текста комментария
if(strlen($text)>1000){
	$log .= "Слишком длинный текст, в вашем распоряжении 1000 символов!<br>";
	$error = "yes";
}
	 
//Проверка на наличие длинных слов
$mas = preg_split("/[\s]+/",$text);
foreach($mas as $index => $val){
	if (strlen($val)>40)  {
		$log .= "Слишком длинные слова (более 40 символов) в тексте записи!<br>";
		$error = "yes";
		break;
	}
}
	
//Экранирование и преобразование опасных символов
if (!get_magic_quotes_gpc()){
	$text = addslashes($text);
	$author = addslashes($author);
}

$text = htmlspecialchars($text);
$author = htmlspecialchars($author);

//Если нет ошибок добавляем в базу  
if($error=="no"){
date_default_timezone_set("Europe/Minsk");
	$date = date("Y-m-d H:i:s");
	$result2 = mysql_query("INSERT INTO `comments` (`article`,`text`,`author`,`date`) VALUES ('$id','$text','$author','$date') ");
	//****
	$ok="<div><strong>".$author."</strong><br>Add: ".$date."<br>".$text."</div>";

	//Помещаем результат в массив
	$GLOBALS['_RESULT'] = array(
	'error' => 'no',
	'ok' => $ok
	);
echo $_RESULT['error'];
}
else {//если ошибки есть
 	$log = "<div><strong><font color='red'> Error! </font></strong><br>".$log."</div>";
	//Отправляем результат в массив
	$GLOBALS['_RESULT'] = array(
	'error' => 'yes',      
	'er_mess' => $log);
	echo $_RESULT['er_mess'];
}  	
?>