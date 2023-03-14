<?php 
require_once("Database.php");

class HistoryEventDAO extends Database {
   
    function getEventsByDate($date) {
        try { 
            $stmt = $this->connection->prepare("SELECT ID, Date, StartTime, EndTime, Price, Seats, Language, Guide FROM historyevents WHERE Date = ?");
            $stmt->execute([$date]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'HistoryEvent');
            $events = $stmt->fetchAll();
            return $events;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    function getEventsByDateAndTime($date, $time) {
        try { 
            $stmt = $this->connection->prepare("SELECT ID, Date, StartTime, EndTime, Price, Seats, Language, Guide FROM historyevents WHERE Date = ? AND StartTime = ?");
            $stmt->execute([$date, $time]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'HistoryEvent');
            $events = $stmt->fetchAll();
            return $events;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getAllEvents() {
        try {
            $stmt = $this->connection->prepare("SELECT ID, Date, StartTime, EndTime, Price, Seats, Language, Guide FROM historyevents");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'HistoryEvent');
            $events = $stmt->fetchAll();
            return $events;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }

}
?>