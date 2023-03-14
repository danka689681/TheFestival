<?php
require __DIR__ . '/MainController.php';
require __DIR__ . '/../DAL/HistoryEventService.php';
require __DIR__ . '/../DAL/HistoryContentService.php';
require __DIR__ . '/../DAL/ImageService.php';

require __DIR__ . '/../Model/HistoryEvent.php';
require __DIR__ . '/../Model/Image.php';
require __DIR__ . '/../Model/HistoryContent.php';
require __DIR__ . '/../generalFunctions.php';



class HistoryController extends Controller {
    public $header;
    public $footer;
    private $HistoryEventService;
    private $HistoryContentService;
    private $ImageService;



    function __construct() {
        $this->header =  __DIR__ . "/../View/header.php"; 
        $this->footer =  __DIR__ . "/../View/footer.php"; 
        $this->HistoryEventService = new HistoryEventService();
        $this->HistoryContentService = new HistoryContentService();
        $this->ImageService = new ImageService();

    }


    public function index() {
        $body = __DIR__ . "/../View/History/index.php";
        $json = '{""}';

        //get content dynamically
        $introParagraph = ($this->HistoryContentService->getContentByName("introParagraph"))->getContent();
        $location1 = ($this->HistoryContentService->getContentByName("1. De Grote Of St. Bravokerk"))->getContent();
        $location1address = ($this->HistoryContentService->getContentByName("1. De Grote Of St. Bravokerk address"))->getContent();
        $location2 = ($this->HistoryContentService->getContentByName("2. Grote Markt"))->getContent();
        $location2address = ($this->HistoryContentService->getContentByName("2. Grote Markt address"))->getContent();
        $location3 = ($this->HistoryContentService->getContentByName("3. De Hallen"))->getContent();
        $location3address = ($this->HistoryContentService->getContentByName("3. De Hallen address"))->getContent();
        $location4 = ($this->HistoryContentService->getContentByName("4. Proveniershof"))->getContent();
        $location4address = ($this->HistoryContentService->getContentByName("4. Proveniershof address"))->getContent();
        $location5 = ($this->HistoryContentService->getContentByName("5. Jopenkerk"))->getContent();
        $location5address = ($this->HistoryContentService->getContentByName("5. Jopenkerk address"))->getContent();
        $location6 = ($this->HistoryContentService->getContentByName("6. Waalse Kerk"))->getContent();
        $location6address = ($this->HistoryContentService->getContentByName("6. Waalse Kerk address"))->getContent();
        $location7 = ($this->HistoryContentService->getContentByName("7. Molen De Adriaan"))->getContent();
        $location7address = ($this->HistoryContentService->getContentByName("7. Molen De Adriaan address"))->getContent();
        $location8 = ($this->HistoryContentService->getContentByName("8. Amsterdamse Poort"))->getContent();
        $location8address = ($this->HistoryContentService->getContentByName("8. Amsterdamse Poort address"))->getContent();
        $location9 = ($this->HistoryContentService->getContentByName("9. Hof van Bakenes"))->getContent();
        $location9address = ($this->HistoryContentService->getContentByName("9. Hof van Bakenes address"))->getContent();

        //get images from database
        $infoImage1 = ($this->ImageService->getHistoryImageByName("historyInfo1.png"));
        $infoImage2 = ($this->ImageService->getHistoryImageByName("historyInfo2.png"));
        $infoImage3 = ($this->ImageService->getHistoryImageByName("historyInfo3.png"));

        $location1img = ($this->ImageService->getHistoryImageByName("location1.png"));
        $location2img = ($this->ImageService->getHistoryImageByName("location2.png"));
        $location3img = ($this->ImageService->getHistoryImageByName("location3.png"));
        $location4img = ($this->ImageService->getHistoryImageByName("location4.png"));
        $location5img = ($this->ImageService->getHistoryImageByName("location5.png"));
        $location6img = ($this->ImageService->getHistoryImageByName("location6.png"));
        $location7img = ($this->ImageService->getHistoryImageByName("location7.png"));
        $location8img = ($this->ImageService->getHistoryImageByName("location8.png"));
        $location9img = ($this->ImageService->getHistoryImageByName("location9.png"));


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
        //echo '<pre>';
        //echo $json;
        //echo '</pre>';

        //$jsonEvents = ();
        //var_dump($jsonEvents);

        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');

    }


}
?>
