<?php 
require_once("Database.php");

class ArtistDAO extends Database {

    function getAllArtists() {
        try {
            $stmt = $this->connection->prepare("SELECT artists.ID, artists.Name, artists.Description, artists.YouTube, artists.Spotify, artists.DemoSong, artistimages.ID as ForeignKeyID, artistimages.Type, artistimages.IsLogo, artistimages.Data FROM `artists` INNER JOIN artistimages ON artists.ID=artistimages.ArtistID;");
            $stmt->execute();
            $artists = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $Image = new Image();
                $Image->setID($row["ForeignKeyID"]);
                $Image->setType($row["Type"]);
                $Image->setIsLogo($row["IsLogo"]);
                $Image->setData($row["Data"]);
                $artists[$row["ID"]]["ID"] = $row["ID"];
                $artists[$row["ID"]]["Name"] = $row["Name"];
                $artists[$row["ID"]]["Description"] = $row["Description"];
                $artists[$row["ID"]]["YouTube"] = $row["YouTube"];
                $artists[$row["ID"]]["Spotify"] = $row["Spotify"];
                $artists[$row["ID"]]["DemoSong"] = $row["DemoSong"];
                if ($row["IsLogo"] == 1) {
                    $artists[$row["ID"]]["Logo"] = $Image;
                } else {
                    $artists[$row["ID"]]["Images"][] = $Image;
                }
            }
            $artistsObj = [];
            foreach ($artists as $artist) {
                $Artist = new Artist();
                $Artist->setId($artist["ID"]);
                $Artist->setName($artist["Name"]);
                $Artist->setDescription($artist["Description"]);
                $Artist->setYouTube($artist["YouTube"]);
                $Artist->setSpotify($artist["Spotify"]);
                $Artist->setDemoSong($artist["DemoSong"]);
                $Artist->setLogo($artist["Logo"]);
                $Artist->setImages($artist["Images"]);
                $artistsObj[] = $Artist;
            }
            return $artistsObj;
     
            

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
}