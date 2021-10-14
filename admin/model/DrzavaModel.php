<?php

require_once("Database.php");
class DrzavaModel extends Database
{
    
    public function dodajDrzavu(string $naziv,string $logo)
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "INSERT INTO drzave ( naziv, logo )
        VALUES ( '$naziv','$logo' )";

        $drzava = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($korisnik))
        {
            $response = true;
        }
        return $response;
    }
}