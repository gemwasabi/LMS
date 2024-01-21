<?php

class Ballina extends Kontrolluesi
{
    function index()
    {
        // echo '<pre>';print_r('po');die;
        // $model = new Ballina_model;
     
        // $arr = [
        //     'username' => 'gem',
        //     'email' => 'gem@gme.com',
        //     'password' => '12345'
        // ];
        
        // $x = $model->fut($arr);
        // echo '<pre>';
        // print_r($x);
        // die;
        // $this->shfaq('ballina');

        $x = [
            'titulli' => 'Ballina'
        ];

        $this->shfaq_kornizat('ballina', $x);
    }
    
}