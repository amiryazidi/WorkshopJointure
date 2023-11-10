<?php
include "../controller/JoueurC.php";

$c = new JoueurC();
$tab = $c->listJoueurs();

?>
<center>
    <h1>List of players</h1>
    <h2>
        <a href="addJoueur.php">Add player</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Joueur</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Tel</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php
    foreach ($tab as $joueur) {
    ?>
        <tr>
            <td><?= $joueur['id']; ?></td>
            <td><?= $joueur['nom']; ?></td>
            <td><?= $joueur['prenom']; ?></td>
            <td><?= $joueur['email']; ?></td>
            <td><?= $joueur['tel']; ?></td>
            <td align="center">
                <form method="POST" action="updateJoueur.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $joueur['id']; ?> name="idJoueur">
                </form>
            </td>
            <td>
                <a href="deleteJoueur.php?id=<?php echo $joueur['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>