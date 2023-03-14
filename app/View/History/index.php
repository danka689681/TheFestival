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
                Welcome to <strong>A Stroll Through History</strong>, a walking tour through the beautiful city of <br>
                Haarlem from <strong>July 27th to 30th</strong>. We have designed this tour to be <strong>inclusive</strong> and <br>
                <strong>accessible</strong> for <strong>people of all ages (12+), abilities, genders, and social statuses</strong>. We <br>
                have also <strong>provided a map</strong> of the walking route and a list of <strong>nine exciting locations</strong> <br>
                to visit. We hope you will join us on this journey through Haarlem's rich history and <br>
                culture.
            <p>
            <img id="" class="introPic small" src="../assets/img/history/aboutHistory1.png" alt="people">
            <img id="" class="introPic small" src="../assets/img/history/aboutHistory2.png" alt="people">
            <img id="" class="introPic big" src="../assets/img/history/aboutHistory3.png" alt="people">
        </div>
    </div>

    <div class="background">
        <div class="main-content">
            <div class="locationList">
                <div class="box location">
                    <h2 class="location-heading">1. De Grote Of St. Bravokerk</h2>
                    <p class="locationInfoPara">Our <strong>starting point</strong> of the event is located in the <strong>Grote Markt</strong> 
                    which is the <strong>principal cathedral</strong> for the Roman Catholic Diocese 
                    of Haarlem. This building is a <strong>great example of Gothic 14th-
                    century architecture.</strong><p>

                    <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i><td>
                        <td class="adress">Grote Markt 22, 2011 RD Haarlem<td>
                    </table>

                    <button class="btnReadmore" value="Read More">Read More</button>
                </div>
                <div class="box locationImage">
                    <img id="" class="locationpic" src="../assets/img/history/location1.png" alt="history tour location">
                </div>
                <div class="box locationImage">
                    <img id="" class="locationpic" src="../assets/img/history/location2.png" alt="history tour location">
                </div>
                <div class="box location">
                    <h2 class="location-heading">2. Grote Markt</h2>
                    <p class="locationInfoPara">The <strong>second stop</strong> at our event is the <strong>Grote Markt</strong>, a picturesque 
                    market square located in the <strong>heart of Haarlem</strong>. It offers a <strong>variety</strong> 
                    <strong>of stores</strong> and charming terraces. <strong>Easily accessible from St. 
                    Bavo's Church</strong>, it is a must-see destination in Haarlem.<p>

                    <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i><td>
                        <td class="adress">2011 RD Haarlem<td>
                    </table>

                    <button class="btnReadmore" value="Read More">Read More</button>
                </div>
                <div class="box location">
                    <h2 class="location-heading">1. De Hallen</h2>
                    <p class="locationInfoPara">The <strong>third stop</strong> at our event is <strong>De Hallen</strong>, a museum <strong>located in 
                    Haarlem</strong>, Netherlands. It features a <strong>variety of art and cultural 
                    exhibits</strong> and hosts special <strong>exhibitions</strong> and <strong>events</strong>. Housed in a 
                    beautiful historic building, it is a popular destination for those interested in history, art, and culture.<p>

                    <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i><td>
                        <td class="adress">Grote Markt 16, 2011 RD Haarlem<td>
                    </table>

                    <button class="btnReadmore" value="Read More">Read More</button>
                </div>
                <div class="box locationImage">            
                    <img id="" class="locationpic" src="../assets/img/history/location3.png" alt="history tour location">
                </div>
                <div class="box locationImage">            
                    <img id="" class="locationpic" src="../assets/img/history/location4.png" alt="history tour location">
                </div>
                <div class="box location">
                    <h2 class="location-heading">4. Proveniershof</h2>
                    <p class="locationInfoPara">The <strong>fourth stop</strong> at our event is the <strong>Proveniershof</strong>, a complex of 
                    buildings with a rectangular garden <strong>located on The Grote 
                    Houtstraat</strong>. It offers <strong>peace</strong> and <strong>quiet</strong> in the bustling city and is a 
                    perfect spot for those seeking a respite from the busy shopping 
                    street.<p>

                    <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i><td>
                        <td class="adress">Grote Houtstraat 142D, 2011 SV Haarlem<td>
                    </table>

                    <button class="btnReadmore" value="Read More">Read More</button>
                </div>
                <div class="box location">
                    <h2 class="location-heading">5. Jopenkerk</h2>
                    <p class="locationInfoPara">Jopenkerk is our <strong>fifth stop</strong> and <strong>breakpoint</strong>. This local beer 
                    brewery in <strong>Gedempte Voldersgracht</strong> offers <strong>refreshing beer</strong> 
                    based on a 15th-century recipe and a memorable experience at 
                    the <strong>brewery's café and restaurant.</strong><p>

                    <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i><td>
                        <td class="adress">Gedempte Voldersgracht 2, 2011 WD Haarlem <td>
                    </table>

                    <button class="btnReadmore" value="Read More">Read More</button>
                </div>
                <div class="box locationImage">            
                    <img id="" class="locationpic" src="../assets/img/history/location5.png" alt="history tour location">
                </div>
                <div class="box locationImage">            
                    <img id="" class="locationpic" src="../assets/img/history/location6.png" alt="history tour location">
                </div>
                <div class="box location">
                    <h2 class="location-heading">6. Waalse Kerk</h2>
                    <p class="locationInfoPara">At our <strong>sixth stop</strong>, we visit a <strong>14th-century church</strong> located on the 
                    <strong>Begijnhof</strong>. It features historical objects such as an <strong>upper gallery</strong>, 
                    a <strong>19th-century organ</strong>, and a <strong>16th-century sacristy</strong>. Undoubtedly 
                    a beautiful and significant piece of art.<p>

                    <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i><td>
                        <td class="adress">Begijnhof 28, 2011 HE Haarlem<td>
                    </table>

                    <button class="btnReadmore" value="Read More">Read More</button>
                </div>
                <div class="box location">
                    <h2 class="location-heading">7. Molen De Adriaan</h2>
                    <p class="locationInfoPara">Our <strong>seventh stop</strong> is a beautiful <strong>windmill</strong> in the city <strong>center of 
                    Haarlem</strong>, dating back to the late <strong>18th century</strong>. Fully functioning, 
                    it can be <strong>seen in operation on Sundays and holidays</strong>. Inside, 
                    visitors can explore the <strong>museum</strong> and admire the interior. This is a 
                    unique and historic attraction not to be missed.<p>

                    <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i><td>
                        <td class="adress">Papentorenvest 1A, 2011 AV Haarlem<td>
                    </table>

                    <button class="btnReadmore" value="Read More">Read More</button>
                </div>
                <div class="box locationImage">            
                    <img id="" class="locationpic" src="../assets/img/history/location7.png" alt="history tour location">
                </div>
                <div class="box locationImage">            
                    <img id="" class="locationpic" src="../assets/img/history/location8.png" alt="history tour location">
                </div>
                <div class="box location">
                    <h2 class="location-heading">8. Amsterdamse Poort</h2>
                    <p class="locationInfoPara">At our <strong>eighth stop</strong>, we visit the <strong>Amsterdamse Poort</strong>, a historic 
                    <strong>bridge in Haarlem</strong> that spans the <strong>Spaarne river</strong>. It offers 
                    beautiful views and is a popular spot for walking, photography, 
                    and taking in the sights and sounds of Haarlem. This is a must-see 
                    destination in the city.<p>

                    <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i><td>
                        <td class="adress">2011 BZ Haarlem<td>
                    </table>

                    <button class="btnReadmore" value="Read More">Read More</button>
                </div>
                <div class="box location">
                    <h2 class="location-heading">9. Hof van Bakenes</h2>
                    <p class="locationInfoPara">Our <strong>event ends</strong> at the <strong>oldest hofje in the Netherlands</strong>, a 14th 
                    century building <strong>located between Bakenessergrach and the 
                    Wijde Appelaarsteeg</strong>. Experience <strong>traditional Dutch culture</strong> and 
                    explore the <strong>rich history</strong> of the country at this historic stop.<p>

                    <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i><td>
                        <td class="adress">Wijde Appelaarsteeg 11F, 2011 HB Haarlem <td>
                    </table>

                    <button class="btnReadmore" value="Read More">Read More</button>
                </div>
                <div class="box locationImage">            
                    <img id="" class="locationpic" src="../assets/img/history/location9.png" alt="history tour location">
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
