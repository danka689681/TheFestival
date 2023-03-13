<?php
require __DIR__ . '/../DAL/UserService.php';
require __DIR__ . '/../Model/User.php';
require __DIR__ . '/MainController.php';
require __DIR__ . '/../Model/Artist.php';
require __DIR__ . '/../DAL/ArtistService.php';
require __DIR__ . '/../generalFunctions.php';

class DanceController extends Controller {
    private $UserService;
    public $header;
    public $footer;
    private $ArtistService;


    function __construct() {
        $this->UserService = new UserService();
        $this->header =  __DIR__ . "/../View/header.php"; 
        $this->footer =  __DIR__ . "/../View/footer.php"; 
        $this->ArtistService = new ArtistService();
    }
    public function index() {
        $artists = $this->ArtistService->getAllArtists();
        $body = __DIR__ . "/../View/Dance/index.php";
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');
    }
}
?>