<?php
include('connexion.php');

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
        <title>Ajouter</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h3>Ajouter un étudiant</h3>
        <form action="validerajout.php" method="post">
            <fieldset>
                <legend>Etudiant</legend>

                <label>Nom</label>
                <input name="s_nom" type="text">
                <br>
                <label>Prenom</label>
                <input name="s_prenom" type="text">
                <br>
                <label>Date de naissance</label>
                <input name="s_datenais" type="date">
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
            <button type="submit">Valider</button>
            <button type="reset">Effacer</button>
        </form>
    </body>
</html>

