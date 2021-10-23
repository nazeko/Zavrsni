<?php

require_once("Database.php");
class IgracModel extends Database
{
    
    public function dodajIgraca(int $klub_id,string $ime, string $prezime, string $pozicija, string $dob, int $visina, int $tezina, string $noga)
    {

        $response = false;

        $veza = $this->spajanje_na_bazu();

        $upit = "INSERT INTO igraci (klub_id,ime,prezime,pozicija,dob,visina,tezina,noga)
        VALUES ( $klub_id, '$ime', '$prezime', '$pozicija', '$dob', $visina, $tezina, '$noga' )";

        $igrac = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($igrac))
        {
            $response = true;
        }
        return $response;
    }

    public function dohvatiSveIgrace()
    {
        $response = array();
        $veza = $this->spajanje_na_bazu();

        $upit = "SELECT * FROM igraci ";

        $igrac = $this->izvrsi_upit($veza,$upit);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($igrac))
        {
            $response = $igrac;
        }
        return $response;
    }
    public function dohvatiigracaPomocuId($id)
    {
        $response = array();
        $veza = $this->spajanje_na_bazu();

        $upit = "SELECT * FROM igraci WHERE id=$id ";

        $igrac = $this->izvrsi_upit($veza,$upit);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($igrac[0]))
        {
            $response = $igrac[0];
        }
        return $response;
    }
    public function urediIgraca(int $id,int $klub_id,string $ime, string $prezime, string $pozicija, string $dob, int $visina, int $tezina, string $noga)
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "UPDATE igraci SET klub_id=$klub_id,ime='$ime',prezime='$prezime',pozicija='$pozicija',dob='$dob',visina=$visina,tezina=$tezina,noga='$noga' WHERE id=$id";

        $igrac = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($igrac))
        {
            $response = true;
        }
        return $response;
    }
    public function izbrisIigraca(int $id)
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "DELETE FROM igraci WHERE id=$id";

        $igrac = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($igrac))
        {
            $response = true;
        }
        return $response;
    }
}