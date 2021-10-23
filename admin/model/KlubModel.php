<?php

require_once("Database.php");
class KlubModel extends Database
{
    
    public function dodajKlub(string $naziv,string $logo)
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "INSERT INTO klubovi ( naziv, logo )
        VALUES ( '$naziv','$logo' )";

        $klub = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($klub))
        {
            $response = true;
        }
        return $response;
    }

    public function dohvatiSveKlubove()
    {
        $response = array();
        $veza = $this->spajanje_na_bazu();

        $upit = "SELECT * FROM klubovi ";

        $klub = $this->izvrsi_upit($veza,$upit);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($klub))
        {
            $response = $klub;
        }
        return $response;
    }
    public function dohvatiKlubPomocuId($id)
    {
        $response = array();
        $veza = $this->spajanje_na_bazu();

        $upit = "SELECT * FROM klubovi WHERE id=$id ";

        $klub = $this->izvrsi_upit($veza,$upit);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($klub[0]))
        {
            $response = $klub[0];
        }
        return $response;
    }
    public function urediKlub(int $id,string $naziv,string $logo)
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "UPDATE klubovi SET naziv='$naziv', logo='$logo' WHERE id=$id";

        $klub = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($klub))
        {
            $response = true;
        }
        return $response;
    }
    public function izbrisiKlub(int $id)
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "DELETE FROM klubovi WHERE id=$id";

        $klub = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($klub))
        {
            $response = true;
        }
        return $response;
    }
}