<?php

class Pagination {

 /**
 * Создание объекта $page и вызов функции создания навигации
 *
 * @param integer $per_page - количество статей на странице
 * @param integer $num_page - количество страниц
 * @param integer $total - количество статей
 * @param integer $start_row - С какой статьи стартовать вывод
 */
	public function paginator($total, $per_page, $num_links, $start_row, $url)
		{
			$num_pages = ceil($total/$per_page);
				if ($num_pages == 1) return '';
			
			$cur_page = $start_row;
			   
			if ($cur_page > $total)
			{  $cur_page = ($num_pages - 1) * $per_page; }
			
			$cur_page = floor(($cur_page/$per_page) + 1);
			
			$start = (($cur_page - $num_links) > 0) ? $cur_page - $num_links : 0;
			
			$end   = (($cur_page + $num_links) < $num_pages) ? $cur_page + $num_links : $num_pages;
			
			$output = '<span class="ways">';

			for ($loop = $start;$loop <= $end;$loop++)
			{
				$i = ($loop * $per_page) - $per_page;
				
				if ($i >= 0)
				{
					if ($cur_page == $loop)
					{
						$output .= '<span>'.$loop.'</span>'; 
					}
					else
					{
						$n = ($i == 0) ? '' : $i;
						$output .= '<a href="'.$url.'?p='.$n.'">'.$loop.'</a>';
					}
				}
			}
			
			return $output;
		}

	
}
?>
