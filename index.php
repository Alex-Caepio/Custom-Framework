<?php

namespace Fw;

require_once "Fw/init.php";

if (!defined('BITRIX_CORE')) {
    die();
}

$app->header();
$app->getPage()->setProperty('keywords', 'Aleksei');
$app->getPage()->setProperty('title', 'Главная страница');
$app->getPage()->setProperty('headtext', 'Описание страницы');
$app->getPage()->addCss('Fw/templates/.default/css/style.css');
$app->getPage()->addJs('Fw/templates/.default/js/script.js');

?>

    <pre>
-------- 29.05.2023 --------
1) создан класс Page для работы с содержимым html страницы
2) создан функционал буфера для вывода страницы
3) создан класс Application для работы с буфером и страницей
4) создана базовая структура шаблона
-------- 26.05.2023 --------
1) создан конфиг и класс для работы с ними
2) создана функция авторегистрации классов
</pre>

    <?php

$app->footer();

?>