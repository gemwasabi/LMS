<?php

spl_autoload_register(function ($emri_klases) {
    require "../app/modelet/" . ucfirst($emri_klases) . ".php";
});

require 'konfigurimet.php';
require 'Databaza.php';
require 'Modeli.php';
require 'Kontrolluesi.php';
require 'App.php';