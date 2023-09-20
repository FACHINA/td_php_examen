<?php
include('connexion.php');
if (empty($_POST['s_identifiant']) || empty($_POST['s_motdepasse'])) {
    echo "<script>alert('Veillez renseigner tous les champs')</script>";
} else {
    $id = $_POST['s_identifiant'];
    $mdp = $_POST['s_motdepasse'];

    $requete = "SELECT * FROM utilisateur WHERE id = '$id' AND motdepasse = '$mdp'";
    $reponse = $bdd->query($requete);
    $donnees = $reponse->fetchAll();
    if ($donnees) {
        //echo"Succes";
        header('Location:menu.html');
    } else {
        echo "<script>alert('Identifiant ou mot de passe incorrect')</script>";
    }
}
?>
