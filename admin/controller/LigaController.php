<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config/config.php");
// kontroler koristi model
require_once(__DIR__."/../model/LigaModel.php");

class LigaController
{
    /**
     * Metoda koja služi za prikaz forme za dodavanje države i dodavanje države 
     *
     * @return void
     */
    public function create()
    {
        // meta title (tab od browsera)   
        $title = "Dodaj ligu";
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
                $ligaModel = new LigaModel;
                
                // u ovoj klasi nadi mi funkciju liga
                $rezultat = $ligaModel->dodajLigu($_POST["naziv"],$_POST["logo"]);
                if($rezultat)
                {
                    header("Location: /admin/pregled_liga.php");
                }
            }
            else
            {
                // ovo se izvrši ako je korisnik kliknuo submit ali nije unio sva potrebna polja
                $greskaPoruka= "Molimo unesite sva potrebna polja!";
            }
        }
        ob_start();
        require_once( 'view/liga/createView.php' );
        $output = ob_get_clean();
        return $output;
    }
    public function read()
    {
        // meta title (tab od browsera)   
        $title = "Pregledaj lige";
        //varijabla za postavljanje aktivne klase u navigaciji
        $nav = "pregled";

        $ligaModel = new LigaModel;
        // spema se rezultat metode u varijablu rezultat
        $rezultat = $ligaModel->dohvatiSveLige();

        ob_start();
        require_once( 'view/liga/listaView.php' );
        $output = ob_get_clean();
        return $output;
    }

    public function update()
    {
        // meta title (tab od browsera)   
        $title = "Uredi ligu";
        //varijabla za postavljanje aktivne klase u navigaciji
        $nav = "kreiraj";

        $greskaPoruka="";
        // dohvati podatke od države iz baze pomoću id-a iz $_GET paramtra 
        // tako da se u formi mogu prikazati trenutni podaci
        
        $ligaModel = new LigaModel;
        $rezultat=$ligaModel->dohvatiLiguPomocuId($_GET["id"]);

        //provjeravamo da li je korisnik kliknio submit
        if(!empty($_POST))
        {
            // provjeravamo da li je korisnik unio sva potrebna polja
            if(!empty($_POST["naziv"]) and !empty($_POST["logo"]))
            {
                // inicijalizaciju klase
                $ligaModel = new LigaModel;
                
                // u ovoj klasi nadi mi funkciju liga
                $rezultat = $ligaModel->urediLigu($_GET["id"],$_POST["naziv"],$_POST["logo"]);
                if($rezultat)
                {
                    header("Location: /admin/pregled_liga.php");
                }
            }
            else
            {
                // ovo se izvrši ako je korisnik kliknuo submit ali nije unio sva potrebna polja
                $greskaPoruka= "Molimo unesite sva potrebna polja!";
            }
        }
        ob_start();
        require_once( 'view/liga/updateView.php' );
        $output = ob_get_clean();
        return $output;
    }

    public function delete()
    {
        $ligaModel = new LigaModel;
        $rezultat=$ligaModel->izbrisiLigu($_GET["id"]);

        if($rezultat)
        {
            header("Location: /admin/pregled_liga.php");
        }
    }
}


