<?php

require '../config.php';

class GenreC {
    public function afficheAlbums($idGenre) {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM album WHERE genre = :id");
            $query->execute(['id' => $idGenre]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function afficheGenres() {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM genre");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}