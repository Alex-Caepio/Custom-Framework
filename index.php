<?php

namespace Fw;

use Fw\Core\Application;

require __DIR__ . '/Fw/init.php';

$app = Application::getInstance();

$app->header();
$app->getPage()->setProperty('author', 'Aleksei');
$app->getPage()->setProperty('title', 'Главная страница');
$app->getPage()->addCss('Fw/templates/.default/css/style.css');
$app->getPage()->addJs('Fw/templates/.default/js/script.js');
$app->footer();

?>

<pre>
-------- 29.05.2023 --------
1) создан класс Page для работы с содержимым html страницы
2) создан функционал буфера для вывода страницы
3) создан класс Application для работы с буфером и страницей
4) создана базовая структура шаблона
-------- 26.05.2023 --------
1) создан конфиг и класс для работы с ними
2) создана функция авто регистрации классов
</pre>
