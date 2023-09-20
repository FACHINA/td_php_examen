<?php
include('connexion.php');

$nom = $_POST['s_nom'];
$prenom = $_POST['s_prenom'];
$datenais = $_POST['s_datenais'];
$sexe = $_POST['s_sexe'];
$filiere = $_POST['s_filiere'];
$ecole = $_POST['s_ecole'];

if (
    empty($nom) ||
    empty($prenom) ||
    empty($datenais) ||
    empty($sexe)
) {
    echo "Veuillez renseigner tous les champs";
} else {
    $requete =
        "INSERT INTO etudiant VALUES 
        (0,'$nom','$prenom','$sexe','$datenais','$filiere','$ecole');";
    if ($bdd->query($requete) == true) {
        echo "Enregistrement éffectué";
        header("Location:liste.php");
    } else {
        echo "Echec d'enregistrement";
    }

}