<h1><?php echo LIST_NEWS ?></h1>
<!-- Для вывода статей-->
<?php 
while ($row = mysql_fetch_assoc($data))
	{ 
		echo '<div class="news_box">';
		echo '<h3><a href="article?id='.$row["id"].'">'.$row["title"].'</a></h3>';
		echo '<p class="date">'.$row["date"].'</p>';
		echo '<p class="text">'.$row["text"].'<a href="article?id='.$row["id"].'"> Подробнее...</a></p>';
		echo '</div>';
	}

/**
* Создание объекта $page и вызов функции создания навигации
*
* @param integer $total - количество статей
* @param integer $start_row - С какой статьи стартовать вывод
*/
$page = new Pagination();

echo '<div class="wrap"><strong>Pages: </strong>'.$page->paginator($adv['total'],$adv['per_page'],$adv['num_page'],$adv['start_row'],'news').'</div>';
