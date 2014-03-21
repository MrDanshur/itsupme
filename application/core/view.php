<?php
//Базовый класс вида.
class View
{	
	/*
	$content_file - виды отображающие контент страниц;
	$template_file - общий для всех страниц шаблон;
	$data - массив, содержащий элементы контента страницы. Обычно наполняется в модели.
	$adv, тоже, что и data. Дополнительно
	*/
	//Подгружает шаблоны вида с возможностью использования данных переменных data и adv
	function generate($content_view, $template_view, $data = null, $adv = null)
		{
			include 'application/views/'.$template_view;
		}
}
