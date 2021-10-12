<?php

require_once("Database.php");
class UserModel extends Database
{
    /**
     * Funkcija zahtjeva dva parametra (username i password),
     * zatim provjerava u bazi da li postoji korisnik s tim korisničkim imenom i lozinkom
     * ako postoji vraća true, a ako ne postoji vraca false
     *
     * @param [string] $username
     * @param [string] $password
     * @return boolean
     */
    public function autentifikacija(string $username,string $password)
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "SELECT * FROM korisnici WHERE username='$username' AND password='$password'";

        $korisnik = $this->izvrsi_upit($veza,$upit);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($korisnik))
        {
            setcookie("authCookie",true,time()+3600,"/","",false,true);
            $response = true;
        }
        return $response;
    }
}