<?php

$item_id = isset($_GET['id']) ? $_GET['id'] : null;
$year_month = isset($_GET['month']) ? $_GET['month'] : null;


$conn = new mysqli('localhost','root','root','manikiuras');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selection = "";

// Single item
if(is_numeric($item_id)){
	$selection = 'WHERE id=' . $item_id; 
}
// Month
if(strlen($year_month) > 0){
	list($year,$month) = explode('-',$year_month);
	$selection = 'WHERE month(date)=' . $month . ' AND year(date)=' . $year; 
}

$entries = $conn->query("SELECT * FROM manikiurasvilniuje" . $selection);
$entries2 = $conn->query("SELECT * FROM manikiurasvilniuje" . $selection);

?>

<!doctype html>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Manikiuras Vilniuje</title>
        <link rel="stylesheet" type="text/css" href="normalize.css"/>
        <link rel="stylesheet" type="text/css" href="manikiurasvilniuje.css"/>
        <link rel="stylesheet" type="text/css" href="manikiuras2.css"/>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
<script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>

    </head>

	<body>
            <header>

                <div class="inner containerA">
                    <div class="nav">
                        <label for="toggle">&#9776;</label>
				        <input type="checkbox" id="toggle"/>
				            <div class="menu">
                                <a class="pradzia1" href="read.php">Pradžia</a>
                                <a class="pradzia" href="#vietos">Vietos</a>
                                <a class="pradzia" href="contacts.html">Kontaktai</a>
                                <a class="active" href="manikiurasvilniuje.php">Registracija</a>


                            </div>
                    </div>
                <div>


            </header> 

        <div class="bottletext">
        <img class="bottle" src="bottle4.jpg" alt="bottle"/>
        
        <p class="manikiurasvilniuje">MANIKIŪRAS VILNIUJE</p>
        <p class="raskmeistre">Rask meistrę arčiau namų</p>
        <p class="www">www.manikiurasvilniuje.lt</p>

        </div>

        <div class="pinkfonas">
            <div class="flex-container">
                <div class="box1">
                    <p class="istorija">MANIKIŪRO GROŽIO KULTAS</p>
                    <p class="istorijostext">Egiptietės ir rytietės antikos laikais skirdavo daug laiko nagų priežiūrai ir gražinimui. 
                        Archeologų radiniai rodo, jog jau tada jos turėjo dėžutes manikiūro įrankiams. 
                        Moterys rytuose prie nago pagrindo įtrindavo organines dažomąsias medžiagas, jog augtų spalvoti nagai. 
                        Europietės savo nagų priežiūra taip nesirūpindavo. 
                        Jos lavino rankų riešus, kad rankų forma būtų daili ir grakšti.
                        Europoje manikiūrą išpopuliarino vyras. 
                        Prancūzijos karalius Lui Pilypas 1830 m. daug dėmesio skirdavo nagams ir netgi liepdavo jam juos tvarkyti.</p>
                </div>
                <div class="box2"></div>
            </div>
        </div>    




        <div class='content-wrapper' id="vietos">
            <h2>Vietos, kur atliekamas manikiūras</h2>
<!--map-->
<div id="mapid" style="width: 100%; height: 480px;"></div>
<script>
    var addressesArray = 
    [
        <?php
        // if($entries && $entries->num_rows > 0)
        // {
            $adressesString = "";
            while($row = $entries->fetch_assoc())
            {
                $adressesString = $adressesString . '{address:"'. $row['Address'] .'",title:"' . $row['Name'] . '"},';
            }
            $adressesString = rtrim($adressesString,',');
            echo $adressesString;
        // }   
        ?>
    ];



        //   var addressesArray = [
        //         <?php
        //             echo '{address:"Visoriu g. 16, 08300 Vilnius", title:"tratata"},';
		// 								echo '{address:"Visoriu g. 13, 08300 Vilnius", title:"Manikur"}';
        //         ?>

        //     ];



						var mymap = L.map('mapid').setView([54.68, 25.27], 13);
						L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mymap);
            //loop all the addresses and call a marker for each one
            for (var x = 0; x < addressesArray.length; x++) {
                const item = addressesArray[x];
                                
                $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+item.address+'&sensor=false', null, function (data) {
                   var p = data.results[0].geometry.location;
                    
										L.marker([p.lat, p.lng]).addTo(mymap)
											.bindPopup(item.title)
											.openPopup();
            		});
								
						}

        </script>    

            <?php
                if($entries2 && $entries2->num_rows > 0){
                    while($row2 = $entries2->fetch_assoc()){
                        echo '<h2>' . $row2['Name'] . '</h2>';
                        echo '<h3>' . $row2['Address'] . '</h3>';
                        echo '<div> Telefonas ' .$row2['telefonas'] . '</div>';
                        if ($row2['procedura1'] == 1){
                            echo '<div>Gelinis  lakavimas</div>';
                            }
                        if ($row2['procedura2'] == 1){     
                            echo '<div>Manikiūras</div>';
                        }
                        if ($row2['procedura3'] == 1){      
                            echo '<div>Pedikiūras</div>';
                        }
                        echo '<div>' .$row2['content'] . '</div>';
                    }
                }else {
                    echo '<p>Error: No entries</p>';
                }
            ?>

           
        </div>
        

<!--mygtukas UP-->
<button onclick="topFunction()" id="myBtn" title="Go to top">Į viršų</button>
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};

            function scrollFunction() {
                if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
                    document.getElementById("myBtn").style.display = "block";
                } else {
                    document.getElementById("myBtn").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>


        <footer>
            <div class="footer">
                ©2018 by Juste
            </div>
        </footer>
        

	</body>
</html>
        
