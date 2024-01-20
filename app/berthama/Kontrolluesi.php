<?php

class Kontrolluesi
{
    public function shfaq($emri)
    {
        $emri_skedarit = "../app/pamjet/" . $emri . ".PHP";

        require(file_exists($emri_skedarit)) ? $emri_skedarit : "../app/pamjet/404.php";
    }
}