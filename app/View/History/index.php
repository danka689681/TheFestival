<?php
function getDay($dateString){
    $date = (DateTime::createFromFormat('Y-m-d', $dateString));
    $dayOfWeek = $date->format('l');
    return $dayOfWeek;
}
function getDateAndDay($dateString){
    $month = date("F", strtotime($dateString));
    $day = date('d', strtotime($dateString));
    
    return $month . " " . $day;
}
?>

<div>
    <div class="historyHeader">
        <img id="historyBackgroundImg mainheading" class="backgroundImg" src="../assets/img/history/historyBackground.png" alt="picture of Haarlem">
        <h1 class="centred mainheading">A Stroll Through History<h1>
    </div>
    <div class="main-content">
        <ul class="breadcrumb">
            <li><a class="<?php echo ($_SERVER['REQUEST_URI'] == '' ? ' active' : '');?>" href="">Home</a></li>
            <li>A stroll through History</li>
        </ul>
        <h2>About A Stroll Through History</h2>
        
        <div class="historyIntro">
            <p class="introParagraph">
                <?php echo $introParagraph ?>
            <p>
            <img id="" class="introPic small" src="data:image/<?php echo $infoImage1->getType(); ?>;charset=utf8;base64,<?php echo base64_encode($infoImage1->getData()); ?>"/>
            <img id="" class="introPic small" src="data:image/<?php echo $infoImage2->getType(); ?>;charset=utf8;base64,<?php echo base64_encode($infoImage2->getData()); ?>"/>
            <img id="" class="introPic big" src="data:image/<?php echo $infoImage3->getType(); ?>;charset=utf8;base64,<?php echo base64_encode($infoImage3->getData()); ?>"/>
        </div>
    </div>

    <div class="background">
        <div class="main-content">
            <div class="locationList">
                <div class="box location">
                    <h2 class="location-heading">1. De Grote Of St. Bravokerk</h2>
                    <p class="locationInfoPara"><?php echo $location1 ?><p>

                    <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i><td>
                        <td class="adress"><?php echo $location1address ?><td>
                    </table>

                    <button class="btnReadmore" value="Read More">Read More</button>
                </div>
                <div class="box locationImage">
                    <img id="" class="locationpic" src="data:image/<?php echo $location1img->getType(); ?>;charset=utf8;base64,<?php echo base64_encode($location1img->getData()); ?>"/>
                </div>
                <div class="box locationImage">
                    <img id="" class="locationpic" src="data:image/<?php echo $location2img->getType(); ?>;charset=utf8;base64,<?php echo base64_encode($location2img->getData()); ?>"/>
                </div>
                <div class="box location">
                    <h2 class="location-heading">2. Grote Markt</h2>
                    <p class="locationInfoPara"><?php echo $location2 ?><p>

                    <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i><td>
                        <td class="adress"><?php echo $location2address ?><td>
                    </table>

                    <button class="btnReadmore" value="Read More">Read More</button>
                </div>
                <div class="box location">
                    <h2 class="location-heading">3. De Hallen</h2>
                    <p class="locationInfoPara"><?php echo $location3 ?><p>

                    <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i><td>
                        <td class="adress"><?php echo $location3address ?><td>
                    </table>

                    <button class="btnReadmore" value="Read More">Read More</button>
                </div>
                <div class="box locationImage">            
                    <img id="" class="locationpic" src="data:image/<?php echo $location3img->getType(); ?>;charset=utf8;base64,<?php echo base64_encode($location3img->getData()); ?>"/>
                </div>
                <div class="box locationImage">            
                    <img id="" class="locationpic" src="data:image/<?php echo $location4img->getType(); ?>;charset=utf8;base64,<?php echo base64_encode($location4img->getData()); ?>"/>
                </div>
                <div class="box location">
                    <h2 class="location-heading">4. Proveniershof</h2>
                    <p class="locationInfoPara"><?php echo $location4 ?><p>

                    <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i><td>
                        <td class="adress"><?php echo $location4address ?><td>
                    </table>

                    <button class="btnReadmore" value="Read More">Read More</button>
                </div>
                <div class="box location">
                    <h2 class="location-heading">5. Jopenkerk</h2>
                    <p class="locationInfoPara"><?php echo $location5 ?></strong><p>

                    <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i><td>
                        <td class="adress"><?php echo $location5address ?><td>
                    </table>

                    <button class="btnReadmore" value="Read More">Read More</button>
                </div>
                <div class="box locationImage">            
                    <img id="" class="locationpic" src="data:image/<?php echo $location5img->getType(); ?>;charset=utf8;base64,<?php echo base64_encode($location5img->getData()); ?>"/>
                </div>
                <div class="box locationImage">            
                    <img id="" class="locationpic" src="data:image/<?php echo $location6img->getType(); ?>;charset=utf8;base64,<?php echo base64_encode($location6img->getData()); ?>"/>
                </div>
                <div class="box location">
                    <h2 class="location-heading">6. Waalse Kerk</h2>
                    <p class="locationInfoPara"><?php echo $location6 ?><p>

                    <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i><td>
                        <td class="adress"><?php echo $location6address ?><td>
                    </table>

                    <button class="btnReadmore" value="Read More">Read More</button>
                </div>
                <div class="box location">
                    <h2 class="location-heading">7. Molen De Adriaan</h2>
                    <p class="locationInfoPara"><?php echo $location7 ?><p>

                    <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i><td>
                        <td class="adress"><?php echo $location7address ?><td>
                    </table>

                    <button class="btnReadmore" value="Read More">Read More</button>
                </div>
                <div class="box locationImage">            
                    <img id="" class="locationpic" src="data:image/<?php echo $location7img->getType(); ?>;charset=utf8;base64,<?php echo base64_encode($location7img->getData()); ?>"/>
                </div>
                <div class="box locationImage">            
                    <img id="" class="locationpic" src="data:image/<?php echo $location8img->getType(); ?>;charset=utf8;base64,<?php echo base64_encode($location8img->getData()); ?>"/>
                </div>
                <div class="box location">
                    <h2 class="location-heading">8. Amsterdamse Poort</h2>
                    <p class="locationInfoPara"><?php echo $location8 ?><p>

                    <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i><td>
                        <td class="adress"><?php echo $location8address ?><td>
                    </table>

                    <button class="btnReadmore" value="Read More">Read More</button>
                </div>
                <div class="box location">
                    <h2 class="location-heading">9. Hof van Bakenes</h2>
                    <p class="locationInfoPara"><?php echo $location9 ?><p>

                    <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i><td>
                        <td class="adress"><?php echo $location9address ?><td>
                    </table>

                    <button class="btnReadmore" value="Read More">Read More</button>
                </div>
                <div class="box locationImage">            
                    <img id="" class="locationpic" src="data:image/<?php echo $location9img->getType(); ?>;charset=utf8;base64,<?php echo base64_encode($location9img->getData()); ?>"/>
                </div>

            </div>
        </div>
    </div>
    <div class="main-content">
        <div>
            <h2 class="routeHeading">Walking Route For A Stroll Through History</h2>
            <img id="" class="routePic" src="../assets/img/history/routeImage.png" alt="history tour location">
        </div>

        <div>
            <h2 class="routeHeading">Ticket for A Stroll Through History</h2>
            <div class="flex-container-schedule">
                <?php
                    foreach($dates as $dateString){
                ?>
                    <div class="schedule-element schedule-head">
                        <h3 class="day"><?php echo getDay($dateString)?></h3>
                        <p class="date"><?php echo getDateAndDay($dateString)?><p>
                    </div>

                    <?php
                }
                ?>
                                <?php
                    $count = 0;
                    foreach($dates as $date){
                        foreach($times as $time){
                ?>
                    <div class="schedule-element">
                        <p><?php echo $time?> - <?php echo $endTimes[$count]; $count++;?><p>

                    </div>

                <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>

<script>
   var css = document.createElement('link');
   css.rel = 'stylesheet';
   css.href = '../assets/css/history.css';
   document.head.appendChild(css);
</script>
