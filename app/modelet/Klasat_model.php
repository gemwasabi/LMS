<?php

class Klasat_model
{
    use Modeli;

    protected $tabela = 'klasat';
    // protected $fushat_lejuara = [
    //     'username',
    //     'email',
    //     'password'
    // ];

    function merr_klasat()
    {
        $x = "
        select k.id, k.emri, k.pershkrimi, k.fjalekalimi, concat(p.emri, ' ', p.mbiemri) as profesori, date_format(k.data_krijimit, '%d.%m.%Y') as data_krijimit, count(kp.id) as nr_studenteve, p.id as profesori_id
        from klasat k
        left join perdoruesit p on p.id = k.perdoruesi_id 
        left join klasat_perdoruesve kp on kp.klasa_id = k.id
        group by k.id
        ";
        return $this->query($x);
    }

    function merr_klasen($id)
    {
        $x = "
        select k.id, k.emri, k.pershkrimi, k.fjalekalimi, concat(p.emri, ' ', p.mbiemri) as profesori, date_format(k.data_krijimit, '%d.%m.%Y') as data_krijimit, count(kp.id) as nr_studenteve, p.id as profesori_id
        from klasat k
        left join perdoruesit p on p.id = k.perdoruesi_id 
        left join klasat_perdoruesve kp on kp.klasa_id = k.id
        where k.id = $id
        group by k.id
        ";
        return $this->query($x)[0];
    }

    function merr_klasat_personale($id)
    {
        $x = "
            select k.id, k.emri, k.pershkrimi, k.fjalekalimi, concat(p.emri, ' ', p.mbiemri) as profesori, date_format(k.data_krijimit, '%d.%m.%Y') as data_krijimit, count(kp.id) as nr_studenteve, p.id as profesori_id
            from klasat k
            left join perdoruesit p on p.id = k.perdoruesi_id 
            left join klasat_perdoruesve kp on kp.klasa_id = k.id
            where kp.perdoruesi_id = $id
            group by k.id
        ";
        return $this->query($x);
    }

    function merr_klasat_ligjeruese($id)
    {
        $x = "
            select k.id, k.emri, k.pershkrimi, k.fjalekalimi, concat(p.emri, ' ', p.mbiemri) as profesori, date_format(k.data_krijimit, '%d.%m.%Y') as data_krijimit, count(kp.id) as nr_studenteve, p.id as profesori_id
            from klasat k
            left join perdoruesit p on p.id = k.perdoruesi_id 
            left join klasat_perdoruesve kp on kp.klasa_id = k.id
            where k.perdoruesi_id = $id
            group by k.id
        ";
        return $this->query($x);
    }

    function bashkohu($data)
    {
        $x = "
        insert into klasat_perdoruesve (klasa_id, perdoruesi_id) values (" . $data['klasa_id'] . ", " . $data['perdoruesi_id'] . ")
        ";
        return $this->query($x);
    }

    function largohu($id, $uid)
    {
        $x = "delete from klasat_perdoruesve where perdoruesi_id = $uid and klasa_id = $id";
        return $this->query($x);
    }

    function merr_klasat_lira($id)
    {
        $x = "
        SELECT k.id, k.emri, k.pershkrimi, k.fjalekalimi, concat(p.emri, ' ', p.mbiemri) as profesori, date_format(k.data_krijimit, '%d.%m.%Y') as data_krijimit, p.id as profesori_id
        FROM klasat k
        LEFT JOIN klasat_perdoruesve kp ON k.id = kp.klasa_id AND kp.perdoruesi_id = $id
        left join perdoruesit p on p.id = k.perdoruesi_id 
        WHERE kp.id IS NULL;
        ";
        return $this->query($x);
    }
}