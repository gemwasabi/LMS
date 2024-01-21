<?php

spl_autoload_register(function ($emri_klases) {
    $modelet_file = "../app/modelet/" . ucfirst($emri_klases) . ".php";
    $libraria_file = "../app/libraria/" . ucfirst($emri_klases) . ".php";

    if (file_exists($modelet_file)) {
        require $modelet_file;
    } elseif (file_exists($libraria_file)) {
        require $libraria_file;
    }
});

require 'konfigurimet.php';
require 'Databaza.php';
require 'Modeli.php';
require 'Kontrolluesi.php';
require 'App.php';