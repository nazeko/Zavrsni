<?php
$config = array();

$config["field_positions"]=array(
    "Obrana" => array(
        "GK",
        "SW",
        "LB",
        "LCB",
        "CB",
        "RCB",
        "RB",
        "LWB",
        "RWB",
    ),
    "Vezni" => array(
        "LDM",
        "CDM",
        "RDM",
        "LM",
        "LCM",
        "CM",
        "RCM",
        "RM",
        "LAM",
        "CAM",
        "RAM",
    ),
    "Napad" => array(
        "LW",
        "CF",
        "RW",
        "LS",
        "ST",
        "RS",
    ),
);

$config["dbhost"]="localhost";
$config["dbname"]="zavrsni";
$config["dbuser"]="root";
$config["dbpass"]="m11";

ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
error_reporting(E_ALL);