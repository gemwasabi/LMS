<?php

class Perdoruesit_model
{
    use Modeli;

    protected $tabela = 'perdoruesit';
    protected $fushat_lejuara = [
        'username',
        'email',
        'password'
    ];

    function merr_perdoruesin($id)
    {
        $x = $this->pari(['id' => $id]);
        return $x;
    }

    function merr_perdoruesit()
    {
        $x = "
        SELECT *, 
        CASE
          WHEN grupi = 0 THEN 'Admin'
          WHEN grupi = 1 THEN 'Profesor'
          WHEN grupi = 2 THEN 'Student'
          ELSE 'N/A'
        END AS grupi
        FROM perdoruesit;
        ";
        $x = $this->query($x);
        return $x;
    }

    function merr_profesoret()
    {
        $x = "
        select *
        from perdoruesit
        where grupi = 1 or grupi = 0
        ";
        return $this->query($x);
    }
}