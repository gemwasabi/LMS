<?php

class Postimet_model
{
    use Modeli;

    protected $tabela = 'postimet';

    public function merr_postimet($id)
    {
        $query = "
        select p.*, p.id as id, k.emri as emri_klases, date_format(p.data_krijimit, '%d.%m.%Y %H:%i:%s') as data_krijimit
        from postimet p
        left join klasat k on k.id = p.klasa_id
        where p.perdoruesi_id = $id
        ";

        return $this->query($query);
    }

    public function merr_postimet_perdoruesit($id)
    {
        $query = "
        select p.*, k.emri as emri_klases, concat(pr.emri, ' ', pr.mbiemri) as perdoruesi, date_format(p.data_krijimit, '%d.%m.%Y %H:%i:%s') as data_krijimit
        from postimet p
        left join klasat k on k.id = p.klasa_id
        left join perdoruesit pr on pr.id = p.perdoruesi_id
        left join klasat_perdoruesve kp on kp.klasa_id = k.id
        where kp.perdoruesi_id = $id
        ";

        return $this->query($query);
    }

    public function merr_postimin($id)
    {
        $query = "
        select p.*, concat(pr.emri, ' ', pr.mbiemri) as profesori, date_format(p.data_krijimit, '%d.%m.%Y %H:%i:%s') as data_krijimit, k.emri as klasa
        from postimet p
        left join perdoruesit pr on pr.id = p.perdoruesi_id
        left join klasat k on k.id = p.klasa_id
        where p.id = $id
        ";

        return $this->query($query)[0];
    }
}