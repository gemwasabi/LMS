<?php

class Perdoruesit extends Kontrolluesi
{
    function index()
    {
        echo '<pre>';
        print_r('index method');
        die;
    }

    function kycu()
    {
        $data['titulli'] = 'foobarbaz';
        $data['foo'] = 'test';
        return $this->shfaq('ballina', $data);
    }
}