<?php

namespace Fw;

use Exception;

require_once "Fw/init.php";

if (!defined('BITRIX_CORE')) {
    die();
}

$formparams = ["additional_class" => "window--full-form", "attr" => ["data-form-id" => "form-123", "data-btn-id" => "btn-123", "data-btn-title" => "Отправить"], "method" => "post", "action" => "",
    "elements" => [
        ["content" => "Form", "type" => "textarea"],
        ["title" => "My Input", "type" => "text", "name" => "my-inp", "default" => "enter something", "attr" => ['data-id' => 17], "additional_class" => 'js-login'],
        ["type" => "text-multiple", "name" => "my-inp", "title" => "Multiple Input", "default" => "enter something", "attr" => ['data-id' => 120], "additional_class" => 'js-login'],
        ["title" => "My psw", "type" => "password", "name" => "my-psw", "default" => "enter password", "attr" => ['data-id' => 18], "additional_class" => 'js-psw'],
        ["title" => "My number", "type" => "number", "name" => "my-number", "default" => "enter number", "attr" => ['data-id' => 22], "additional_class" => 'js-num'],
        ["title" => "Выбери меня", "type" => "checkbox", "name" => "my-chb", "attr" => ['data-id' => 19], "additional_class" => 'js-chb'],
        ["title" => "Еще вариант", "type" => "checkbox", "name" => "my-chb2", "attr" => ['data-id' => 20], "additional_class" => 'js-chb2'],
        ["title" => "testcheck-multiply", "type" => "checkbox-multiple", "name" => "my-chb-mult", "list" => [
            ["title" => "Пункт 1", "attr" => ['data-id' => 1919], "additional_class" => 'js-chb'],
            ["title" => "Пункт 2", "attr" => ['data-id' => 1920], "additional_class" => 'js-chb'],
            ["title" => "Пункт 3", "attr" => ['data-id' => 1921], "additional_class" => 'js-chb']
        ]],
        ["title" => "Выберите сервер", "type" => "select", "name" => "my-sel", "attr" => ['data-id' => 21], "additional_class" => 'js-sel', "list" => [
            ["title" => "AWS", "value" => "AWS", "additional_class" => 'AWS', "attr" => ['data-id' => 211], "selected" => true],
            ["title" => "Google", "value" => "Google", "additional_class" => 'Google', "attr" => ['data-id' => 212]]
        ]
        ],
        ["title" => "Выберите сервер Multiple", "type" => "select-multiple", "name" => "my-sel-mult", "attr" => ['data-id' => 2121], "additional_class" => 'js-sel', "list" => [
            ["title" => "AWS", "value" => "AWS", "additional_class" => 'AWS', "attr" => ['data-id' => 21211], "selected" => true],
            ["title" => "Google", "value" => "Google", "additional_class" => 'Google', "attr" => ['data-id' => 21212]]
        ]
        ],
        ["title" => "Выберите утверждение", "type" => "radio", "name" => "testradio", "list" => [
            ["title" => "Case 1", "additional_class" => 'AWS', "attr" => ['data-id' => 211]],
            ["title" => "Case 2", "additional_class" => 'Google', "attr" => ['data-id' => 212]]
        ]
        ]
    ]
];

$app->header();
$app->getPage()->setProperty('keywords', 'Aleksei');
$app->getPage()->setProperty('title', 'Главная страница');
$app->getPage()->setProperty('headtext', 'Описание страницы');
$app->getPage()->setProperty('footerText', 'Описание футера');
$app->getPage()->addCss('Fw/templates/.default/css/style.css');
$app->getPage()->addJs('Fw/templates/.default/js/script.js');
$app->getPage()->addCss("/Fw/libs/bootstrap-5.1.3-dist/css/bootstrap.css");

try {
    echo "<div class=\"container\"><div class=\"row\"><div class=\"col\">";
    $app->includeComponent("Fw\Components\Clocker:DigitalClock", "default_template", ["date" => "25.05.2023"]);
    echo "</div> <div class=\"col\">";
    $app->includeComponent("Fw\Components\Calculator:CalcSumm", "violet", ["a" => 7, "b" => 3]);
    echo "</div> </div> </div>";
} catch (Exception $e) {
    echo "<div class=\"error\">", $e->getMessage(), "</div>", "\n";
}
?>

    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                try {
                    $app->includeComponent("Fw\Components\Forms:Render", "default", $formparams);
                } catch (Exception $e) {
                    echo "<div class=\"error\">", $e->getMessage(), "</div>", "\n";
                }
                ?>
            </div>
        </div>
    </div>

    <br/>
    <br/>

    <pre>

-------- 01.06.2023 --------
1) создал компонент формы
2) создал футер и заполнил его данными
-------- 31.05.2023 --------
1) создал классы для работы с компонентами и их шаблонами
2) создал два компонента: История проекта и Калькулятор двух чисел
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