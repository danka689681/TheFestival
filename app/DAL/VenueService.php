<?php
require __DIR__ . '/../DAO/VenueDAO.php';

class VenueService {
    public function getAllVenues() {
        $dao = new VenueDAO();
        $venues = $dao->getAllVenues() ;
        return $venues;
    }

    public function getVenueByID($ID) {
        $dao = new VenueDAO();
        $venue = $dao->getVenueByID($ID) ;
        return $venue;
    }

    public function updateVenueByID($ID, $Name, $MapURL) {
        $dao = new VenueDAO();
        $updated = $dao->updateVenueByID($ID, $Name, $MapURL);
        return $updated;
    }
    public function deleteVenueByID($ID)
    {
        $dao = new VenueDAO();
        $deleted = $dao->deleteVenueByID($ID);
        return $deleted;
    }
    public function createVenue($Name, $MapURL) {
        $dao = new VenueDAO();
        $ID = $dao->createVenue($Name, $MapURL);
        return $ID;
    }
  
}