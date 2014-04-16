//special for Antonio
<?php

// подключаем файлы ядра
require_once 'core/db.php'; //Подключение к БД
require_once 'core/model.php'; //файл модели
require_once 'core/view.php'; // файл вывода основного аблона
require_once 'core/controller.php'; // подключение шаблона

require_once './config.php'; //Файл настроек

require_once './lang/en.ini'; //Локализация
require_once 'core/route.php'; //файл для обработки запроса в браузере
Route::start(); // запускаем маршрутизатор
