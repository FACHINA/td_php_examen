<?php
include('connexion.php');

$matri = $_GET['mat'];

$requete_etudiant = "SELECT * FROM etudiant WHERE matricule = $matri;";
$reponse_etudiant = $bdd->query($requete_etudiant);
$etudiant = $reponse_etudiant->fetchAll();

$requete_filieres = "SELECT * FROM filiere ORDER BY code;";
$reponse_filieres = $bdd->query($requete_filieres);
$filieres = $reponse_filieres->fetchAll();

$requete_ecoles = "SELECT * FROM ecole ORDER BY sigle;";
$reponse_ecoles = $bdd->query($requete_ecoles);
$ecoles = $reponse_ecoles->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modifier</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h3>Modifier un étudiant</h3>
        <form action="validermodif.php" method="post">
            <?php
            foreach ($etudiant as $etu)
            ?>
            <fieldset>
                <legend>Etudiant</legend>

                <label>Matricule</label>
                <input name="s_matricule" type="text" value="<?= $etu['matricule'] ?>">
                <br>
                <label>Nom</label>
                <input name="s_nom" type="text" value="<?= $etu['nom'] ?>">
                <br>
                <label>Prenom</label>
                <input name="s_prenom" type="text" value="<?= $etu['prenom'] ?>">
                <br>
                <label>Date de naissance</label>
                <input name="s_datenais" type="date" value="<?= $etu['datenais'] ?>">
                <br>
                <label>Sexe</label>
                <input name="s_sexe" value="M" type="radio">
                M
                <input name="s_sexe" value="F" type="radio">
                F
                <br>
                <label>Filière</label>
                <select name="s_filiere">
                    <?php foreach ($filieres as $filiere) { ?>
                            <option value="<?= $filiere['code'] ?>">
                                <?= $filiere['libelle'] ?>
                            </option>
                    <?php } ?>
                </select>
                <br>
                <label>Ecole</label>
                <select name="s_ecole">
                    <?php foreach ($ecoles as $ecole) { ?>
                            <option value="<?= $ecole['sigle'] ?>">
                                <?= $ecole['intitule'] ?>
                            </option>
                    <?php } ?>
                </select>
            </fieldset>
            <button type="submit">Modifier</button>
            <button type="reset">Effacer</button>
        </form>
    </body>
</html>

