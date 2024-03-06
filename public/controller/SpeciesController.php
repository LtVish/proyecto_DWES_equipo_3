<?php
    include '../models/Specie.php';
    $species = Specie::GetAll();
    require_once("../views/species.php");
?>