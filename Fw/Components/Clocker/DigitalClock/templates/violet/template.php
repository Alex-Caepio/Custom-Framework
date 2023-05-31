<?php

use Fw\Core\Page;

$pagepart = Page::getInstance();
?>
<div class="block-clock-violet">
    <div class="h-clock-violet">
        <h2>My component - Clocker</h2>
    </div>
    <div class="p-clock-violet">
        <p><?= $result["deltaday"]; ?> days <br></p>
        <p>Start <?= $params["date"]; ?></p>
    </div>
</div>
