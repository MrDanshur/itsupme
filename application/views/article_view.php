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
<br>
<h2><?php echo ADD_COMMENT; ?></h2>
<form action="#" method="POST" enctype="multipart/form-data" name="addcom" id="addcom" onSubmit="return false"> 
 <?php echo YOUR_NAME; ?>:<br>
 <input name="author" type="text" size="30" class="pole" id="author"><br>
  <?php echo TEXT_COMMENT; ?>:<br>
 <textarea name="text" rows="5" cols="50" class="text" id="text"></textarea><br> 
 <input name="id" type="hidden" id="id" value="<?php echo $row["id"]; ?>">
 <input class="adscom" name="button" type="button" value=" <?php echo ADD_COMMENT_BUT; ?>" onclick="doLoad(document.getElementById('author'),document.getElementById('text'),document.getElementById('id'))">
 </form>
 <hr>
 
 <div id='comment_block'>
 <h2><?php echo COUNT_COMMENTS.' <span id="count_com">'.mysql_num_rows($adv); ?></span></h2>
 <?php
 while ($comment = mysql_fetch_assoc($adv))
	{ 
		echo '<div class="comment_box">';
		echo '<p class="author">Author: <b>'.$comment["author"].'</b></p>';
		echo '<p class="date">'.$comment["date"].'</p>';
		echo '<p class="text">'.$comment["text"].'</p>';
		echo '</div>';
	}
?>
</div>