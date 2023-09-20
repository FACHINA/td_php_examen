<?php
include('connexion.php');

$matri = $_POST['s_matricule'];
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
        "UPDATE etudiant SET
        nom = '$nom' ,
        prenom = '$prenom',
        sexe = '$sexe',
        datenais = '$datenais',
        code = '$filiere',
        sigle = '$ecole'
        WHERE matricule = $matri;";
    if ($bdd->query($requete) == true) {
        echo "Modification éffectué";
        header("Location:liste.php");
    } else {
        echo "Echec de modification";
    }

}