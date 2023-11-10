<?php

include '../Controller/JoueurC.php';
include '../model/Joueur.php';
$error = "";

// create client
$joueur = null;
// create an instance of the controller
$joueurC = new JoueurC();


if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["tel"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["tel"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $joueur = new Joueur(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['tel']
        );
        var_dump($joueur);
        
        $joueurC->updateJoueur($joueur, $_POST['idJoueur']);

        header('Location:listJoueurs.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listJoueurs.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idJoueur'])) {
        $joueur = $joueurC->showJoueur($_POST['idJoueur']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">IdJoueur :</label></td>
                    <td>
                        <input type="text" id="idJoueur" name="idJoueur" value="<?php echo $_POST['idJoueur'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $joueur['nom'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prenom">Prénom :</label></td>
                    <td>
                        <input type="text" id="prenom" name="prenom" value="<?php echo $joueur['prenom'] ?>" />
                        <span id="erreurPrenom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email :</label></td>
                    <td>
                        <input type="text" id="email" name="email" value="<?php echo $joueur['email'] ?>" />
                        <span id="erreurEmail" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="telephone">Téléphone :</label></td>
                    <td>
                        <input type="text" id="telephone" name="tel" value="<?php echo $joueur['tel'] ?>" />
                        <span id="erreurTelephone" style="color: red"></span>
                    </td>
                </tr>


                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>