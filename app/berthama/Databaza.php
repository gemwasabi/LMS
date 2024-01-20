<?php

Trait Databaza
{
    private function lidhu()
    {
        $string = "mysql:hostname=" . HOST_DB . ";dbname=" . EMRI_DB;
        return new PDO($string, PERDORUESI_DB, FJALEKALIMI_DB);
    }

    public function query($query, $data = [])
    {
        $con = $this->lidhu();
        $deklarata = $con->prepare($query);
        $kontrollo = $deklarata->execute($data);
        if ($kontrollo) {
            $rezultati = $deklarata->fetchAll(PDO::FETCH_ASSOC);
            if (is_array($rezultati) && count($rezultati) > 0) {
                return $rezultati;
            }
        }

        return false;
    }

    public function merr_resht($query, $data = [])
    {
        $con = $this->lidhu();
        $deklarata = $con->prepare($query);
        $kontrollo = $deklarata->execute($data);

        if ($kontrollo) {
            $rezultati = $deklarata->fetchAll(PDO::FETCH_ASSOC);
            if (is_array($rezultati) && count($rezultati) > 0) {
                return $rezultati[0];
            }
        }

        return false;
    }
}