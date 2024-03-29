<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config/config.php");
// kontroler koristi model
require_once(__DIR__."/../model/DrzavaModel.php");

class DrzavaController
{
    /**
     * Metoda koja služi za prikaz forme za dodavanje države i dodavanje države 
     *
     * @return void
     */
    public function create()
    {
        // meta title (tab od browsera)   
        $title = "Dodaj državu";
        //varijabla za postavljanje aktivne klase u navigaciji
        $nav = "kreiraj";

        //provjeravamo da li je korisnik kliknio submit
        $greskaPoruka="";
        if(!empty($_POST))
        {
            // provjeravamo da li je korisnik unio sva potrebna polja
            if(!empty($_POST["naziv"]) and !empty($_POST["logo"]))
            {
                // inicijalizaciju klase
                $drzavaModel = new DrzavaModel;
                
                // u ovoj klasi nadi mi funkciju drzava
                $rezultat = $drzavaModel->dodajDrzavu($_POST["naziv"],$_POST["logo"]);
                if($rezultat)
                {
                    header("Location: /admin/pregled_drzava.php");
                }
            }
            else
            {
                // ovo se izvrši ako je korisnik kliknuo submit ali nije unio sva potrebna polja
                $greskaPoruka= "Molimo unesite sva potrebna polja!";
            }
        }
        ob_start();
        require_once( 'view/drzava/createView.php' );
        $output = ob_get_clean();
        return $output;
    }
    public function read()
    {
        // meta title (tab od browsera)   
        $title = "Pregledaj države";
        //varijabla za postavljanje aktivne klase u navigaciji
        $nav = "pregled";

        $drzavaModel = new DrzavaModel;
        // spema se rezultat metode u varijablu rezultat
        $rezultat = $drzavaModel->dohvatiSveDrzave();

        ob_start();
        require_once( 'view/drzava/listaView.php' );
        $output = ob_get_clean();
        return $output;
    }

    public function update()
    {
        // meta title (tab od browsera)   
        $title = "Uredi državu";
        //varijabla za postavljanje aktivne klase u navigaciji
        $nav = "kreiraj";

        $greskaPoruka="";
        // dohvati podatke od države iz baze pomoću id-a iz $_GET paramtra 
        // tako da se u formi mogu prikazati trenutni podaci
        
        $drzavaModel = new DrzavaModel;
        $rezultat=$drzavaModel->dohvatiDrzavuPomocuId($_GET["id"]);

        //provjeravamo da li je korisnik kliknio submit
        if(!empty($_POST))
        {
            // provjeravamo da li je korisnik unio sva potrebna polja
            if(!empty($_POST["naziv"]) and !empty($_POST["logo"]))
            {
                // inicijalizaciju klase
                $drzavaModel = new DrzavaModel;
                
                // u ovoj klasi nadi mi funkciju drzava
                $rezultat = $drzavaModel->urediDrzavu($_GET["id"],$_POST["naziv"],$_POST["logo"]);
                if($rezultat)
                {
                    header("Location: /admin/pregled_drzava.php");
                }
            }
            else
            {
                // ovo se izvrši ako je korisnik kliknuo submit ali nije unio sva potrebna polja
                $greskaPoruka= "Molimo unesite sva potrebna polja!";
            }
        }
        ob_start();
        require_once( 'view/drzava/updateView.php' );
        $output = ob_get_clean();
        return $output;
    }

    public function delete()
    {
        $drzavaModel = new DrzavaModel;
        $rezultat=$drzavaModel->izbrisiDrzavu($_GET["id"]);

        if($rezultat)
        {
            header("Location: /admin/pregled_drzava.php");
        }
    }
}


