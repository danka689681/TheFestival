<?php
require __DIR__ . '/MainController.php';
require __DIR__ . '/../DAL/HistoryEventService.php';
require __DIR__ . '/../Model/HistoryEvent.php';
require __DIR__ . '/../generalFunctions.php';



class HistoryController extends Controller {
    public $header;
    public $footer;
    private $HistoryEventService;


    function __construct() {
        $this->header =  __DIR__ . "/../View/header.php"; 
        $this->footer =  __DIR__ . "/../View/footer.php"; 
        $this->HistoryEventService = new HistoryEventService();
    }


    public function index() {
        $body = __DIR__ . "/../View/History/index.php";
        $json = '{""}';
        $historyEvents = $this->HistoryEventService->getAllEvents();
        $dates = [];
        foreach($historyEvents as $event){
            $checkDate = $event->getDate();
            if(!in_array($checkDate, $dates)){
                $dates[] = $checkDate;
            }
        }
        $times = [];
        $timesWithEvents = [];
        foreach($historyEvents as $event){
            $startTime = $event->getStartTime();
            $endTime = $event->getEndTime();
            if(!in_array($startTime, $times) && !in_array($endTime, $times)){
                $times[] = array("Start" => $startTime, "End" => $endTime);
            }

        }

        $endTimes = [];
        foreach($historyEvents as $event){
            $checkTime = $event->getEndTime();
            if(!in_array($checkTime, $times)){
                $endTimes[] = $checkTime;
            }
        }

        $array = [];
        foreach($dates as $date){
            $array[] = array("Date" => $date, "Time" => $times);
        }
        $json = json_encode($times, JSON_PRETTY_PRINT);
        echo '<pre>';
        echo $json;
        echo '</pre>';

        //$jsonEvents = ();
        //var_dump($jsonEvents);

        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');

    }


}
?>
