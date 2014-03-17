<script src="/js/comment.js" type="text/javascript"></script>
<!--<script src="/js/JsHttpRequest.js" type="text/javascript"></script> -->
<?php 



$row = mysql_fetch_assoc($data);
echo '<h1><a href="article?id='.$row["id"].'">'.$row["title"].'</a></h1>';
		echo '<p class="date">'.$row["date"].'</p>';
		echo '<p class="text">'.$row["text"].'</p>';
		
		echo '<h4><a href="edit?id='.$row["id"].'">'.EDIT.'</a></h4>';
?>
<hr>
<div id='cerror'></div>
<br><br>
<h2><?php echo ADD_COMMENT; ?></h2>
<form action="#" method="POST" enctype="multipart/form-data" name="addcom" id="addcom" onSubmit="return false"> 
 Ваше имя:<br>
 <input name="author" type="text" size="30" class="pole" id="author"><br><br>
 Текст комментария:<br>
 <textarea name="text" rows="5" cols="50" class="text" id="text"></textarea><br> 
 <br>
 <input name="id" type="hidden" id="id" value="<?php echo $row["id"]; ?>">
 <input class="adscom" name="button" type="button" value="Добавить комментарий" onclick="doLoad(document.getElementById('author'),document.getElementById('text'),document.getElementById('id'))">
 </form>