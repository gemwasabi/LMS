<?php

class Ballina extends Kontrolluesi
{

    private $postimet_model;

    function __construct()
    {
        $this->postimet_model = new Postimet_model;
    }

    function index()
    {
        if (!isset($_SESSION['emri'])) {
            header('location: ' . ROOT . '/perdoruesit/kycu');
            exit;
        }

        $data['titulli'] = 'Ballina';
        $data['postimet'] = $this->postimet_model->merr_postimet_perdoruesit($_SESSION['id']);

        $this->shfaq_kornizat('ballina', $data);
    }

}