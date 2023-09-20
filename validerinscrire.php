<?php
include('connexion.php');

$etudiant = $_POST['s_etudiant'];
$examen = $_POST['s_examen'];
$date = $_POST['s_date'];
$annee = $_POST['s_annee'];

if (
    empty($etudiant) ||
    empty($date) ||
    empty($annee)
) {
    echo "Veuillez renseignez les champs requis";
} else {
    $requete_existe =
        "SELECT * FROM inscrire
        WHERE annee = '$annee'
        AND matricule = '$etudiant' 
        AND codeEx = '$examen';
    ";
    $reponse_existe = $bdd->query($requete_existe);
    $donnees = $reponse_existe->fetchAll();
    if ($donnees) {
        echo "L'étudiant est déja inscrit dans cette anné";
    } else {
        $requete_inscrire =
            "INSERT INTO inscrire
            VALUES ('$date',$annee,'$etudiant','$examen');
            ";
        if ($bdd->query($requete_inscrire)) {
            echo "Inscription réussie";
        } else {
            echo "Inscription échoué";
        }
    }
}