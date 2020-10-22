<?php

    require_once __DIR__.'/../vendor/autoload.php';

    //load HTML template
    $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/html');
    $twig = new \Twig\Environment($loader);
    $twig->addExtension(new Twig\Extra\Intl\IntlExtension());

    //get content data (for dynamic copy changes)
    $data = file_get_contents(__DIR__.'/assets/data/main.id.json');

    //simulate to get dynamic price changes
    $data_price = file_get_contents(__DIR__.'/assets/data/prices.id.json');

    echo $twig->render('main.html', array("html" => json_decode($data, true), "prices" => json_decode($data_price, true)));