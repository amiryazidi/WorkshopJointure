<?php

require '../config.php';

class JoueurC
{

    /*
    public function listJoueurs()
    {
        $db = config::getConnexion();
        $query =$db->prepare("SELECT * FROM joueur") ;
        $query->execute();
        try {
            $liste = $query->fetchAll();
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    */
    public function listJoueurs()
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM joueur";
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteJoueur($ide)
    {
        $sql = "DELETE FROM joueur WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addJoueur($joueur)
    {
        $sql = "INSERT INTO joueur  
        VALUES (NULL, :nom,:prenom, :email,:tel)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $joueur->getNom(),
                'prenom' => $joueur->getPrenom(),
                'email' => $joueur->getEmail(),
                'tel' => $joueur->getTel(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showJoueur($id)
    {
        $sql = "SELECT * from joueur where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $joueur = $query->fetch();
            return $joueur;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateJoueur($joueur, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE joueur SET 
                    nom = :nom, 
                    prenom = :prenom, 
                    email = :email, 
                    tel = :tel
                WHERE id= :idJoueur'
            );
            
            $query->execute([
                'idJoueur' => $id,
                'nom' => $joueur->getNom(),
                'prenom' => $joueur->getPrenom(),
                'email' => $joueur->getEmail(),
                'tel' => $joueur->getTel(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
