<?php
require __DIR__ . '/../DAO/ArtistDAO.php';

class ArtistService {
    public function getAllArtists() {
        $dao = new ArtistDAO();
        $artists = $dao->getAllArtists();
        return $artists;
    }
    public function getArtistByID($ID) {
        $dao = new ArtistDAO();
        $artist = $dao->getArtistByID($ID);
        return $artist;
    }

    public function updateArtistByID($ID, $Name, $Description, $YouTube, $Spotify, $DemoSong) {
        $dao = new ArtistDAO();
        $updated = $dao->updateArtistByID($ID, $Name, $Description, $YouTube, $Spotify, $DemoSong);
        return $updated;
    }
    public function deleteArtistByID($ID)
    {
        $dao = new ArtistDAO();
        $deleted = $dao->deleteArtistByID($ID);
        return $deleted;
    }
    public function createArtist($Name, $Description, $YouTube, $Spotify, $DemoSong) {
        $dao = new ArtistDAO();
        $ID = $dao->createArtist($Name, $Description, $YouTube, $Spotify, $DemoSong);
        return $ID;
    }
}