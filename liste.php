<?php
include('connexion.php');
$requete = "SELECT * FROM etudiant";
$reponse = $bdd->query($requete);
$donnees = $reponse->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Liste des étudiants</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <h3>Liste des étudiants</h3>
        <br>
        <button>
            <a href="ajout.php">Ajouter</a>
        </button>
        <br><br>
        <table>
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Sexe</th>
                    <th>Filière</th>
                    <th>Ecole</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donnees as $etudiant) { ?>
                        <tr>
                            <td>
                                <?= $etudiant['matricule'] ?>
                            </td>
                            <td>
                                <?= $etudiant['nom'] ?>
                            </td>
                            <td>
                                <?= $etudiant['prenom'] ?>
                            </td>
                            <td>
                                <?= $etudiant['datenais'] ?>
                            </td>
                            <td>
                                <?= $etudiant['sexe'] ?>
                            </td>
                            <td>
                                <?= $etudiant['code'] ?>
                            </td>
                            <td>
                                <?= $etudiant['sigle'] ?>
                            </td>
                            <td>
                                <button>
                                    <a href="modif.php?mat=<?= $etudiant['matricule'] ?>">Modifier</a>
                                </button>
                                <button>
                                    <a href="">Supprimer</a>
                                </button>
                            </td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>

    </body>

</html>

