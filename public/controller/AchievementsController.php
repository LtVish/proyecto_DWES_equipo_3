<?php
    include '../models/Event.php';
    include '../models/Specie.php';

    $selectedYear = isset($_POST['year']) ? $_POST['year'] : null;
    $selectedLocation = isset($_POST['location']) ? $_POST['location'] : null;
    $selectedSpecies = isset($_POST['species']) ? $_POST['species'] : null;
    $selectedBenefit = isset($_POST['benefit']) ? $_POST['benefit'] : null;

    $locations = Event::getPlantedTreesLocations();
    $years = Event::getPlantedTreesYears();
    $species = Specie::GetAll();
    $benefits = Event::getPlantedTreesBenefits();

    //Filtered parameters
    $filteredLocations = [];
    $filteredYears = [];
    $filteredSpecies = [];
    $filteredBenefits = [];

    if (!empty($selectedYear)) {
        $filteredYears = Event::getPlantedTreesCount('year', $selectedYear);
    }

    if (!empty($selectedLocation)) {
        $filteredLocations = Event::getPlantedTreesCount('location', $selectedLocation);
    }

    if (!empty($selectedSpecies)) {
        $filteredSpecies = Event::getPlantedTreesCount('species', $selectedSpecies);
    }

    if (!empty($selectedBenefit)) {
        $filteredBenefits = Event::getPlantedTreesCount('benefits', $selectedBenefit);
    }

    require_once("../views/achievements.php");
?>