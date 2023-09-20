<?php
include('connexion.php');
$requete_etudiants = "SELECT * FROM etudiant ORDER BY nom;";
$reponse_etudiants = $bdd->query($requete_etudiants);
$etudiants = $reponse_etudiants->fetchAll();

$requete_examens = "SELECT * FROM examen ORDER BY libelleEx;";
$reponse_examens = $bdd->query($requete_examens);
$examens = $reponse_examens->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h3>Inscrire un étudiant</h3>
        <form action="validerinscrire.php" method="post">
            <fieldset>
                <legend>Inscription</legend>
                <label>Etudiant</label>
                <select name="s_etudiant">
                    <?php foreach ($etudiants as $etudiant) { ?>
                            <option value="<?= $etudiant['matricule'] ?>">
                                <?= $etudiant['nom'] ?>
                                <?= $etudiant['prenom'] ?>
                            </option>
                    <?php } ?>
                </select>
                <br>
                <label>Examen</label>
                <select name="s_examen">
                    <?php foreach ($examens as $examen) { ?>
                            <option value="<?= $examen['codeEx'] ?>">
                                <?= $examen['libelleEx'] ?>
                            </option>
                    <?php } ?>
                </select>
                <br>
                <label>Date</label>
                <input name="s_date" type="date">
                <br>
                <label>Année</label>
                <input name="s_annee" type="number">
                <br>
            </fieldset>
            <button type="submit">Inscrire</button>
            <button type="reset">Annuler</button>
        </form>
    </body>
</html>

