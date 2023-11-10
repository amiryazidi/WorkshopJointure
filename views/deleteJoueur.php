<?php
include '../Controller/JoueurC.php';
$clientC = new JoueurC();
$clientC->deleteJoueur($_GET["id"]);
header('Location:listJoueurs.php');
