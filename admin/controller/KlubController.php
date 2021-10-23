<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config/config.php");
// kontroler koristi model
require_once(__DIR__."/../model/KlubModel.php");

class KlubController
{
    /**
     * Metoda koja služi za prikaz forme za dodavanje klubove i dodavanje klubove 
     *
     * @return void
     */
    public function create()
    {
        // meta title (tab od browsera)   
        $title = "Dodaj klub";
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
                $KlubModel = new KlubModel;
                
                // u ovoj klasi nadi mi funkciju Klub
                $rezultat = $KlubModel->dodajKlub($_POST["naziv"],$_POST["logo"]);
                if($rezultat)
                {
                    header("Location: /admin/pregled_klub.php");
                }
            }
            else
            {
                // ovo se izvrši ako je korisnik kliknuo submit ali nije unio sva potrebna polja
                $greskaPoruka= "Molimo unesite sva potrebna polja!";
            }
        }
        ob_start();
        require_once( 'view/klub/createView.php' );
        $output = ob_get_clean();
        return $output;
    }
    public function read()
    {
        // meta title (tab od browsera)   
        $title = "Pregledaj klubove";
        //varijabla za postavljanje aktivne klase u navigaciji
        $nav = "pregled";

        $KlubModel = new KlubModel;
        // spema se rezultat metode u varijablu rezultat
        $rezultat = $KlubModel->dohvatiSveKlubove();

        ob_start();
        require_once( 'view/klub/listaView.php' );
        $output = ob_get_clean();
        return $output;
    }

    public function update()
    {
        // meta title (tab od browsera)   
        $title = "Uredi klub";
        //varijabla za postavljanje aktivne klase u navigaciji
        $nav = "kreiraj";

        $greskaPoruka="";
        // dohvati podatke od klubove iz baze pomoću id-a iz $_GET paramtra 
        // tako da se u formi mogu prikazati trenutni podaci
        
        $KlubModel = new KlubModel;
        $rezultat=$KlubModel->dohvatiKlubPomocuId($_GET["id"]);

        //provjeravamo da li je korisnik kliknio submit
        if(!empty($_POST))
        {
            // provjeravamo da li je korisnik unio sva potrebna polja
            if(!empty($_POST["naziv"]) and !empty($_POST["logo"]))
            {
                // inicijalizaciju klase
                $KlubModel = new KlubModel;
                
                // u ovoj klasi nadi mi funkciju Klub
                $rezultat = $KlubModel->urediKlub($_GET["id"],$_POST["naziv"],$_POST["logo"]);
                if($rezultat)
                {
                    header("Location: /admin/pregled_klub.php");
                }
            }
            else
            {
                // ovo se izvrši ako je korisnik kliknuo submit ali nije unio sva potrebna polja
                $greskaPoruka= "Molimo unesite sva potrebna polja!";
            }
        }
        ob_start();
        require_once( 'view/klub/updateView.php' );
        $output = ob_get_clean();
        return $output;
    }

    public function delete()
    {
        $KlubModel = new KlubModel;
        $rezultat=$KlubModel->izbrisiKlub($_GET["id"]);

        if($rezultat)
        {
            header("Location: /admin/pregled_klub.php");
        }
    }
}


