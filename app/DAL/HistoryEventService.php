<?php
require __DIR__ . '/../DAO/HistoryEventDAO.php';

class HistoryEventService {
    public function getEventsByDate($date) {
        $dao = new HistoryEventDAO();
        $events = $dao->getEventsByDate($date);
        return $events;
    }
    public function getEventsByDateAndTime($date, $time) {
        $dao = new HistoryEventDAO();
        $events = $dao->getEventsByDateAndTime($date, $time);
        return $events;
    }
    public function getAllEvents() {
        $dao = new HistoryEventDAO();
        $events = $dao->getAllEvents();
        return $events;
    }
}
?>