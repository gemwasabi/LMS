<?php

class Kontrolluesi
{
    public function shfaq($emri, $data)
    {
        $emri_skedarit = "../app/pamjet/" . $emri . ".PHP";
        require("../app/pamjet/struktura/header.php");
        require("../app/pamjet/struktura/sidebar.php");
        require("../app/pamjet/struktura/topbar.php");
        require(file_exists($emri_skedarit)) ? $emri_skedarit : "../app/pamjet/404.php";
        require("../app/pamjet/struktura/footer.php");
    }
}