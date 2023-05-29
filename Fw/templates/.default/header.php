<?php
$pageApp = $this->page;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="<?= $pageApp->showProperty("keywords") ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/x-icon" href="Fw/templates/.default/img/icon.png" rel="shortcut icon">
    <?= $pageApp->showHead(); ?>
    <title><?= $pageApp->showProperty("title"); ?></title>
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-4"><?= $pageApp->showProperty("headtext") ?></span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Shop</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Company</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Careers</a></li>
        </ul>
    </header>
</div>
