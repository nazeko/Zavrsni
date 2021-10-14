<?php

class DashboardController
{
    public function index()
    {
        $title = "Dashboard";
        $nav = "home";
        ob_start();
        require_once( 'view/dashView.php' );
        $output = ob_get_clean();
        return $output;
    }
}