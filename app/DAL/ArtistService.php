<?php
require __DIR__ . '/../DAO/ArtistDAO.php';

class ArtistService {
    public function getAllArtists() {
        $dao = new ArtistDAO();
        $artists = $dao->getAllArtists();
        return $artists;
    }
}