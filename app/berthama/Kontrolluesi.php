<?php

class Kontrolluesi
{
    public function shfaq_kornizat($emri, $data = false)
    {
        $emri_skedarit = "../app/pamjet/" . $emri . ".PHP";

        if (file_exists($emri_skedarit)) {
            if ($data) {
                extract($data);
            }
            require("../app/pamjet/struktura/header.php");
            require("../app/pamjet/struktura/sidebar.php");
            require("../app/pamjet/struktura/topbar.php");
            require($emri_skedarit);
            require("../app/pamjet/struktura/footer.php");
        } else {
            require "../app/pamjet/404.php";
        }
    }

    public function shfaq($emri, $data = false)
    {
        $emri_skedarit = "../app/pamjet/" . $emri . ".PHP";

        if (!isset($data['titulli'])) {
            $data['titulli'] = 'Titulli';
        }

        if (file_exists($emri_skedarit)) {
            extract($data);
            require $emri_skedarit;
        } else {
            require "../app/pamjet/404.php";
        }
    }
}